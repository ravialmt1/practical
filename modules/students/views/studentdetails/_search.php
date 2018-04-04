<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\StudentDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'StuName') ?>

    <?= $form->field($model, 'StuRegNo') ?>

    <?= $form->field($model, 'StuGender') ?>

    <?= $form->field($model, 'StuCourse') ?>

    <?php // echo $form->field($model, 'StuBatch') ?>

    <?php // echo $form->field($model, 'StuSem') ?>

    <?php // echo $form->field($model, 'StuEmail') ?>

    <?php // echo $form->field($model, 'StuMobile') ?>

    <?php // echo $form->field($model, 'StuClassTenMarks') ?>

    <?php // echo $form->field($model, 'StuClassTenBoard') ?>

    <?php // echo $form->field($model, 'StuClassTwelveMarks') ?>

    <?php // echo $form->field($model, 'StuClassTwelveBoard') ?>

    <?php // echo $form->field($model, 'Stream') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
