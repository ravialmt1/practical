<?php

namespace app\controllers;

use Yii;
use app\models\Feedback;
use app\models\FeedbackFaculty;
use app\models\FeedbackcourseMatrix;
use app\models\FeedbackSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
$connection = \Yii::$app->db;
/**
 * FeedbackController implements the CRUD actions for Feedback model.
 */
class FeedbackController extends Controller
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
     * Lists all Feedback models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FeedbackSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Feedback model.
     * @param integer $id
     * @return mixed
     */
    
	 public function actionThanks()
    {
        return $this->render('thanks', [
            //'model' => $this->findModel($id),
        ]);
    }
	
	public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Feedback model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
	
    public function actionCreate($uni_id,$course,$sem)
    {
		$it=1;
        $model = new Feedback();
		$model2 = new FeedbackFaculty();
/* if (!$model->save()) {
    
	//$sql ="SELECT * FROM `subjects` WHERE `university_id` = 1 and `course` = 'Bachelor of Management Studies (BMS)'";
			 
			 $model -> subject_id = (new Query())->select(['sub_id'])->from('subjects')->where(['sub_name' => $subject])->one();
			 
} */
$sub_count = (new \yii\db\Query())->select(['sub_name'])->from('subjects')->where(['university_id' =>$uni_id, 'course' => $course,'sem' => $sem])->count();

$rows = (new \yii\db\Query())->select(['sub_name'])->from('subjects')->where(['university_id' => $uni_id, 'course' => $course, 'sem'=>$sem])->all();
if ( $model->load(Yii::$app->request->post())&& $model->save()) {
        	$subject_id = $model -> subject_id;
			$subject_id++;
			
			$subject = (new \yii\db\Query())->select(['sub_name'])->from('subjects')->where(['university_id' => $uni_id, 'course' => $course, 'sem'=>$sem,'sub_id' => $subject_id])->one()['sub_name'];
			$model -> subject_id = $subject_id;
					
			$reg_num = $model -> reg_no;
			
			
			if($subject==NULL)
			{return $this->redirect(['thanks']);}
         else 
		 {
			 
			 $model = new Feedback();
			 $model -> subject_id = (new Query())->select(['sub_id'])->from('subjects')->where(['sub_name' => $subject])->one()['sub_id'];
			 $model -> reg_no = $reg_num;
            return $this->render('create', [
                'model' => $model,
				'subject' => $subject,
				            ]);
        }
		}
		else
		{
			//$rows = (new Query())->select(['sub_name'])->from('subjects')->where(['university_id' => $uni_id, 'course' => $course,'sem' => $sem])->all();
			 
			 $subject = $rows[$it-1]['sub_name'];
			$model -> subject_id = (new Query())->select(['sub_id'])->from('subjects')->where(['sub_name' => $subject])->one()['sub_id'];
		return $this->render('create', [
                'model' => $model,
				//'it' => $it,
				'subject' => $subject,
            ]);	
		}
    }

    
	
	public function actionCreate2($university,$course,$batch,$sem,$regNo)
    {
		$it=1;
        $model = new Feedback();
		$model2 = new FeedbackFaculty();
		$subjects = new FeedbackcourseMatrix;
/* if (!$model->save()) {
    
	//$sql ="SELECT * FROM `subjects` WHERE `university_id` = 1 and `course` = 'Bachelor of Management Studies (BMS)'";
			 
			 $model -> subject_id = (new Query())->select(['sub_id'])->from('subjects')->where(['sub_name' => $subject])->one();
			 
} */
$uni = $university;
$course = $course;
$batch = $batch;
$sem = $sem;


//SELECT COUNT(*) FROM `feedback_coursematrix` WHERE `university` = 'TMU' AND `course_name` = 'MBA(A&DM)' and `batch`='2016-18' and `semester` =4
$sub_count = (new \yii\db\Query())->select(['subject'])->from('feedback_coursematrix')->where(['university' =>$uni, 'course_name' => $course,'semester' => $sem,'batch' =>$batch])->count();

$rows = (new \yii\db\Query())->select(['subject','subject_code','faculty'])->from('feedback_coursematrix')->where(['university' => $uni, 'course_name' => $course, 'batch' =>$batch,'semester'=>$sem])->all();
$counter = 1;

        	$subjects = FeedbackcourseMatrix::find() ->select(['subject','faculty'])->from('feedback_coursematrix')->where(['university' => $uni, 'course_name' => $course, 'batch' =>$batch,'semester'=>$sem])->all();


		$model = new Feedback();	
				
				//$subject = $subject['subject'];
				$model = new Feedback();
				$first_subject = $rows[0]['subject'];
				$first_faculty = $rows[0]['faculty'];
	//			array_shift($rows); //Remove first element of the array
				$model = new Feedback();					
if ( $model->load(Yii::$app->request->post())&& $model->save()) {
	//$model = new Feedback();
	$subject_id = $model -> subject_id;
	$key = array_search($subject_id, array_column($rows, 'subject_code')); // $key = 2;
	$key++;
	if($key >= ($sub_count-1))
		return $this->redirect(['thanks']);
	$model = new Feedback();
	if (array_key_exists($key, $rows)) {
		
	$model->subject_id = $rows[$key]['subject_code'];
	
	$model->reg_no = $regNo;
	if($subject = $rows[$key]['subject'])
	{
	return $this->render('create', [
                'model' => $model,
				'subject' => $subject,
				'university' => $uni,
				'faculty' => $rows[$key]['faculty']
				            ]);
	}
	}
	else
	{
var_dump($rows);
echo $sub_count;		
}
}


else
{
	

	  $model->subject_id = $rows[0]['subject_code'];
	  $model->reg_no = $regNo;
	return $this->render('create', [
                'model' => $model,
				'subject' => $first_subject,
				'university' => $uni,
				'faculty' => $first_faculty,
								            ]);
}
					
	
}
			
	
			
			
			
			/* $subject_id = $model -> subject_id;
			$subject_id++;
			
			$subject = (new \yii\db\Query())->select(['subject'])->from('feedback_coursematrix')->where(['university' => $uni, 'course_name' => $course, 'batch' =>$batch,'semester'=>$sem,'subject_code' => $subject_id])->one()['subject'];
			$model -> subject_id = $subject_id;
					
			$reg_num = $model -> reg_no;
			
			
			if($subject==NULL)
			{return $this->redirect(['thanks']);}
         else 
		 {
			 
			 $model = new Feedback();
			 $model -> subject_id = (new Query())->select(['subject_code'])->from('feedback_coursematrix')->where(['subject' => $subject])->one()['subject_code'];
			 $model -> reg_no = $reg_num;
            return $this->render('create', [
                'model' => $model,
				'subject' => $subject,
				            ]);
        }
		}
		else
		{
			//$rows = (new Query())->select(['sub_name'])->from('feedback_coursematrix')->where(['university_id' => $uni_id, 'course' => $course,'sem' => $sem])->all();
			 
			 $subject = $rows[$it-1]['subject'];
			$model -> subject_id = (new Query())->select(['subject_code'])->from('feedback_coursematrix')->where(['subject' => $subject])->one()['subject_code'];
		return $this->render('create', [
                'model' => $model,
				//'it' => $it,
				'subject' => $subject,
            ]);	
		} */
    

	/**
     * Updates an existing Feedback model.
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
     * Deletes an existing Feedback model.
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
     * Finds the Feedback model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Feedback the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Feedback::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
