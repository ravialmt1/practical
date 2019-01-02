<?php

namespace app\modules\students\controllers;

use Yii;

use app\models\FeedbackcourseMatrix;
//use app\models\FeedbackcourseMatrixSearch;
use app\modules\students\models\Students;
use app\modules\students\models\StudentDetails;
use app\modules\students\models\University;
use app\modules\students\models\UniversityContact;
use app\modules\students\models\Course;
use app\models\Jainrastudents;
use app\models\FeedbackcourseMatrixSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use PHPExcel_IOFactory;


use yii\helpers\Html;

class ImportjainraController extends Controller
{
	
	
    public function actionIndex()
    {
$objPHPExcel = PHPExcel_IOFactory::load('uploads\jain_ra.xlsx');
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

		echo $dataArr[$row][4];				//$cell[0][1],$students->name =$cell[0][1]
		
		$course = $dataArr[$row][0];				//$cell[0][1],$students->name =$cell[0][1]
		
	$model = new Jainrastudents();	
	$sem = $dataArr[$row][1];
	$batch = $dataArr[$row][2];
	$regno = $dataArr[$row][3];
	$name = $dataArr[$row][4];
	/* echo $name."--";
	echo $batch."--";
	echo $sem."--";
	echo $regno."--";
	echo $course; */
	
	$model ->course = "$course";
	$model -> sem = $sem;
	$model -> batch = $batch;
	$model -> regno = $regno;
	$model -> name = $name;
//echo "$unive";	
  if($model->save())
{
	echo "saved sucessufully";
	
}
else 
{
	echo "not saved";
print_r($model->getErrors());
}	 
print '<pre>';
				//$batch = $dataArr[$row][6];
		
		
}
		
	


//print_r($dataArr);
}


	}

}