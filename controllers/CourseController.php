<?php

namespace app\controllers;

use Yii;
use app\models\Course;
use app\models\Events;
use app\models\CourseSearch;
use app\models\Students;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends Controller
{
    public function behaviors()
    {
        $behaviors['verbs'] = [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ];
		$behaviors['access'] = [
		'class' => AccessControl::className(),
		'rules' => [
			[
			'allow' => true,
			'roles' => ['@'],
			'matchCallback' => function($rules,$action){
				$action =Yii::$app->controller->action->id;
				$controller = Yii::$app->controller->id;
				$route = "$action$controller";
				$post = yii::$app->request->post();
				if(\Yii::$app->user->can($route)){
					
					return true;
				}
				
			} 
			]
		]
        ];
		return $behaviors;
    }

    /**
     * Lists all Course models.
     * @return mixed
     */
    public function actionIndex()
    {
		 $searchModel = new CourseSearch();
		 $session = Yii::$app->session;
		$university_id = $session->get('uni_id');
		$year = 2018;
		 if($university_id!='11111111'){
		 $query = Course::find();
$query->andFilterCompare('course_batch_end', '>2018'); 
 $dataProvider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        'pageSize' => 50,
    ],
    
]);
        //$dataProvider = $searchModel->search(Yii::$app->request->get(['uni_id' => 4]));

        return $this->render('corporate/index', [
            'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
        ]);
		 }
		 else
		 {
			$query = Course::find()->where(['uni_id' => $university_id]);
$query->andFilterCompare('course_batch_end', '>2018');  
 $dataProvider = new ActiveDataProvider([
    'query' => $query,
    'pagination' => [
        'pageSize' => 50,
    ],
    
]);
        //$dataProvider = $searchModel->search(Yii::$app->request->get(['uni_id' => 4]));

        return $this->render('index', [
            'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
        ]);
		 }
		
    }

    /**
     * Displays a single Course model.
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
	
	public function actionExamination($id)
    {
        $model = $this->findModel($id);
        return $this->render('examination',['model' => $model
        ]);
    }
	
	public function actionSectionview($id)
    {
		$dataProvider = new ActiveDataProvider([
            'query' => Students::find()->where(['course_id' => $id]),
        ]);
        $model = $this->findModel($id);
        return $this->render('sectionview', [
             'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		
        $model = new Course();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->course_id]);
        } elseif (Yii::$app->request->isAjax) {
            return $this->renderAjax('create', [
                        'model' => $model
            ]);
        } else {
            return $this->render('create', [
                        'model' => $model
            ]);
        }
		
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->course_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
	public function actionInfra($id)
    {
                 return $this->render('infra', [
            'course_id' => $id,
        ]);
    }
	public function actionFees($id)
    {
                 return $this->render('fees', [
            'course_id' => $id,
        ]);
    }
	 public function actionEvents()
    {
		//$events = array();
		$times = Events :: find()->all();
		

    foreach ($times AS $time){
      //Testing
      $Event = new \yii2fullcalendar\models\Event();
      $Event->id = $time->id;
      $Event->title = $time->title;
      $Event->start = $time -> created_at;
      $events[] = $Event;
    }

        

        return $this->render('events', [
            'events' => $events,
        ]);
    }

    
    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
