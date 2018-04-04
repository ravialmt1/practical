<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Students;
use frontend\models\Attendance;
use yii\base\Model;
use frontend\models\StudentsSearch;
use frontend\models\AttendanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StudentsController implements the CRUD actions for Students model.
 */
class AttendanceController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
		 
    return [
        'access' => [
            'class' => \yii\filters\AccessControl::className(),
            'only' => ['index','view','create', 'update'],
            'rules' => [
                // deny all POST requests
                [
                    'allow' => false,
                    'verbs' => ['POST']
                ],
                // allow authenticated users
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
                // everything else is denied
            ],
        ],
    

        
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
	//$session->destroy();
	
	$clas=$_GET['clas'];
	$section=$_GET['section'];
	$teacher_id=$_GET['uid'];
	$subc=$_GET['subc'];
	
	
	$session = Yii::$app->session;
	$session->set('clas', $clas);
	$session->set('section', $section);
	$session->set('teacher_id', $teacher_id);
	$session->set('subc', $subc);
	/*
	$request = Yii::$app->request;
	$teacher_id = $request->get('uid');
	$class_id = $request->get('uid');
	$subject_id = $request->get('subc');
	$id = $request->get('uid');
	*/
    $searchModel = new StudentsSearch(['student_clas'=>$session->get('clas'),'section' =>$session->get('section')]);
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		//$dataProvider->query->andWhere(['student_clas'=>'1','section' =>'a']);
		
		
    $models = $dataProvider->getModels();
	//var_dump($models);
    if (Model::loadMultiple($models, Yii::$app->request->post())) {
        $count = 0;
		
        foreach ($models as $index => $model) {
			
			$att = new Attendance();
            // populate and save records for each model
			//$att->id=2;
			$att->student_id = $model -> id;
			$att->teacher_id =$session->get('teacher_id');
			$att->class_id = $session->get('clas');
			$subc = $session->get('subc');
			$att->subject_id = (int)$subc;
			
			$att->att_date = date("Y-m-d");
			$att->att_status = $_POST['Students'][$index]['attstatus'];
			//$att->att_status = 0;
			//Students[43][attstatus] students-12-attstatus
            var_dump($att->save());
			try {
				if ($att->save()) {
                $count++;
            }
				}catch (\yii\db\Exception $e) {
    echo "NotFoundHttpException";
}
			
			
			
			
        }
       Yii::$app->session->setFlash('success', "Processed {$count} records successfully.");
        return $this->redirect(['clas/index']); // redirect to your next desired page 
    } else {
		
        return $this->render('create', [
		'models' => $models,
            
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
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
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

        return $this->redirect(['index']);
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
