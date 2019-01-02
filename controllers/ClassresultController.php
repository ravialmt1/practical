<?php

namespace app\controllers;

use Yii;
use app\models\Classresult;
use app\models\Classes;
use app\models\Course;
use app\models\Classstudents;
use app\models\Classresultdone;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use dosamigos\tableexport\ButtonTableExport;
use yii\filters\AccessControl;
/**
 * ClassresultController implements the CRUD actions for Classresult model.
 */
class ClassresultController extends Controller
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
     * Lists all Classresult models.
     * @return mixed
     */
    

    

    /**
     * Displays a single Classresult model.
     * 
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
     * Creates a new Classresult model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Classresult();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', ]);
        } else {
            return $this->render('create', [
                'model' => $model,
				'id' => $id,
            ]);
        }
    }

    /**
     * Updates an existing Classresult model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * 
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', ]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Classresult model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * 
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
	
	 public function actionCreateexcel($data)
{
   
        // ...
        return $this->redirect('excel',['data'=>$data]);
        // ...
   
} 


    
    /**
     * Finds the Classresult model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * 
     * @return Classresult the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Classresult::findOne([])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	 
	   
	   public function actionTest($id)
    {
		$session = Yii::$app->session;
		$university_id = $session->get('uni_id');
		$course = Classes::find('course_id')->where(['id' => $id])->One();
		$sem = Classes::find('sem')->where(['id' => $id])->One();
		$course_name = Course::find('course_name')->where(['course_id' => $course, 'uni_id' =>$university_id])->One();
		//echo $course_name;
		$row_i=0;
		$connection = \Yii::$app->db;
		$row = Classstudents::find()->where(['class_id' => $id])->All();
		$counts = Classstudents::find()->where(['class_id' => $id])->count();
		for($i=0;$i<$counts-1;$i++){
		echo $row[$i]['regno']."<BR />";
		}
      /*  while($row)  {
		   $regNo = $row[$row_i]->regno;
			$row_i++;
			echo "$regNo.<br />";
	   } */
	}
	   
	   
	   
	   public function actionIndex($id)
    {
		$session = Yii::$app->session;
		$university_id = $session->get('uni_id');
		$course = Classes::find('course_id')->where(['id' => $id])->One();
		$sem = Classes::find('sem')->where(['id' => $id])->One();
		$course_name = Course::find('course_name')->where(['course_id' => $course, 'uni_id' =>$university_id])->One();
		function get_result($id)
    {
		$row_i=0;
		$connection = \Yii::$app->db;
		$row = Classstudents::find()->where(['class_id' => $id])->All();
      
		$counts = Classstudents::find()->where(['class_id' => $id])->count();
		for($i=0;$i<$counts-1;$i++){
	
	//sleep(15);
           /*  $course=$row["1"];
			echo $row[2];
			echo $row[3]; */
			$regNo = $row[$i]['regno'];
			$row_i++;
			//echo $regNo;
			/* echo $row[5];
			echo $course."<br />"; */
			$cSession = curl_init(); 
//<span id="gdResultDetails_lblsubject_0">BUSINESS RESEARCH METHODS</span>
$regex = '#<span.*?>(.*?)</span>#';
			$url = "https://results.jainuniversity.ac.in/webResult.aspx?__VIEWSTATE=%2FwEPDwUJNzYzNTY0NDkxD2QWAgIFD2QWDgIJDw9kFgIeDGF1dG9jb21wbGV0ZQUDb2ZmZAILDw8WAh4HVmlzaWJsZWdkZAINDw8WAh8BaGRkAg8PZBYIAgMPDxYCHgRUZXh0ZWRkAgcPDxYCHwJlZGQCCw8PFgIfAmVkZAIPDw8WAh8CZWRkAhEPPCsAEQMADxYEHgtfIURhdGFCb3VuZGceC18hSXRlbUNvdW50ZmQBEBYAFgAWAAwUKwAAZAITDzwrABECARAWABYAFgAMFCsAAGQCFQ9kFgYCAw8PFgIfAmVkZAIHDw8WAh8CZWRkAgsPDxYCHwJlZGQYAgUQZ2RSZXN1bHREZXRhaWxzMQ9nZAUPZ2RSZXN1bHREZXRhaWxzDzwrAAwBCGZk1SPA7LNI6bhX7npQcX%2FF7X1HE6hYiliv4XTPvYbyd2E%3D&__EVENTVALIDATION=%2FwEdAAPI2hA076hICtGIoCh%2BjmMitfsgYlASF%2Bk4iUBvVlCVEqh6JsLyFYPlKNQvovGCmE0YghzXQB7OC34KoYWOolwbr4VmD4bRUCcGxR42GTUXFg%3D%3D&txtStudentCode=".$regNo."&btnGetResult=Show+Result";

//echo $url;
curl_setopt($cSession,CURLOPT_URL,$url);
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 
//step3
$result=curl_exec($cSession);
$nameStart = '<span id="lblStuName"';

$nameEnd = '</div>
            </div>
        </div>
        <div class="container">
';


$st_name = stripos($result,$nameStart);
$en_name = stripos($result,$nameEnd);
$name = substr($result,$st_name,$en_name-$st_name); 
$name = preg_replace('/<span[^>]*?>([\\s\\S]*?)<\/span>/',
'\\1', $name);
$name = preg_replace('/<font[^>]*?>([\\s\\S]*?)<\/font>/',
'\\1', $name);
$name = preg_replace('/<b[^>]*?>([\\s\\S]*?)<\/b>/',
'\\1', $name);
$name= strip_tags($name);
$start='<span id="gdResultDetails_lblslno_0">1</span>';
$end = 'Result :';
$st = stripos($result,$start);
$en = stripos($result,$end);
$res = substr($result,$st,$en-$st);
//echo $res;
preg_match_all($regex, $res, $matches);

//print_r($matches);

if( isset( $matches['0']['0'] )){
	
//echo "$regNo ";
//echo "$name<BR />";
$count=0;

foreach($matches as $match)
{
	if ($count == 0){
		$values = (array_chunk($match, 8));
		foreach ($values as $value)
		{
			$value = preg_replace('/<span[^>]*?>([\\s\\S]*?)<\/span>/',
'\\1', $value);
if($value[1]=="ADDITIONAL ENGLISH") 
{
	$value[1] ="LANGUAGE";
}
if($value[1]=="KANNADA") 
{
	$value[1] ="LANGUAGE";
}
	elseif($value[1]=="HINDI") 
{
	$value[1] ="LANGUAGE";
}		
	elseif($value[1]=="SANSKRIT") 
{
	$value[1] ="LANGUAGE";
}		 
		$connection->createCommand()->insert ('class_result' ,['class_id'=>$id,'reg_no'=>$regNo, 'Name'=>$name, 'subject'=>$value[1], 'internal'=>$value[2], 'university_marks'=>$value[3], 'practical'=>$value[4], 'total'=>$value[5], 'credits'=>$value[6], 'grade'=>$value[7]])->execute(); 
		//echo $test ."<BR />";
			//$sql2 .= implode(',', $value);	
			//mysqli_query($con,$sql2);
			
		}
		$count = 1;
		echo $regNo;
	
	}
}
}
}
//$connection = \Yii::$app->db;
	  $connection->createCommand()->insert ('class_result_done' ,['class_id'=>$id,'result_fetched'=>'1'])->execute(); 
	   return 0;
	   }
	   
		$model = new Classresultdone();
		$connection = Yii::$app->getDb();
		$command = $connection->createCommand('select result_fetched from class_result_done where class_id ='.$id);
$class_result_done = $command->queryAll();

if($class_result_done == NULL)
{
	get_result($id);
}

	else { 
	// Displays result by creating sql qyery given below
	//Select Distinct subjects
	$command = $connection->createCommand('select distinct(subject) from class_result where class_id ='.$id);
$subjects = $command->queryAll();
$sql = "select reg_no,Name,";
$i=0;
foreach($subjects as $subject)
{
	//$internal_sql = "select sum(case when subject =" . $subject. " then internal end) as lab_internal from class_result where class_id =". $id ." group by reg_no";
	//$command = $connection->createCommand($internal_sql);
	//$lab_internal = $command->queryAll();
	$i++;
	$subject = trim($subject['subject']);
    $split = explode(" ", $subject);

//echo $split[count($split)-1];

	if($split[count($split)-1] == "LAB" OR $split[count($split)-1] == "PROJECT") {
    $sql.='coalesce(sum(case when subject = "'.$subject.'" then practical end), 0) as lab'.$i.", ";
	}
	else 
	{
		$sql.='coalesce(sum(case when subject = "'.$subject.'" then university_marks end), 0) as lab'.$i.", ";
	
	
	}
	$sql.='coalesce(sum(case when subject = "'.$subject.'" then internal end), 0) as internal'.$i.", ";
	
    $sql.='coalesce(sum(case when subject = "'.$subject.'" then total end), 0) as total'.$i.", ";
	$sql.='coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0) as grade'.$i.", ";
	$sql.='case when (coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0)) = "S++" then "10" 
				when (coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0)) = "S+" then "9.5" 
				when (coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0)) = "S" then "9"
				when (coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0)) = "A++" then "8.5"
				when (coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0)) = "A+" then "8"
				when (coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0)) = "A" then "7.5"
				when (coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0)) = "B+" then "7"
				when (coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0)) = "B" then "6.5"
				when (coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0)) = "C+" then "6" 
				when (coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0)) = "C" then "5.5"
				when (coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0)) = "D+" then "5"
				when (coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0)) = "D" then "4.5"
				when (coalesce (group_concat(case when subject = "'.$subject.'" then grade end),0)) = "F" then "0" 
	
					end as gradepoint'.$i.", ";
	$sql.='coalesce(sum(case when subject = "'.$subject.'" then credits end), 0) as credit'.$i.", ";
	
	//$sql.='grade as grade'.$i.", ";


