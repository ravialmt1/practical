<?php

namespace frontend\controllers;
use  yii\web\Session;

use Yii;
use frontend\models\Subject;
use frontend\models\SubjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubjectController implements the CRUD actions for Subject model.
 */
class SubjectController extends Controller
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
     * Lists all Subject models.
     * @return mixed
     */
    public function actionIndex()
    {
		
		$session = Yii::$app->session;
		
	if(isset($_POST['clas'])){
			$clas=$_POST['clas'];
			$session->set('clas', $clas);
		

			$section=$_POST['section'];
			$session->set('section', $section);
		
	
	}	
        $searchModel = new SubjectSearch(['clas'=>$session->get('clas'),'section' =>$session->get('section')]);
		
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
		'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'clas' => $session->get('clas'),
			'section' => $session->get('section'),
        ]);
    }

    /**
     * Displays a single Subject model.
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
     * Creates a new Subject model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Subject();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['..\clas\index']);
        } else {
			
           return $this->render('create', [
                'model' => $model,
				//'clas' =>$clas,
				//'section' =>$section,
            ]);
        }
    }

    /**
     * Updates an existing Subject model.
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
     * Deletes an existing Subject model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model= $this->findModel($id);
try {
     $model->delete();
} catch(\yii\db\IntegrityException $e) {
     throw new \yii\web\ForbiddenHttpException('Could not delete this record.' );
}

        return $this->redirect(['index']);
    }

    /**
     * Finds the Subject model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Subject the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Subject::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
