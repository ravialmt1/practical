<?php

namespace frontend\controllers;
use  yii\web\Session;
use yii;
use Yii\helpers\ArrayHelper;
use frontend\models\Clas;
use frontend\models\ClasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Classes;
use frontend\models\ClassesSearch;
use frontend\models\User;

/**
 * ClasController implements the CRUD actions for Clas model.
 */
class ClasController extends Controller
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
     * Lists all Clas models.
     * @return mixed
     */
    public function actionIndex()
    {
		$session = Yii::$app->session;
		$session->close();

// destroys all data registered to a session.

//$session->destroy();

		
        $searchModel = new ClasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->query->andWhere(['teacher_id'=>Yii::$app->user->id]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clas model.
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
     * Creates a new Clas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clas();
		$searchModel = new ClassesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post())) {
					
			$model->teacher_id=Yii::$app->user->id;
			
			$model->save();
			//print_r(Yii::$app->user->id);
			//var_dump($model->save());
           //return $this->redirect(['view', 'id' => $model->id]);
        } else {
			$classes = ArrayHelper::map(Classes::find()->all(), 'id', 'clas_name');
			$sections = ArrayHelper::map(Classes::find()->all(), 'id', 'section');
			$teachers = ArrayHelper::map(User::find()->all(), 'id', 'username');
            return $this->render('create', [
                'model' => $model,
				'classes' => $classes,
				'sections' => $sections,
				'teachers' => $teachers,
				'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Updates an existing Clas model.
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
     * Deletes an existing Clas model.
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
     * Finds the Clas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Clas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Clas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
