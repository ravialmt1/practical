<?php

namespace app\controllers;

use Yii;
use app\models\Subjects;
use app\models\SubjectsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubjectsController implements the CRUD actions for Subjects model.
 */
class SubjectsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Subjects models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubjectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
	
	public function actionClass()
    {
		$request = Yii::$app->request;

		$sem = $request->get('sem');
		$course_name = $request->get('course');
		$course_id = $request->get('course_id');
		$uni_id = $request->get('uni_id');
		$session = Yii::$app->session;
		$session->set('sem',$sem);
		$session->set('course_id',$course_id);
		$session->set('uni_id',$uni_id);
		$session->set('course',$course_name);
        $searchModel = new SubjectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		 //$dataProvider->query->where('employee.role <> \'regular\'');
		$dataProvider->query->where([
        //... other searched attributes here
		'sem' => $sem,
		'university_id' => $uni_id,
    ]);
		

        return $this->render('class', [
            
			'sem' => $sem,
			'course_name' => $course_name,
			'course_id' => $course_id,
			'uni_id' => $uni_id,
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subjects model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
		
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Subjects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subjects();
		$session = Yii::$app->session;
		$sem = $session->get('sem');
		$course_id = $session->get('course_id');
		$uni_id = $session->get('uni_id');
		$course_name = $session->get('course');
		/* $request = Yii::$app->request;

		$sem = $request->get('sem');
		$course_id = $request->get('course_id');
		$uni_id = $request->get('uni_id'); */

		$searchModel = new SubjectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		 //$dataProvider->query->where('employee.role <> \'regular\'');
		$dataProvider->query->where([
        //... other searched attributes here
		'sem' => $sem,
		'university_id' => $uni_id,
    ]);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$session->setFlash('success', 'Record  <strong>"'. '"</strong> added successfully.');
            return $this->render('create', [
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
                'model' => $model,
				'sem' => $sem,
			'course_name' => $course_name,
			'course_id' => $course_id,
			'uni_id' => $uni_id,
            ]);
        } else {
            return $this->render('create', [
			'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
                'model' => $model,
				'sem' => $sem,
			'course_name' => $course_name,
			'course_id' => $course_id,
			'uni_id' => $uni_id,
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
		
		$session = Yii::$app->session;
		$sem = $session->get('sem');
		$course_id = $session->get('course_id');
		$uni_id = $session->get('uni_id');
		$course_name = $session->get('course');
        $model = $this->findModel($id);
$searchModel = new SubjectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		 //$dataProvider->query->where('employee.role <> \'regular\'');
		$dataProvider->query->where([
        //... other searched attributes here
		'sem' => $sem,
		'university_id' => $uni_id,
    ]);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$session->setFlash('success', 'Record  <strong>"'. '"</strong> deleted successfully.');

            return $this->render('create', [
                'model' => $model,
				'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
				'sem' =>$sem,
				'course_id' => $course_id,
				'course_name' => $course_name,
				'uni_id' => $uni_id,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
				'sem' =>$sem,
				'course_id' => $course_id,
				'course_name' => $course_name,
				'uni_id' => $uni_id,
            ]);
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
        $model = $this->findModel($id);
        $name = $model->sub_name;

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', 'Record  <strong>"' . $name . '"</strong> deleted successfully.');
        }

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
}
