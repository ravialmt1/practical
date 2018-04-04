<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\StudentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'course_id') ?>

    <?= $form->field($model, 'stu_name') ?>

    <?= $form->field($model, 'reg_no') ?>

    <?= $form->field($model, 'course_name') ?>

    <?php // echo $form->field($model, 'batch') ?>

    <?php // echo $form->field($model, 'semester') ?>

    <?php // echo $form->field($model, 'section') ?>

    <?php // echo $form->field($model, 'emai_id') ?>

    <?php // echo $form->field($model, 'mobile_no') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
