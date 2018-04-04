<?php

namespace app\controllers;

use Yii;
use app\models\Students;
use app\models\StudentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
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
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StudentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Students model.
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
     * Creates a new Students model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Students();
		$searchModel = new StudentsSearch();
		
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		$session = Yii::$app->session;
		$sem = $session->get('sem');
		$course_id = $session->get('course_id');
		$uni_id = $session->get('uni_id');
		$course_name = $session->get('course');
		$dataProvider->query->where([
        //... other searched attributes here
		'student_clas' => $sem,
		'uni_id' => $uni_id,
    ]);
		$model ->student_clas =$sem;
		$model->course_id = $course_id;
		$model->uni_id = $uni_id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			$session->setFlash('success', 'Student  <strong>'.$model->first_name .' '.$model->last_name.'</strong> added successfully.');
           return $this->render('create', [
                'model' => $model,
				 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'student_clas' => $sem,
			'uni_id' => $uni_id,
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
				 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'student_clas' => $sem,
			'uni_id' => $uni_id,
            ]);
        }
    }

    /**
     * Updates an existing Students model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findmodel($id);
		
$searchModel = new StudentsSearch();
		
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$session = Yii::$app->session;
		$sem = $session->get('sem');
		$course_id = $session->get('course_id');
		$uni_id = $session->get('uni_id');
		$course_name = $session->get('course');
		$dataProvider->query->where([
        //... other searched attributes here
		'student_clas' => $sem,
		'uni_id' => $uni_id,
    ]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('index', [
                'model' => $model,
				 'dataProvider' => $dataProvider,
				  'searchModel' => $searchModel,
			'student_clas' => $sem,
			'uni_id' => $uni_id,
            ]);
        } else {
			$model = $this->findmodel($id);
            return $this->render('update', [
                'model' => $model,
				 'dataProvider' => $dataProvider,
				  'searchModel' => $searchModel,
			'student_clas' => $sem,
			'uni_id' => $uni_id,
            ]);
        }
    }

    /**
     * Deletes an existing Students model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
		 $model = new Students();
$searchModel = new StudentsSearch();
		
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$session = Yii::$app->session;
		$sem = $session->get('sem');
		$course_id = $session->get('course_id');
		$uni_id = $session->get('uni_id');
		$course_name = $session->get('course');
		$dataProvider->query->where([
        //... other searched attributes here
		'student_clas' => $sem,
		'uni_id' => $uni_id,
    ]);
        return $this->render('create', [
                'model' => $model,
				 'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'student_clas' => $sem,
			'uni_id' => $uni_id,
            ]);
    }

    /**
     * Finds the Students model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Students the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
