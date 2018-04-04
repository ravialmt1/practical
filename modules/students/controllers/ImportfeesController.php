<?php

namespace app\modules\students\controllers;

use Yii;

use app\models\FeedbackcourseMatrix;
//use app\models\FeedbackcourseMatrixSearch;
use app\modules\students\models\Students;
use app\modules\students\models\StudentDetails;
use app\modules\students\models\University;
use app\modules\students\models\StudentFeesCollection;
use app\models\FeedbackcourseMatrixSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use PHPExcel_IOFactory;


use yii\helpers\Html;

class ImportfeesController extends Controller
{
	
	
    public function actionIndex()
    {
$objPHPExcel = PHPExcel_IOFactory::load('uploads\fees_collected.xlsx');
$dataArr = array();
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
    $worksheetTitle = $worksheet->getTitle();
    $highestRow = $worksheet->getHighestRow(); // e.g. 10
    $highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
    $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);

    for ($row = 2; $row <= $highestRow; ++$row) {
        for ($col = 0; $col < 2; $col++) {
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
		
		$reg_no = $dataArr[$row][0];				//$cell[0][1],$students->name =$cell[0][1]
		//University,Student Name,Registration Number,Gender,Course Name,Batch,Current Semester,Email Id,Mobile Number,10th % Marks,10th Board Name,12th % Marks,Stream(ex:Sci/Arts/Commerce),12th Board Name/Council
		$fees = $dataArr[$row][1];	
		$fee_collection = new StudentFeesCollection();
$fee_collection ->student_id = "$reg_no";
$fee_collection ->amount = "$fees";
$fee_collection ->payment_type ="cash";
$fee_collection ->bank_name ="NA";
$fee_collection ->bank_branch ="NA";
$fee_collection ->created_at = new \yii\db\Expression('NOW()');
$fee_collection ->updated_at = new \yii\db\Expression('NOW()');
$fee_collection ->description = "Normal";


if($fee_collection->save())
{
	echo "saved sucessufully";
	
}
else 
{
	echo "not saved";
print_r($fee_collection->getErrors());
}

echo " <BR /> ".$fee_collection ->student_id;	

print '<pre>';
}
		
	


//print_r($dataArr);
}


	}

}