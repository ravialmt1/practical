<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Classresult */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="classresult-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true, 'placeholder' => 'Reg No']) ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true, 'placeholder' => 'Subject']) ?>

    <?= $form->field($model, 'internal')->textInput(['maxlength' => true, 'placeholder' => 'Internal']) ?>

    <?= $form->field($model, 'university_marks')->textInput(['maxlength' => true, 'placeholder' => 'University Marks']) ?>

    <?= $form->field($model, 'practical')->textInput(['maxlength' => true, 'placeholder' => 'Practical']) ?>

    <?= $form->field($model, 'total')->textInput(['maxlength' => true, 'placeholder' => 'Total']) ?>

    <?= $form->field($model, 'credits')->textInput(['maxlength' => true, 'placeholder' => 'Credits']) ?>

    <?= $form->field($model, 'grade')->textInput(['maxlength' => true, 'placeholder' => 'Grade']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
