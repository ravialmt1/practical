<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Subjects */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Attendance', 
        'relID' => 'attendance', 
        'value' => \yii\helpers\Json::encode($model->attendances),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="subjects-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'university_id')->hiddenInput(['readonly' => true, 'value' => $university_id])->label(false) ?>
	 <?= $form->field($model, 'course_id')->hiddenInput(['readonly' => true, 'value' => $course])->label(false) ?>
	 <?= $form->field($model, 'sem')->hiddenInput(['readonly' => true, 'value' => $sem])->label(false) ?>
	 <?= $form->field($model, 'section')->hiddenInput(['readonly' => true, 'value' => $section])->label(false) ?>
	
	
	<?php /*
	<?= $form->field($model, 'university_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\University::find()->orderBy('uni_id')->asArray()->all(), 'uni_id', 'university_name'),
        'options' => ['placeholder' => 'Choose University'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('University'); ?>

    <?= $form->field($model, 'course_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->orderBy('course_id')->asArray()->all(), 'course_id', 'course_name'),
        'options' => ['placeholder' => 'Choose Course'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Course'); ?>

    <?= $form->field($model, 'sem')->textInput(['placeholder' => 'Sem']) ?>
*/ ?>
    <?= $form->field($model, 'sub_name')->textInput(['maxlength' => true, 'placeholder' => 'Sub Name']) ?>
	<?= $form->field($model, 'elective_group')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Subjectelectivemap::find()->orderBy('elective_group')->asArray()->all(), 'id', 'elective_group'),
        'options' => ['placeholder' => 'Choose Elective Group'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Elective Group'); ?>

    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
