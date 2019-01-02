<?php

namespace app\controllers;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use Yii;
use app\models\Classfees;
use app\models\Classes;
use app\models\Course;
use app\models\Classstudents;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClassfessController implements the CRUD actions for Classfees model.
 */
class ClassfessController extends Controller
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
     * Lists all Classfees models.
     * @return mixed
     */
    public function actionIndex($id)
    {
		$query = new Query;
$query	->select(['class_students.id','student_name','class_fees.amount','class_fees.particulars','class_fees.feesdate'])  
        ->from('class_students')
		->where(['class_students.class_id'=>$id])
        ->join(	'INNER JOIN', 
            'class_fees',
            'class_fees.classstudent_id =class_students.id'
        )->orderBy ('class_students.student_name') ; 
		//SELECT class_students.id, student_name FROM `class_students`  INNER JOIN `class_fees` ON class_fees.classstudent_id =class_students.id
$command = $query->createCommand();
$data = $command->queryAll();
//find()->where(...)->sum('column');
		$students = Classstudents::find()->where(['class_id' => $id])->count();
		$students_list = Classstudents::find()->where(['class_id' => $id])->asArray()->All();
		$classfees = Classfees::find()->where(['class_id' => $id])->sum('amount');
		$session = Yii::$app->session;
		$university_id = $session->get('uni_id');
        $course = Classes::find('course_id')->where(['id' => $id])->One();
		$course_name = Course::find('course_name')->where(['course_id' => $course, 'uni_id' =>$university_id])->One();
		
        return $this->render('index', [
            'classfees' => $classfees,
			'students' => $students,
			'students_list' => $students_list,
			'data' => $data,
			'classid' => $id,
			'course_id' => $course_name['course_id'],
        ]);
    }

    /**
     * Displays a single Classfees model.
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
     * Creates a new Classfees model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Classfees();
	$students_list =ArrayHelper::map(Classstudents::find()->where(['class_id' => $id])->asArray()->All(), 'id', 'student_name');
//$students_list = Classstudents::find()->where(['class_id' => $id])->asArray()->All();
        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['index', 'id' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'students_list' => $students_list,
				'classid' => $id,
            ]);
        }
    }

    /**
     * Updates an existing Classfees model.
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

    /**
     * Deletes an existing Classfees model.
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
     * Finds the Classfees model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Classfees the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Classfees::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
