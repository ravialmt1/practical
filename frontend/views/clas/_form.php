<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'teacher_id')->DropDownList($teachers)->label('Teachers') ?>

    <?= $form->field($model, 'clas_name')->DropDownList($classes)->label('Class') ?>

    <?= $form->field($model, 'section')->DropDownList($sections)->label('Section') ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
