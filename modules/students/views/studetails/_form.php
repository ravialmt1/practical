<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\StudentDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'course_id')->textInput() ?>

    <?= $form->field($model, 'StuName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StuRegNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StuGender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StuSem')->textInput() ?>

    <?= $form->field($model, 'StuEmail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StuMobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StuClassTenMarks')->textInput() ?>

    <?= $form->field($model, 'StuClassTenBoard')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'StuClassTwelveMarks')->textInput() ?>

    <?= $form->field($model, 'StuClassTwelveBoard')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Stream')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
