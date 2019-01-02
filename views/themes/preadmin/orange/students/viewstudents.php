<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Attendance */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="classes-form">

    <?php 
	//var_dump($row);
	$form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
	
	<div class="row">
		<div class="col-md-4">
		
    <?= $form->field($model, 'uni_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\University::find()->orderBy('uni_id')->asArray()->all(), 'uni_id', 'university_name'),
        'options' => ['placeholder' => 'Choose University'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
</div>
		<div class="col-md-4">
		
    <?=  $form->field($model, 'vertical')->widget(DepDrop::classname(), [
	'data'=>[1 => 'Vertical'],
    //'data' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->orderBy('course_id')->asArray()->all(), 'course_id', 'course_name'),
        'options' => ['placeholder' => 'Choose Vertical'],
    'type' => DepDrop::TYPE_SELECT2,
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'depends'=>['students-uni_id'],
        'url' => Url::to(['/attendance/vertical-sel']),
        'loadingText' => 'vertical ...',
    ]
]); ?>

 
</div>
<div class ="col-md-4">
 <?=  $form->field($model, 'course_id')->widget(DepDrop::classname(), [
	'data'=>[1 => 'courses'],
    //'data' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->orderBy('course_id')->asArray()->all(), 'course_id', 'course_name'),
        'options' => ['placeholder' => 'Choose Course'],
    'type' => DepDrop::TYPE_SELECT2,
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'depends'=>['students-uni_id','students-vertical'],
        'url' => Url::to(['/attendance/course-sel']),
        'loadingText' => 'course ...',
    ]
]); ?>
</div>
	</div>
	<div class="row">
	<div class="col-md-3">	
	
   <?= $form->field($model, 'semester')->textInput(['placeholder' => 'Sem']) ?>
</div>
<div class="col-md-3">
    <?= $form->field($model, 'section')->textInput(['placeholder' => 'Section']) ?>
	</div>
	<div class ="col-md-3">

</div>
	
	
	
	
		
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'View Students' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	
	

    <?php ActiveForm::end(); ?>

</div>
