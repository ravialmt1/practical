<?php

namespace app\controllers;

use Yii;
use app\models\Classes;
use app\models\Classfees;
use app\models\Students;
use app\models\Course;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ClassesController implements the CRUD actions for Classes model.
 */
class ClassesController extends Controller
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
     * Lists all Classes models.
     * @return mixed
     */
    public function actionIndex($id)
    {
		$model = new Course();
		$session = Yii::$app->session;
		$university_id = $session->get('uni_id');
        $dataProvider = new ActiveDataProvider([
            'query' => Classes::find()->where(['course_id' => $id]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
			'model' => $model,
			'id' => $id,
        ]);
    }

    /**
     * Displays a single Classes model.
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
	
	public function actionPromote($id)
    {
        $model = $this->findModel($id);
        return $this->render('promote', [
            'model' => $this->findModel($id),
        ]);
    }
	
	public function actionClassview($id)
    {
        $model = $this->findModel($id);
        return $this->render('classview', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Classes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Classes();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
			//$model -> course_id = $id;
            return $this->redirect(['view', 'id' => $model->id]);
        } elseif (Yii::$app->request->isAjax) {
            return $this->renderAjax('create', [
                        'model' => $model,
						'id' => $id,
            ]);
        } else {
            return $this->render('create', [
                        'model' => $model,
						'id' => $id,
            ]);
        }
		
		
    }

	public function actionStudents($id)
     {
		$model = new Students();
		//$get_val = Yii::$app->request->post('Students');
		$class = Classes::findOne($id);
$id = $class->id;

$course_id = $class->course_id;
$sem = $class->sem;
$section = $class->section;
		$query=Students::find()->where(['course_id'=>$course_id,'semester' => $sem,'section' => $section]);
		//$pages = new Pagination(['totalCount' => $query->count()]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			
			

        ]);

        return $this->render('students', [
            'dataProvider' => $dataProvider,
			'model' => $model,
			//'pages' => $pages,
			
			
			
        ]);
    }
    /**
     * Updates an existing Classes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
	public function actionResultsheet($id)
    {
                 return $this->render('result_sheet', [
            'course_id' => $id,
        ]);
    }
	
	public function actionFees($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Classfees::find((['class_id' => $id])),
        ]);

        return $this->render('fees', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Deletes an existing Classes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id,$classid)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index?id=$classid']);
    }

    
    /**
     * Finds the Classes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Classes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Classes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
