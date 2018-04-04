<?php
namespace app\controllers;
use yii\db\Query;
use Yii;
use app\models\Subjects;
use app\models\SubjectsSearch;
use yii\web\Controller;

use app\models\University;
use app\models\Faculty;
use app\models\Course;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubjectsController implements the CRUD actions for Subjects model.
 */
class ReportsController extends Controller
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
    public function actionReport()
    {
		$model = new Subjects();

        if ($model->load(Yii::$app->request->post())){
		$request = Yii::$app->request;
		
 $sub_name = $model->sub_name;

//echo "$sub_name.................$sub_name"; 
$query = new Query;
 
        // get your HTML raw content without any layouts or scripts
		$query ->SELECT ('id,reg_no,q1 ,q2 ,q3 ,q4 ,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18')
				->FROM ('feedback') 
								//->leftJoin('feedback_faculty','feedback_faculty.feed_id= feedback.id')
				->where(['subject_id' => $sub_name]);
$command = $query->createCommand();
				
				$rows = $command->queryAll();
				$content ="<h2>Ratings </h2><table border='1' width='100%'><tr><td align = 'center'> <b>Q 1</b></th><th align = 'center'> Q 2</th><th align = 'center'>Q 3</th><th align = 'center'> Q 4</th><th align = 'center'>Q 5</th><th align = 'center'>Q 6</th><th align = 'center'>Q 7</th><th align = 'center'>Q 8</th><th align = 'center'>Q 9</th><th align = 'center'>Q 10</th><th align = 'center'>Q 11</th><th align = 'center'>Q 12</th><th align = 'center'>Q 13</th><th align = 'center'>Q 14</th><th align = 'center'>Q 15</th><th align = 'center'>Q 16</th><th align = 'center'>Q 17</th><th align = 'center'>Q 18</th></tr><tr>";
				foreach($rows as $row)
				{
					$content = $content. "<tr><td align = 'center'> $row[q1]</td><td align = 'center'> $row[q2]</td><td align = 'center'> $row[q3]</td><td align = 'center'> $row[q4]</td><td align = 'center'> $row[q5]</td><td align = 'center'> $row[q6]</td><td align = 'center'> $row[q7]</td><td align = 'center'> $row[q8]</td><td align = 'center'> $row[q9]</td><td align = 'center'> $row[q10]</td><td align = 'center'> $row[q11]</td><td align = 'center'> $row[q12]</td><td align = 'center'> $row[q13]</td><td align = 'center'> $row[q14]</td><td align = 'center'> $row[q15]</td><td align = 'center'> $row[q16]</td><td align = 'center'> $row[q17]</td><td align = 'center'> $row[q18]</td></tr>";
				}
				
				$content = $content ."</tr></table>";
		
		$query = new Query;
 
        // get your HTML raw content without any layouts or scripts
		$query ->SELECT ('id,reg_no,AVG(q1)/4 as Q1,(AVG(q2)/4) as Q2,(AVG(q3)/4) as Q3,(AVG(q4)/4) as Q4,(AVG(q5)/4) as Q5,(AVG(q6)/4) as Q6,(AVG(q7)/4) as Q7,(AVG(q8)/4) as Q8,(AVG(q9)/4) as Q9,(AVG(q10)/4) as Q10,(AVG(q11)/4) as Q11,(AVG(q12)/4) as Q12,(AVG(q13)/4) as Q13,(AVG(q14)/4) as Q14,(AVG(q15)/4) as Q15,(AVG(q16)/4) as Q16,(AVG(q17)/4) as Q17,(AVG(q18)/4) as Q18')
				->FROM ('feedback') 
				->where(['subject_id' => $sub_name]);

				
				$content =$content."<h2>Percentage of feedback for each Question</h2><table border='1' width='100%'><tr><th>% marks Q1</th><th>% marks Q2</th><th>% marks Q3</th><th>% marks Q4</th><th>% marks Q5</th><th>% marks Q6</th><th>% marks Q7</th><th>% marks Q8</th><th>% marks Q9</th><th>% marks Q10</th><th>% marks Q11</th><th>% marks Q12</th><th>% marks Q13</th><th>% marks Q14</th><th>% marks Q15</th><th>% marks Q16</th><th>% marks Q17</th><th>% marks Q18</th></tr><tr>";
				$command = $query->createCommand();
				
				$rows = $command->queryAll();
				foreach($rows as $row)
				{
					$Q1 = ROUND($row['Q1'],2)*100;
					$Q2 = ROUND($row['Q2'],2)*100;
					$Q3 = ROUND($row['Q3'],2)*100;
					$Q4 = ROUND($row['Q4'],2)*100;
					$oc = ROUND(($Q1*.25+$Q2*.25+$Q3*.25+$Q4*.25)*.2,0);
					$Q5 = ROUND($row['Q5'],2)*100;
					$Q6 = ROUND($row['Q6'],2)*100;
					$pedagogy = ROUND(($Q5*.5+$Q6*.5)*.2,0);
					$Q7 = ROUND($row['Q7'],2)*100;
					$Q8 = ROUND($row['Q8'],2)*100;
					$Q9 = ROUND($row['Q9'],2)*100;
					$interaction = ROUND((($Q7*.33+$Q8*.33+$Q9*.34))*.25,0);
					$Q10 = ROUND($row['Q10'],2)*100;
					$Q11 = ROUND($row['Q11'],2)*100;
					$practical = ROUND((($Q10*.5+$Q11*.5))*.15,0);
					$Q12 = ROUND($row['Q12'],2)*100;
					$Q13 = ROUND($row['Q13'],2)*100;
					$Q14 = ROUND($row['Q14'],2)*100;
					$assesment = ROUND((($Q12*.335+$Q13*.335+$Q14*.33))*.15,0);
					$Q15 = ROUND($row['Q15'],2)*100;
					$joy = ROUND(($Q15)*.05,0);
					$Q16 = ROUND($row['Q16'],2)*100;
					$Q17 = ROUND($row['Q17'],2)*100;
					$Q18 = ROUND($row['Q18'],2)*100;
					$lms = ($Q16*.335+$Q17*.335+$Q18*.33);
					$overall_rating = ($oc+$pedagogy+$interaction+$practical+$assesment+$joy);
					
					$content=$content."<td align = 'center'>$Q1% </td><td align = 'center'>$Q2% </td><td align = 'center'>$Q3% </td><td align = 'center'>$Q4% </td><td align = 'center'>$Q5% </td><td align = 'center'>$Q6% </td><td align = 'center'>$Q7% </td><td align = 'center'>$Q8% </td><td align = 'center'>$Q9% </td><td align = 'center'>$Q10% </td><td align = 'center'>$Q11% </td><td align = 'center'>$Q12% </td><td align = 'center'>$Q13% </td><td align = 'center'>$Q14% </td><td align = 'center'>$Q15% </td><td align = 'center'>$Q16% </td><td align = 'center'>$Q17% </td><td align = 'center'>$Q18% </td>";
				
				}
				
				$content = $content ."</tr></table>";
        
		$content =$content."<h2>Percentage of Feedback for each Category</h2><table border='1' width='100%'><tr><th>organizational Capabilities Marks</th><th>Pedagogy marks</th><th>Interaction and Engagement</th><th>Practical-Industrial Awareness</th><th>Assessments Marks</th><th>Joy of Learning Marks</th></tr>";
         $content = $content."<tr><td align = 'center'>$oc %</td><td align = 'center'>$pedagogy %</td><td align = 'center'>$interaction %</td><td align = 'center'>$practical %</td><td align = 'center'>$assesment %</td><td align = 'center'>$joy %</td></tr></table>";
		 
		 $content =$content."<h2>Overall Percentage of feedback for faculty is $overall_rating %</h2><br />";
		 $content =$content."<h2>The LMS and Infrastructure rating is $lms %</h2>";

        // setup kartik\mpdf\Pdf component
       return $this->render('chart', [
            'overall_rating' =>$overall_rating,
			'lms' =>$lms,
			'content' =>$content,
        ]);
 

	}	
    


else  {
            return $this->render('create', [
                
            ]);
        }
}
		/**
     * Updates an existing Subjects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */






	public function actionReport2() {
		$model = new Subjects();
		$uni_model = new University();
		$fac_model = new Faculty();
		if ($model->load(Yii::$app->request->post()) && $uni_model -> load(Yii::$app->request->post())){
		
		//$uni_model = new University();
	//$sub_model = new Subjects();
	$course_model = new Course();

	//$request = Yii::$app->request->post('University[university_name]');
		$university = $uni_model->university_name;
		//var_dump($university);
		//echo "$request---------------------------";
		$course = $model->course;
		
		//echo $fac;
		$faculty = $model->faculty_id;
		
		$course_duration = $course_model::find() -> select('course_duration')->where(['course_id'=>$course])->one();
		$course_name = $course_model::find() -> select('course_name')->where(['course_id'=>$course])->one();
		$course_n = $course_name['course_name'];
		$course_dura = $course_duration['course_duration'];
		$sem = $model ->sem;
		$years = ceil($sem/2);
		$t_date = date("Y");
		$f_date = $t_date-$years;
		$to_date = $f_date + $course_dura;
		$batch = "$f_date - $to_date";
		//echo "$sem---------------$sem=========$course";
		$sub_name = subjects::find()->select('sub_id, sub_name')->where(['course' => $course,'sem'=>$sem])->all();
		$data = ArrayHelper::toArray($sub_name, [
    'app\models\Subjects' => [
        'sub_id',
        'sub_name',
               
    ],
]);
		//var_dump($data);
//$sub_name = array("COST ACCOUNTING","ENTERPRISE RESOURCE PLANNING");

	
$content ="<table border='1'><tr>";
$content =$content."<tr><th>University</th><th>Course</th><th>Semester</th><th>Batch</th><th>Faculty</th><th>Subject</th><th>Organizational Capabilities</th><th>Pedagogy</th><th>Interaction and Engagement</th><th>Practical-Industrial Awareness</th><th>Assessments Marks</th><th>Joy of Learning Marks</th><th>Overall</th><th>LMS and Infrastructure</th></tr>";
 $subjects=array();
 $i=0;
 foreach ($data as $sectionKey => $line) {
  foreach ($line as $key => $value) {
	//print_r($value);
	array_push($subjects,$value);
 }
 }
 //print_r($subjects);
 foreach($subjects as $subject){
	 $i++;
	 if($i%2==0)
	 {
		 
        // get your HTML raw content without any layouts or scripts
	
				
		
		$query = new Query;
 
        // get your HTML raw content without any layouts or scripts
		$query ->SELECT ('faculty_id,sub_name,university_id,course,id,reg_no,AVG(q1)/4 as Q1,(AVG(q2)/4) as Q2,(AVG(q3)/4) as Q3,(AVG(q4)/4) as Q4,(AVG(q5)/4) as Q5,(AVG(q6)/4) as Q6,(AVG(q7)/4) as Q7,(AVG(q8)/4) as Q8,(AVG(q9)/4) as Q9,(AVG(q10)/4) as Q10,(AVG(q11)/4) as Q11,(AVG(q12)/4) as Q12,(AVG(q13)/4) as Q13,(AVG(q14)/4) as Q14,(AVG(q15)/4) as Q15,(AVG(q16)/4) as Q16,(AVG(q17)/4) as Q17,(AVG(q18)/4) as Q18')
				->FROM ('subjects') 
				->leftJoin('feedback', 'feedback.subject_id = subjects.sub_id')
				->where(['sub_name' => $subject]);

				
				
				$command = $query->createCommand();
				
				$rows = $command->queryAll();
				foreach($rows as $row)
				{
				$faculty_id = $row['faculty_id'];
				$faculty = $fac_model::find() -> select('fac_name')->where(['fac_id'=>$faculty_id])->one();
		//$model->faculty_id
		$fac = $faculty['fac_name'];	
				$university_id = $row['university_id'];
				/* $uni_query = new Query;
				$uni_query ->select('university_name ')
 				->FROM('university')
				->where (['uni_id' => $university_id]);
				$command2 = $uni_query->createCommand(); */
				$univ = $uni_model::find() -> select('university_name')->where(['uni_id'=>$university_id])->one();
				//$rows2 = $command2->queryAll();
				$uni = $univ['university_name'];
				//var_dump($rows2);
					
					$Q1 = ROUND($row['Q1'],2)*100;
					$Q2 = ROUND($row['Q2'],2)*100;
					$Q3 = ROUND($row['Q3'],2)*100;
					$Q4 = ROUND($row['Q4'],2)*100;
					$oc = ROUND(($Q1*.25+$Q2*.25+$Q3*.25+$Q4*.25)*.2,0);
					$Q5 = ROUND($row['Q5'],2)*100;
					$Q6 = ROUND($row['Q6'],2)*100;
					$pedagogy = ROUND(($Q5*.5+$Q6*.5)*.2,0);
					$Q7 = ROUND($row['Q7'],2)*100;
					$Q8 = ROUND($row['Q8'],2)*100;
					$Q9 = ROUND($row['Q9'],2)*100;
					$interaction = ROUND((($Q7*.33+$Q8*.33+$Q9*.34))*.25,0);
					$Q10 = ROUND($row['Q10'],2)*100;
					$Q11 = ROUND($row['Q11'],2)*100;
					$practical = ROUND((($Q10*.5+$Q11*.5))*.15,0);
					$Q12 = ROUND($row['Q12'],2)*100;
					$Q13 = ROUND($row['Q13'],2)*100;
					$Q14 = ROUND($row['Q14'],2)*100;
					$assesment = ROUND((($Q12*.335+$Q13*.335+$Q14*.33))*.15,0);
					$Q15 = ROUND($row['Q15'],2)*100;
					$joy = ROUND(($Q15)*.05,0);
					$Q16 = ROUND($row['Q16'],2)*100;
					$Q17 = ROUND($row['Q17'],2)*100;
					$Q18 = ROUND($row['Q18'],2)*100;
					$lms = ROUND(($Q16*.335+$Q17*.335+$Q18*.33),0);
					$overall_rating = ROUND(($oc+$pedagogy+$interaction+$practical+$assesment+$joy),0);
					
					
				
				}
 
				
				
        
		
         $content = $content."<tr><td align = 'center'>$uni</td><td align = 'center'>$course_n</td><td align = 'center'>$sem</td><td align = 'center'>$batch</td><td align = 'center'>$fac</td><td align = 'center'>$subject</td><td align = 'center'>$oc"."%"."</td><td align = 'center'>$pedagogy"."%"."</td><td align = 'center'>$interaction"."%"."</td><td align = 'center'>$practical"."%"."</td><td align = 'center'>$assesment"."%"."</td><td align = 'center'>$joy"."%"."</td><td align = 'center'>$overall_rating"."%"."</td><td align = 'center'>$lms"."%"."</td></tr>";
		 
	 }		 
 }		 
 $content = $content."</table>";
		 //echo $content;
		 return $this->render('chart2', [
           // 'overall_rating' =>$overall_rating,
			//'lms' =>$lms,
			'content' =>$content,
        ]);
	}
else  {
            return $this->render('create2', [
                
            ]);
        }
	
	
	}
}
	