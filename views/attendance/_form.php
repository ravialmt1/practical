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

    <?php $form = ActiveForm::begin(); ?>

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
        'depends'=>['section-uni_id-container'],
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
        'depends'=>['section-uni_id','section-vertical'],
        'url' => Url::to(['/attendance/course-sel']),
        'loadingText' => 'course ...',
    ]
]); ?>
</div>
	</div>
	<div class="row">
	<div class="col-md-3">	
	
   <?= $form->field($model, 'sem')->textInput(['placeholder' => 'Sem']) ?>
</div>
<div class="col-md-3">
    <?= $form->field($model, 'section')->textInput(['placeholder' => 'Section']) ?>
	</div>
	<div class ="col-md-3">
 <?=  $form->field($model, 'subject')->widget(DepDrop::classname(), [
	'data'=>[1 => 'subject'],
    //'data' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->orderBy('course_id')->asArray()->all(), 'course_id', 'course_name'),
        'options' => ['placeholder' => 'Choose Course'],
    'type' => DepDrop::TYPE_SELECT2,
    'select2Options'=>['pluginOptions'=>['allowClear'=>true]],
    'pluginOptions'=>[
        'depends'=>['section-uni_id','section-course_id','section-sem','section-section'],
        'url' => Url::to(['/attendance/subject-sel']),
        'loadingText' => 'course ...',
    ]
]); ?>
</div>
	
	<div class="col-md-3">
	<?= $form->field($model, 'att_date')->widget(\kartik\widgets\DatePicker::classname(), [
        'type' => \kartik\widgets\DatePicker::TYPE_INPUT,
		'pluginOptions' => [
        'format' => 'yyyy-mm-dd',
		'placeholder' => 'Choose Att Date',
		'autoclose'=>true
		],
        
    ]); ?>

	</div>
	
	
		<div class="col-md-3">
		<?= $form->field($model, 'hours')->textInput(['placeholder' => 'Class Hour']) ?>
   
</div>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Take Attendance' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	
	

    <?php ActiveForm::end(); ?>

</div>
