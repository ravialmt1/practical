<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Subjects;
use app\models\University;
use app\models\Faculty;
use app\models\Course;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\University */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="university-form">

    <?php $form = ActiveForm::begin(); 
	$uni_model = new University();
	$sub_model = new Subjects();
	?>
    <?= $form->field($uni_model, 'university_name')->DropDownList( ArrayHelper::map(university::find()->all(), 'uni_id', 'university_name'),['prompt'=>'Select University Name'])?>
	
	<?= $form->field($sub_model, 'course')->DropDownList( ArrayHelper::map(course::find()->all(), 'course_id', 'course_name'),['prompt'=>'Select Course Name']) ?>
	
	
	
	
	
	

	<?= $form->field($sub_model, 'sem')->DropDownList( ArrayHelper::map(subjects::find()->all(), 'sem', 'sem'),['prompt'=>'Select Semester']) ?>
	<?= $form->field($sub_model, 'sub_name')->DropDownList( ArrayHelper::map(subjects::find()->all(), 'sub_id', 'sub_name'),['prompt'=>'Select Subject Name'])?>

    <div class="form-group">
        <?= Html::submitButton('Get the Report', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
