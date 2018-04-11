<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Attendance */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="attendance-form">

    <?php $form = ActiveForm::begin(['layout' => 'inline',]); ?>

    <?= $form->errorSummary($model); ?>

    

    

    <?= $form->field($model, 'teacher_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Faculty::find()->orderBy('fac_id')->asArray()->all(), 'fac_id', 'fac_name'),
        'options' => ['placeholder' => 'Choose Faculty'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'section_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Section::find()->orderBy('id')->asArray()->all(), 'id', 'section'),
        'options' => ['placeholder' => 'Choose Section'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'subject_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Subjects::find()->orderBy('id')->asArray()->all(), 'id', 'sub_name'),
        'options' => ['placeholder' => 'Choose Subjects'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'att_date')->widget(\kartik\widgets\DatePicker::classname(), [
        'type' => \kartik\widgets\DatePicker::TYPE_INPUT,
		'pluginOptions' => [
        'format' => 'dd-M-yyyy',
		'placeholder' => 'Choose Att Date',
		],
        
    ]); ?>

    <?= $form->field($model, 'bell_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\AttendanceBell::find()->orderBy('id')->asArray()->all(), 'id', 'time_start'),
        'options' => ['placeholder' => 'Choose Attendance bell'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