$grade_catogary = array();
foreach($subjects as $subject)
{

$outstandings2 = Classresult::find()
    ->where(['subject' => $subject['subject'], 'grade' => 'S++','class_id'=>$id])
    ->count();
$outstandings1 = Classresult::find()
    ->where(['subject' => $subject['subject']])
	->andwhere(['grade' => 'S+'])
	->andwhere(['class_id'=>$id])
    ->count();	
$distinctions = Classresult::find()
    ->where(['subject' => $subject['subject']])
	->andwhere(['grade' => 'S'])
	->andwhere(['class_id'=>$id])
    ->count();
	$distinctionA2 = Classresult::find()
    ->where(['subject' => $subject['subject'], 'grade' => 'A++','class_id'=>$id])
    ->count();
	$distinctionA1 = Classresult::find()
    ->where(['subject' => $subject['subject'], 'grade' => 'A+','class_id'=>$id])
    ->count();
	$first_classA = Classresult::find()
    ->where(['subject' => $subject['subject'], 'grade' => 'A','class_id'=>$id])
    ->count();
	$first_classB1 = Classresult::find()
    ->where(['subject' => $subject['subject'], 'grade' => 'B+','class_id'=>$id])
    ->count();
	$first_classB = Classresult::find()
    ->where(['subject' => $subject['subject'], 'grade' => 'B','class_id'=>$id])
    ->count();
	$secondclassC1 = Classresult::find()
    ->where(['subject' => $subject['subject'], 'grade' => 'C+','class_id'=>$id])
    ->count();
	$secondclassC = Classresult::find()
    ->where(['subject' => $subject['subject'], 'grade' => 'C','class_id'=>$id])
    ->count();
	$passD1 = Classresult::find()
    ->where(['subject' => $subject['subject'], 'grade' => 'D+','class_id'=>$id])
    ->count();
	$passD = Classresult::find()
    ->where(['subject' => $subject['subject'], 'grade' => 'D','class_id'=>$id])
    ->count();
	$failF = Classresult::find()
    ->where(['subject' => $subject['subject'], 'grade' => 'F','class_id'=>$id])
    ->count();
	$absent = Classresult::find()
   ->where(['subject' => $subject['subject']])
	->andwhere(['class_id'=>$id])
	->andwhere(['university_marks' => 'AB'])
	->orwhere(['internal' => 'AB'])
    ->count();
	
 //$total_pass = "SELECT count(*) FROM `class_result` where `subject` like". $subject['subject']." && `grade` not like 'F' && class_id=$id";
 //$outstandings2 ="SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && `grade` like 'S++' && class_id=$id";
 //$outstandings1 ="SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && `grade` like 'S+' && class_id=$id";
 //$distinctions ="SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && `grade` like 'S' && class_id=$id";
 //$distinctionA2 ="SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && `grade` like 'A++' && class_id=$id";
 //$distinctionA1 ="SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && `grade` like 'A+' && class_id=$id";
 //$first_classA = "SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && `grade` like 'A' && class_id=$id";
 //$first_classB1 = "SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && `grade` like 'B+' && class_id=$id";
 //$first_classB = "SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && `grade` like 'B' && class_id=$id";
 //$secondclassC1 = "SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && `grade` like 'C+' && class_id=$id";
 //$secondclassC = "SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && `grade` like 'C' && class_id=$id";
 //$passD1 = "SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && `grade` like 'D+' && class_id=$id";
 //$passD = "SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && `grade` like 'D' && class_id=$id";
 //$failF = "SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && `grade` like 'F' && class_id=$id";	
 //$absentAB = "SELECT count(*) FROM `class_result` where `subject` like ". $subject['subject']." && class_id=$id && (`internal` like 'AB' || university_marks like 'AB')";	
 array_push($grade_catogary, $subject['subject'], $outstandings2,$outstandings1, $distinctions, $distinctionA2, $distinctionA1, $first_classA, $first_classB1, $first_classB, $secondclassC1,$secondclassC,$passD1,$passD,$failF,$absent);
}
//result toppers = "SELECT reg_no, name, total, per, result, sgpa from class_results where class_id = 159 ";  //Calculate SGPA  and percentage mannualy
	
}
//echo $sql."<br /><br />";
$sql = rtrim($sql,' '); //remove last white space
$sql = rtrim($sql,','); //remove last comma
$sql.=" from class_result where class_id =". $id ." group by reg_no"; 
//echo $sql;
$command = $connection->createCommand($sql);
$resultsheet = $command->queryAll();
$provider = new SqlDataProvider([
    'sql' => $sql,]);
	
	//$resultsheet = 
		return $this->render('display_result',['resultsheet'=>$resultsheet,'subjects'=>$subjects,'course_name' => $course_name,'sem' =>$sem,'grade_catogary'=> $grade_catogary,'provider'=>$provider]);
	}
	
	
	
	
	}
}
