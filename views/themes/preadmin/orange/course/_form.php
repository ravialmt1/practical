<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
use kartik\typeahead\Typeahead;

/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="course-form">
<div class="container-fluid">
	

    <?php $form = ActiveForm::begin([
                'options' => [
                    'id' => 'create-course-form'
                ]
    ]); ?>

    <?= $form->errorSummary($model); ?>
	
	

    <?= $form->field($model, 'course_id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>
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
		
    <?= $form->field($model, 'vertical')->widget(\kartik\widgets\TypeaheadBasic::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->orderBy('uni_id')->asArray()->all(), 'vertical', 'vertical'),
        'options' => ['placeholder' => 'Enter Vertical'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
</div>
<div class="col-md-4">
		
    <?= $form->field($model, 'course_name')->widget(\kartik\widgets\TypeaheadBasic::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->orderBy('uni_id')->asArray()->all(), 'course_name', 'course_name'),
        'options' => ['placeholder' => 'Enter Course Name'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
</div>
	</div>
	<div class="row">
		
		<div class="col-md-4">
		
    <?= $form->field($model, 'course_short_name')->widget(\kartik\widgets\TypeaheadBasic::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->orderBy('uni_id')->asArray()->all(), 'course_short_name', 'course_short_name'),
        'options' => ['placeholder' => 'Enter Course Short Name'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
</div>
	<div class="col-md-4">
    <?= $form->field($model, 'course_batch')->widget(\kartik\widgets\TypeaheadBasic::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->orderBy('uni_id')->asArray()->all(), 'course_batch', 'course_batch'),
        'options' => ['placeholder' => 'Enter Course Batch'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
</div>
<div class="col-md-4">
		
    <?= $form->field($model, 'course_batch_end')->widget(\kartik\widgets\TypeaheadBasic::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->orderBy('uni_id')->asArray()->all(), 'course_short_name', 'course_short_name'),
        'options' => ['placeholder' => 'Enter Course Short Name'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
</div>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
</div>
