<?php

namespace app\controllers;

use Yii;
use app\models\Subjects;
use app\models\Course;
use app\models\Classes;
use app\models\Classstudents;
use app\models\Faculty;
use app\models\FacultyMap;
use app\models\Subjectstudents;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubjectsController implements the CRUD actions for Subjects model.
 */
class SubjectsController extends Controller
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
     * Lists all Subjects models.
     * @return mixed
     */
    public function actionIndex($id)
    {
		
		$session = Yii::$app->session;
		$university_id = $session->get('uni_id');
		$university_id = $university_id['user_university'];
		$course = Classes::find('course_id')->where(['id' => $id])->One();
		$course = $course['course_id'];
		$sem = Classes::find('sem')->where(['id' => $id])->One();
		$sem = $sem['sem'];
		$section = Classes::find('section')->where(['id' => $id])->One();
		$section = $section['section'];
		//$course_name = Course::find('course_name')->where(['course_id' => $course, 'uni_id' =>$university_id])->One();
        $dataProvider = new ActiveDataProvider([
            'query' => Subjects::find()->where(['course_id' => $course, 'sem'=>$sem , 'section'=>$section]),
			
        ]);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
			'id' => $id,
			'section' => $section,
        ]);
    }

    /**
     * Displays a single Subjects model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id,$class_id)
    {
        $model = $this->findModel($id);
        $providerAttendance = new \yii\data\ArrayDataProvider([
            'allModels' => $model->attendances,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerAttendance' => $providerAttendance,
        ]);
    }

    /**
     * Creates a new Subjects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Subjects();
		$session = Yii::$app->session;
		$university_id = $session->get('uni_id');
		$university_id = $university_id['user_university'];
		$course = Classes::find('course_id')->where(['id' => $id])->One();
		$course = $course['course_id'];
		$sem = Classes::find('sem')->where(['id' => $id])->One();
		$sem = $sem['sem'];
		$section = Classes::find('section')->where(['id' => $id])->One();
		$section = $section['section'];
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id, 'class_id'=>$id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model, 
				//'id' => $id,
				'university_id' => $university_id,
				'course' => $course,
				'sem' => $sem,
				'section' => $section,
            ]);
        }
    }

    /**
     * Updates an existing Subjects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$university_id = $model->university_id;
		$course = $model ->course_id;
		$sem = $model->sem;
		$section = $model->section;

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
				'university_id' => $university_id,
				'course' => $course,
				'sem' => $sem,
				'section' => $section,
            ]);
        }
    }
	public function actionViewfacmap($sub_id)
    {
        $model = FacultyMap::find()->where(['sub_id' => $sub_id])->asArray()->one();
		$model2 = $this->findModel($sub_id);
        $providerAttendance = new \yii\data\ArrayDataProvider([
            'allModels' => $model2->attendances,
        ]);
        return $this->render('viewfacmap', [
            'model' => $model,
			'sub_id' => $sub_id,
			'providerAttendance' => $providerAttendance,
        ]);
    }
	public function actionAssign($id)
    {
        $model = new FacultyMap();
		$model->sub_id = $id;
		$subject_name = Subjects::find('sub_name')->where(['id' => $id])->one();
		$subject_name = $subject_name['sub_name'];
		 $session = Yii::$app->session;
		$university_id = $session->get('uni_id');
		//$university = Subjects::find('university_id')->where(['id' => $id])->one();
		$course = Subjects::find('course_id')->where(['id' => $id])->one();
		$vertical = Course::find('vertical')->where(['course_id' => $course['course_id']])->one();
		$faculties = Faculty::find()->where(['uni_id' => $university_id, 'vertical' => $vertical['vertical']])->all();
		if ($model->load(Yii::$app->request->post())){ 
			try {
			$model->save();
			}
catch (\yii\db\IntegrityException $e){echo "error";}		

            return $this->redirect(['viewfacmap', 'sub_id' => $model->sub_id]);
        } else
        {
            return $this->renderAjax('assign', [
                'model' => $model,
				'subject_name' => $subject_name,
				'faculties' => $faculties,
				'course' => $course,
				'university_id' => $university_id,
            ]);
        }
		
    }

	
	
	public function actionStusubassign($sub_id,$class_id)
    {
		$model = new Subjectstudents();
		$model->subject_id = $sub_id;
		$model->class_id = $class_id;
		$action=Yii::$app->request->post('action');
    $selection=(array)Yii::$app->request->post('selection');//typecasting
   
	if ($selection) {

		 foreach($selection as $id){
		$model->student_id = $id;
		$model->save();
		$model = new Subjectstudents();
		$model->subject_id = $sub_id;
		$model->class_id = $class_id;
		echo $id ."preferance is saved";
		 }
	}
	else
	{
		
		$session = Yii::$app->session;
		$university_id = $session->get('uni_id');
		$course = Classes::find('course_id')->where(['id' => $class_id])->One();
		$course_name = Course::find('course_name')->where(['course_id' => $course, 'uni_id' =>$university_id])->One();
        $dataProvider = new ActiveDataProvider([
            'query' => Classstudents::find()->where(['class_id' => $class_id]),
			'pagination' => false,
			
        ]);

        return $this->renderAjax('subject_assign', [
			'model' => $model,
			'sub_id' => $sub_id,
            'dataProvider' => $dataProvider,
			'classid' => $class_id,
			'course_name' => $course_name['course_name'],
			'course_id' => $course_name['course_id'], 
        ]);

       /*  if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        } */
		
		
		
		
		//$model = new FacultyMap();
		$model->sub_id = $sub_id;
		
		
		
    }
	}

    /**
     * Deletes an existing Subjects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }

    
    /**
     * Finds the Subjects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subjects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subjects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Attendance
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    
}
