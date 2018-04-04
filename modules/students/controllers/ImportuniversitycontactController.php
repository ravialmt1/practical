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
use app\models\FeedbackcourseMatrixSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use PHPExcel_IOFactory;


use yii\helpers\Html;

class ImportuniversitycontactController extends Controller
{
	
	
    public function actionIndex()
    {
$objPHPExcel = PHPExcel_IOFactory::load('uploads\Uni.xlsx');
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

		echo $dataArr[$row][0];				//$cell[0][1],$students->name =$cell[0][1]
		
		$unive = $dataArr[$row][1];				//$cell[0][1],$students->name =$cell[0][1]
		
	//$model = new University();	
	$mobile = $dataArr[$row][2];
	$model = University::find()->where(['university_name'=> $dataArr[$row][0]])->one(); 
	$university_contact = new UniversityContact;
	$university_contact ->uni_id = $model->uni_id;
	$university_contact ->coordinator = $dataArr[$row][1];
	$university_contact -> contact_no = "$mobile";
	$university_contact -> address = $dataArr[$row][3];
	//$model ->university_name = "$unive";
//echo "$unive";	
 if($university_contact->save())
{
	echo "saved sucessufully";
	
}
else 
{
	echo "not saved";
print_r($university_contact->getErrors());
}		 
print '<pre>';
				//$batch = $dataArr[$row][6];
		
		
}
		
	


//print_r($dataArr);
}


	}

}