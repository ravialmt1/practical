<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Classstudents */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="classstudents-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal',]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'class_id')->hiddenInput(['value' => $classid])->label(false); ?>
<div class="col-md-12">
<div class="col-md-4">
    <?= $form->field($model, 'student_name')->textInput(['maxlength' => true, 'placeholder' => 'Student Name']) ?>
</div>
<div class="col-md-4">
    <?= $form->field($model, 'regno')->textInput(['maxlength' => true, 'placeholder' => 'Regno']) ?>
	</div>
<div class="col-md-4">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	</div>

    <?php ActiveForm::end(); ?>

</div>
