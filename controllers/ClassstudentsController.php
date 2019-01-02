<?php

namespace app\controllers;

use Yii;
use app\models\Classstudents;
use app\models\Classes;
use app\models\Course;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use PHPExcel_IOFactory;
use yii\filters\AccessControl;

/**
 * ClassstudentsController implements the CRUD actions for Classstudents model.

 student pass fail will result in
 
 
 If student passes
 {
 shift to next semester in the same batch
 }
 else
 {
	 Shift to same semester next batch
	 
 }
 */
class ClassstudentsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Classstudents models.
     * @return mixed
     */
    public function actionIndex($id)
    {
		
		$session = Yii::$app->session;
		$university_id = $session->get('uni_id');
		$course = Classes::find('course_id')->where(['id' => $id])->One();
		$course_name = Course::find('course_name')->where(['course_id' => $course, 'uni_id' =>$university_id])->One();
        $dataProvider = new ActiveDataProvider([
            'query' => Classstudents::find()->where(['class_id' => $id]),
			
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
			'classid' => $id,
			'course_name' => $course_name['course_name'],
			'course_id' => $course_name['course_id'], 
        ]);
    }

    /**
     * Displays a single Classstudents model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Classstudents model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Classstudents();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'classid' => $id,
            ]);
        }
    }

    /**
     * Updates an existing Classstudents model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$classid)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id,'classid' => $classid]);
        } else {
            return $this->render('update', [
                'model' => $model,
				'classid' => $classid,
            ]);
        }
    }

    /**
     * Deletes an existing Classstudents model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id,$classid)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index?id='.$classid]);
    }

    
    /**
     * Finds the Classstudents model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Classstudents the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Classstudents::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	
	
	
	public function actionImportstudents($id)
    {
		$session = Yii::$app->session;
		$university_id = $session->get('uni_id');
		$course = Classes::find('course_id')->where(['id' => $id])->One();
		$course_name = Course::find('course_name')->where(['course_id' => $course, 'uni_id' =>$university_id])->One();
		/*  if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'classid' => $id,
            ]);
        } */
		$modelImport = new \yii\base\DynamicModel([
                    'fileImport'=>'File Import',
                ]);
        $modelImport->addRule(['fileImport'],'required');
        $modelImport->addRule(['fileImport'],'file',['extensions'=>'ods,xls,xlsx'],['maxSize'=>2048*2048]);

		if(Yii::$app->request->post()){ 
$modelImport->fileImport = \yii\web\UploadedFile::getInstance($modelImport,'fileImport');
            if($modelImport->fileImport && $modelImport->validate()){
                $inputFileType = \PHPExcel_IOFactory::identify($modelImport->fileImport->tempName);
                $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($modelImport->fileImport->tempName);
                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                $baseRow = 2;
                while(!empty($sheetData[$baseRow]['A'])){
                    $model = new Classstudents();
					$model->class_id = $id;
                    $model->regno = $sheetData[$baseRow]['A'];
                    $model->student_name = $sheetData[$baseRow]['B'];
                    if($model->save())
                    $baseRow++;
				else
					print_r($model->getErrors());
                }
                Yii::$app->getSession()->setFlash('success','Success');
            }else{
                Yii::$app->getSession()->setFlash('error','Error');
				
            }
			$dataProvider = new ActiveDataProvider([
            'query' => Classstudents::find()->where(['class_id' => $id]),
			
        ]);
			        return $this->render('index', [
            'dataProvider' => $dataProvider,
			'classid' => $id,
			'course_name' => $course_name['course_name'],
			'course_id' => $course_name['course_id'], 
        ]);
					}
		
	return $this->render('_importform',[
                'modelImport' => $modelImport,
				'classid' => $id,
            ]);
	
	}
	
	
	public function actionResultimport($id)
    {
		$modelResultimport = new \yii\base\DynamicModel([
                    'fileImport'=>'File Import',
                ]);
        $modelResultimport->addRule(['fileImport'],'required');
        $modelResultimport->addRule(['fileImport'],'file',['extensions'=>'ods,xls,xlsx'],['maxSize'=>2048*2048]);

		/* $sheet = $objPHPExcel ->getSheet(0);
$highestRow = $sheet ->getHighestRow();
$highestColumn = $sheet ->getHighestColumn();

//$row is start 2 because first row assigned for heading.         
for ($row = 2; $row <= $highestRow; ++$row) {

  $rowData = $sheet ->rangeToArray('A'.$row. ':' .$highestColumn.$row, NULL, TRUE, FALSE);

  //save to branch table.
  $modelHeader = new FakturOut();
  $modelDetail = new FakturOutDetail();

  $modelHeader ->name = $rowData[0][0];
  $modelHeader ->age = $rowData[0][1];
  $modelHeader ->address = $rowData[0][2];
  $modelHeader ->academic_id = $rowData[0][3];
  $modelHeader ->mother_name = $rowData[0][4];
  $modelHeader ->father_Name = $rowData[0][5];
  $modelHeader ->gender = $rowData[0][6];
  $modelHeader ->height = $rowData[0][7];
  $modelHeader ->weight= $rowData[0][8];
  $modelHeader ->save();
} */
		
		
		if(Yii::$app->request->post()){ 
$modelResultimport->fileImport = \yii\web\UploadedFile::getInstance($modelResultimport,'fileImport');
            if($modelResultimport->fileImport && $modelResultimport->validate()){
                $inputFileType = \PHPExcel_IOFactory::identify($modelResultimport->fileImport->tempName);
                $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($modelResultimport->fileImport->tempName);
                $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
                $baseRow = 2;
                while(!empty($sheetData[$baseRow]['A'])){
                    $model = new Classpastresults();
					$model->class_id = $id;
                    $model->regno = $sheetData[$baseRow]['A'];
                    $model->student_name = $sheetData[$baseRow]['B'];
                    if($model->save())
                    $baseRow++;
				else
					print_r($model->getErrors());
                }
                Yii::$app->getSession()->setFlash('success','Success');
            }else{
                Yii::$app->getSession()->setFlash('error','Error');
				
            }
			        }
		
	return $this->render('_importresultform',[
                'modelResultimport' => $modelResultimport,
				'classid' => $id,
            ]);
	
	}
	
	
	 /* public function actionFees($id)
    {
        $Classstudent = Classstudents::find(['class_id' => $id])->indexBy('id')->all();
		$model = new Classstudents();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'classid' => $id,
            ]);
        }
    } */
	
	

}