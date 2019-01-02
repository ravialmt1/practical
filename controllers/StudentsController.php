<?php

namespace app\controllers;

use Yii;
use app\models\Students;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * StudentsController implements the CRUD actions for Students model.
 */
class StudentsController extends Controller
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
     * Lists all Students models.
     * @return mixed
     */
    public function actionIndex()
    {
		$model = new Students();
		$get_val = Yii::$app->request->post('Students');
		$query=Students::find()->where(['course_id'=>$get_val['course_id'],'semester' => $get_val['semester'],'section' => $get_val['section']]);
		$pages = new Pagination(['totalCount' => $query->count()]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			
			

        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
			'model' => $model,
			'pages' => $pages,
			
			
			
        ]);
    }
	
	public function actionViewstudents()
    {
		$model = new Students();
		if ($model->load(Yii::$app->request->post()) ) {
			$post_val = Yii::$app->request->post('Students');
			 $dataProvider = new ActiveDataProvider([
            'query' => Students::find()->where(['uni_id' => $post_val['uni_id'],'course_id' => $post_val['course_id'],'semester' => $post_val['semester'],'section' => $post_val['section']]),
			'pagination'=> ['defaultPageSize' => PAGE_SIZE],
        ]);
            return $this->render('viewstudents2', ['dataProvider' => $dataProvider]);
        }
		else
		{
		
        $dataProvider = new ActiveDataProvider([
            'query' => Students::find(),
        ]);

        return $this->render('viewstudents', [
            //'dataProvider' => $dataProvider,
			'model' => $model,
			//'row' => $row,
        ]);
		}
    }

    /**
     * Displays a single Students model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerAttendance = new \yii\data\ArrayDataProvider([
            'allModels' => $model->attendances,
        ]);
        $providerSection = new \yii\data\ArrayDataProvider([
            'allModels' => $model->sections,
        ]);
        $providerStudentsAcademic = new \yii\data\ArrayDataProvider([
            'allModels' => $model->studentsAcademics,
        ]);
        $providerStudentsPersonal = new \yii\data\ArrayDataProvider([
            'allModels' => $model->studentsPersonals,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerAttendance' => $providerAttendance,
            'providerSection' => $providerSection,
            'providerStudentsAcademic' => $providerStudentsAcademic,
            'providerStudentsPersonal' => $providerStudentsPersonal,
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
		

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				
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

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
	
	public function actionProfile() // put userid of the loggen in user if he is a student and fetch all details and display in his / her profile
    {
        /* $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else { */
            return $this->render('profile');
             /*    'model' => $model,
            ]);
        } */
    }

    /**
     * Deletes an existing Students model.
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
    
    /**
    * Action to load a tabular form grid
    * for Attendance
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddAttendance()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Attendance');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formAttendance', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Section
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddSection()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Section');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSection', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for StudentsAcademic
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddStudentsAcademic()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('StudentsAcademic');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formStudentsAcademic', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for StudentsPersonal
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddStudentsPersonal()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('StudentsPersonal');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formStudentsPersonal', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
