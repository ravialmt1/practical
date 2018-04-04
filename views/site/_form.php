<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\FeedbackStudents;

/* @var $this yii\web\View */
/* @var $model app\models\FeedbackcourseMatrix */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-students-form">

    <?php $form = ActiveForm::begin(); 
	
	$universities = ArrayHelper::map(feedbackstudents::find()->asArray()->select('university')->distinct(), 'university', 'university');
	$course_names = ArrayHelper::map(FeedbackStudents::find()->select('course_name'), 'id', 'course_name');
    $batches = ArrayHelper::map(FeedbackStudents::find()->select('batch'), 'id', 'batch');
	$semesters = ArrayHelper::map(FeedbackStudents::find()->select('semester'), 'id', 'semester');
	//$form->field($model, 'attribute')->dropDownList($items)

	
	?>
	
	
    <?= $form->field($model, 'university')->dropDownList(ArrayHelper::map(feedbackstudents::find()->all(), 'university', 'university')) ?>

    <?= $form->field($model, 'course_name')->dropDownList(ArrayHelper::map(feedbackstudents::find()->all(), 'course_name', 'course_name')) ?>

    <?= $form->field($model, 'batch')->dropDownList(ArrayHelper::map(feedbackstudents::find()->all(), 'batch', 'batch')) ?>

    <?= $form->field($model, 'semester')->dropDownList(ArrayHelper::map(feedbackstudents::find()->all(), 'semester', 'semester')) ?>

   
    <div class="form-group">
        <?= Html::submitButton('Mail', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
