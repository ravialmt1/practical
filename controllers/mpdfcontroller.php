<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use kartik\mpdf\Pdf;
use yii\helpers\Url;
use yii\db\Query;

 

$connection = \Yii::$app->db;
class MpdfController extends Controller
{
    public function actionReport() {
$sub_name = "COST ACCOUNTING";		
$query = new Query;
 
        // get your HTML raw content without any layouts or scripts
		$query ->SELECT ('id,reg_no,q1 ,q2 ,q3 ,q4 ,q5,q6,q7,q8,q9,q10,q11,q12,q13,q14,q15,q16,q17,q18')
				->FROM ('subjects') 
				->leftJoin('feedback', 'feedback.subject_id = subjects.sub_id')
				//->leftJoin('feedback_faculty','feedback_faculty.feed_id= feedback.id')
				->where(['sub_name' => $sub_name]);
$command = $query->createCommand();
				
				$rows = $command->queryAll();
				$content ="<h2>Individual of feedback marks for each Question for $sub_name</h2><table border='1'><tr><th>% marks Q1</th><th>% marks Q2</th><th>% marks Q3</th><th>% marks Q4</th><th>% marks Q5</th><th>% marks Q6</th><th>% marks Q7</th><th>% marks Q8</th><th>% marks Q9</th><th>% marks Q10</th><th>% marks Q11</th><th>% marks Q12</th><th>% marks Q13</th><th>% marks Q14</th><th>% marks Q15</th><th>% marks Q16</th><th>% marks Q17</th><th>% marks Q18</th></tr><tr>";
				foreach($rows as $row)
				{
					$content = $content. "<tr><td> $row[q1]</td><td> $row[q2]</td><td> $row[q3]</td><td> $row[q4]</td><td> $row[q5]</td><td> $row[q6]</td><td> $row[q7]</td><td> $row[q8]</td><td> $row[q9]</td><td> $row[q10]</td><td> $row[q11]</td><td> $row[q12]</td><td> $row[q13]</td><td> $row[q14]</td><td> $row[q15]</td><td> $row[q16]</td><td> $row[q17]</td><td> $row[q18]</td></tr>";
				}
				
				$content = $content ."</tr></table>";
		
		$query = new Query;
 
        // get your HTML raw content without any layouts or scripts
		$query ->SELECT ('id,reg_no,AVG(q1)/4 as Q1,(AVG(q2)/4) as Q2,(AVG(q3)/4) as Q3,(AVG(q4)/4) as Q4,(AVG(q5)/4) as Q5,(AVG(q6)/4) as Q6,(AVG(q7)/4) as Q7,(AVG(q8)/4) as Q8,(AVG(q9)/4) as Q9,(AVG(q10)/4) as Q10,(AVG(q11)/4) as Q11,(AVG(q12)/4) as Q12,(AVG(q13)/4) as Q13,(AVG(q14)/4) as Q14,(AVG(q15)/4) as Q15,(AVG(q16)/4) as Q16,(AVG(q17)/4) as Q17,(AVG(q18)/4) as Q18')
				->FROM ('subjects') 
				->leftJoin('feedback', 'feedback.subject_id = subjects.sub_id')
				->where(['sub_name' => 'COST ACCOUNTING']);

				
				$content =$content."<h2>Percentage of feedback for each Question</h2><table border='1'><tr><th>% marks Q1</th><th>% marks Q2</th><th>% marks Q3</th><th>% marks Q4</th><th>% marks Q5</th><th>% marks Q6</th><th>% marks Q7</th><th>% marks Q8</th><th>% marks Q9</th><th>% marks Q10</th><th>% marks Q11</th><th>% marks Q12</th><th>% marks Q13</th><th>% marks Q14</th><th>% marks Q15</th><th>% marks Q16</th><th>% marks Q17</th><th>% marks Q18</th></tr><tr>";
				$command = $query->createCommand();
				
				$rows = $command->queryAll();
				foreach($rows as $row)
				{
					$Q1 = ROUND($row['Q1'],2)*100;
					$Q2 = ROUND($row['Q2'],2)*100;
					$Q3 = ROUND($row['Q3'],2)*100;
					$Q4 = ROUND($row['Q4'],2)*100;
					$oc = ($Q1*.25+$Q2*.25+$Q3*.25+$Q4*.25)*.2;
					$Q5 = ROUND($row['Q5']*.5,2)*100;
					$Q6 = ROUND($row['Q6']*.5,2)*100;
					$pedagogy = ($Q5*.5+$Q6*.5)*.2;
					$Q7 = ROUND($row['Q7'],2)*100;
					$Q8 = ROUND($row['Q8'],2)*100;
					$Q9 = ROUND($row['Q9'],2)*100;
					$interaction = (($Q7*.33+$Q8*.33+$Q9*.34))*.25;
					$Q10 = ROUND($row['Q10'],2)*100;
					$Q11 = ROUND($row['Q11'],2)*100;
					$practical = (($Q10*.5+$Q11*.5))*.15;
					$Q12 = ROUND($row['Q12'],2)*100;
					$Q13 = ROUND($row['Q13'],2)*100;
					$Q14 = ROUND($row['Q14'],2)*100;
					$assesment = (($Q12*.335+$Q13*.335+$Q14*.33))*.15;
					$Q15 = ROUND($row['Q15'],2)*100;
					$joy = ($Q15)*.05;
					$Q16 = ROUND($row['Q16'],2)*100;
					$Q17 = ROUND($row['Q17'],2)*100;
					$Q18 = ROUND($row['Q18'],2)*100;
					$lms = ($Q16*.335+$Q17*.335+$Q18*.33);
					$overall_rating = ($oc+$pedagogy+$interaction+$practical+$assesment+$joy);
					
					$content=$content."<td>$Q1% </td><td>$Q2% </td><td>$Q3% </td><td>$Q4% </td><td>$Q5% </td><td>$Q6% </td><td>$Q7% </td><td>$Q8% </td><td>$Q9% </td><td>$Q10% </td><td>$Q11% </td><td>$Q12% </td><td>$Q13% </td><td>$Q14% </td><td>$Q15% </td><td>$Q16% </td><td>$Q17% </td><td>$Q18% </td>";
				
				}
				
				$content = $content ."</tr></table>";
        
		$content =$content."<h2>Percentage of feedback for each Catogary</h2><table border='1'><tr><th>organizational Capabilities Marks</th><th>Pedagogy marks</th><th>Interaction and Engagement</th><th>Practical-Industrial Awareness</th><th>Assessments Marks</th><th>Joy of Learning Marks</th></tr>";
         $content = $content."<tr><td>$oc</td><td>$pedagogy</td><td>$interaction</td><td>$practical</td><td>$assesment</td><td>$joy</td></tr></table>";
		 
		 $content =$content."<h2>Overall Percentage of feedback for faculty is $overall_rating</h2><br />";
		 $content =$content."<h2>The LMS rating is $lms</h2>";

        // setup kartik\mpdf\Pdf component
       //echo $content;
 return $this->render('chart', [
            'overall_rating' =>$overall_rating,
			'lms' =>$lms,
			'content' =>$content,
        ]);

	}
}