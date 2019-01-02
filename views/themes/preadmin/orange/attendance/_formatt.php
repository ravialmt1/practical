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

   
	<?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_INLINE,]); 

        /* <?= $form->field($model, 'student_id') ?>
        <?= $form->field($model, 'teacher_id') ?>
        <?= $form->field($model, 'section_id') ?>
        <?= $form->field($model, 'subject_id') ?>
        <?= $form->field($model, 'bell_id') ?>
        <?= $form->field($model, 'att_status') ?>
        <?= $form->field($model, 'att_date') ?> */
    
        ?>
    <?php
	//var_dump($stu_list);
	echo "<table><tr>";
	//$stu_list = Students::find()->where(['uni_id' => $uni_id,'course_id'=> $course_id,'semester' => $sem, 'section' => $section ])->orderBy('id')->asArray()->all();
	foreach ($stu_list as $index => $stu)
	
	//foreach($stu as $student)
	{
	echo "<td>".$stu['stu_name']; ?>
	<?= $form->field($model, "[$index]student_id")->hiddenInput(['value'=> $stu['id']])->label(false); ?>
	<?= $form->field($model, "[$index]teacher_id")->hiddenInput(['value'=> '1']) ?>
	<?= $form->field($model, "[$index]section_id")->textInput(['value'=> $section]) ?>
	<?= $form->field($model, "[$index]subject_id")->hiddenInput(['value'=> '1']) ?>
	<?= $form->field($model, "[$index]bell_id")->hiddenInput(['value'=> $hours]) ?>
	<?= $form->field($model, "[$index]att_date")->hiddenInput(['value'=>$att_date]) ?>
	
	<?php
	echo "</td><td>". $form->field($model, "[$index]att_status")->radioList([1 => 'Present', 0 => 'Absent'])."</td><td>";
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
