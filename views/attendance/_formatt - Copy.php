<?php

use yii\helpers\Html;

use kartik\widgets\ActiveForm;

use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;



/* @var $this yii\web\View */
/* @var $model app\models\Attendance */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="attendance-form">

   <?php 
	$form = ActiveForm::begin();
	//var_dump($stu_list);
	echo "<table><tr>";
	foreach($stu_list as $stu)
	//foreach($stu as $student)
	{
	echo "<td>".$stu['stu_name'];
	echo "</td><td>".$post_value['Section']['att_date']."</td><td>";
	echo "</tr><tr>";
	}
	echo "</table>";
	//var_dump($student);
	//$student['stu_name'];
	//var_dump($model);
// Add other fields if needed or render your submit button
echo '<div class="text-right">' . 
     Html::submitButton('Submit', ['class'=>'btn btn-primary']) .
     '<div>';
ActiveForm::end();
?>
</div>
