<?php

namespace app\modules\students\controllers;

use Yii;

use app\models\FeedbackcourseMatrix;
//use app\models\FeedbackcourseMatrixSearch;
use app\modules\students\models\Students;
use app\modules\students\models\StudentDetails;
use app\modules\students\models\University;
use app\modules\students\models\Course;
use app\models\FeedbackcourseMatrixSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use PHPExcel_IOFactory;


use yii\helpers\Html;

class Import2Controller extends Controller
{
	
	
    public function actionIndex()
    {
$objPHPExcel = PHPExcel_IOFactory::load('uploads\test.xls');
$dataArr = array();
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $worksheetTitle = $worksheet->getTitle();
    $highestRow = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);

    for ($row = 2; $row <= $highestRow; ++$row) {
        for ($col = 0; $col < 58; $col++) {
            $cell = $worksheet->getCellByColumnAndRow($col, $row);
            $val = $cell->getValue();
            $dataArr[$row][$col] = $val;
        }
		
    }
	
	
	// insert student id into the 
	/* public static function getRegisteredId($name)
    {
        $city = City::findOne(['name' => $name]);
        if (empty($city)) {
            $city = new City(['name' => $name]);
            $city->save();
        }
        return $city->id;
    } 
	
	Then importing can be written like:
    $buildingMaster->city = City::getRegisteredId($line['L']);
	
	*/

	//unset($dataArr[1]); // since in our example the first row is the header and not the actual data
for ($row = 2; $row <= $highestRow; ++$row) {	

		echo $dataArr[$row][1];				//$cell[0][1],$students->name =$cell[0][1]
		
		$unive = $dataArr[$row][1];				//$cell[0][1],$students->name =$cell[0][1]
		//University,Student Name,Registration Number,Gender,Course Name,Batch,Current Semester,Email Id,Mobile Number,10th % Marks,10th Board Name,12th % Marks,Stream(ex:Sci/Arts/Commerce),12th Board Name/Council
		$stu_name = $dataArr[$row][2];	
		if($dataArr[$row][3])
		$reg_nu = $dataArr[$row][3];
else
$reg_nu = "To be collected";	
		$gender = $dataArr[$row][4];	
		$vertical = $dataArr[$row][5];
		$course_name = $dataArr[$row][6];
		$course_short_name = $dataArr[$row][7];
		$semester =$dataArr[$row][9];
 		$batch = $dataArr[$row][8];	
		if($dataArr[$row][10])
		$email = $dataArr[$row][10];
else 
$email = "Not Given";
if($dataArr[$row][11])
		$mobile = $dataArr[$row][11];
else
	$mobile = "Not Given";
		if($dataArr[$row][12])
		$class10_marks = $dataArr[$row][12];
	else
		$class10_marks = "NA";
$class10_board = $dataArr[$row][13];
$class12_marks = $dataArr[$row][14];
$class12_board = $dataArr[$row][16];
	//Students(Personal Laptops/Desktops)	Mobiles(Tablet/Smart Phones)	Address	DOB	Fathers name	Mothers name	Parents/Guadians Contact Number	Caste	Religion	Nationality
if($dataArr[$row][28])
$laptop = $dataArr[$row][28];
else
	$laptop = "Yes";
if($dataArr[$row][29])
$smart_phone = $dataArr[$row][29];
else
	$smart_phone = "yes";
if($dataArr[$row][30])
$address = $dataArr[$row][30];
else
	$address = "Not Given";
if($dataArr[$row][31])
$dob = $dataArr[$row][31];
else 
	$dob = "To be collected";
if($dataArr[$row][32])
$father_name = $dataArr[$row][32];
else
	$father_name = "To be collected";
if($dataArr[$row][33])
$mother_name = $dataArr[$row][33];
else
	$mother_name = "To be collected";
if($dataArr[$row][34])
$parent_contact = $dataArr[$row][34];
else
	$parent_contact = "To be collected";
if($dataArr[$row][35])
$caste = $dataArr[$row][35];
else
	$caste = "To be collected";
if($dataArr[$row][36])
$religion = $dataArr[$row][36];
else
	$religion = "To be collected";
if($dataArr[$row][37])
$nationality = $dataArr[$row][37];
else
	$nationality = "To be collected";
		$model = University::find()->where(['university_name'=> $dataArr[$row][1]])->one(); 
		if(!$model):
	$model = new University();	
	
	endif;
	$model ->university_name = "$unive";
//echo "$unive";	
$model ->save();		
print '<pre>';
				//$batch = $dataArr[$row][6];
		
		$university_course = Course::find()->where(['uni_id'=> $model ->uni_id, 'course_name' => $course_name,'course_batch' => $batch])->one(); 
		if(!$university_course) :
		$university_course = new Course;
		endif;
		
		
	$university_course ->uni_id = $model->uni_id;
	$university_course ->vertical = $vertical;
	$university_course -> course_name = $course_name;
	$university_course -> course_short_name = $course_short_name;
	$university_course -> course_batch = "$batch";

$university_course ->save();
$students = Students::find()->where(['course_id' => $university_course->course_id,'stu_name' => $stu_name])->one(); 
		if(!$students) :
		$students = new Students();
		endif;
//$students = new Students();
$students -> course_id = $university_course->course_id;
$students ->stu_name = "$stu_name";
$students ->reg_no = "$reg_nu";
//$students ->gender = $gender;
$students ->semester = $semester;
$students ->section = "A";
$students ->emai_id = "$email";
$students ->mobile_no = "$mobile";
$students ->laptop = "$laptop";
$students ->smart_phone = "$smart_phone";
$students ->address = "$address";
$students ->dob = "$dob";
$students ->father_name = "$father_name";
//$students ->smart_phone = "$mother_name";
$students ->mother_name = "$mother_name";
$students ->parent_contact = "$parent_contact";
$students ->caste = "$caste";
$students ->religion = "$religion";
$students ->nationality = "$nationality";
if($students->save())
{
	echo "saved sucessufully";
	
}
else 
{
	echo "not saved";
print_r($students->getErrors());
}

echo " <BR /> ".$students ->stu_name;	

print '<pre>';
}
		
	


//print_r($dataArr);
}


	}

}