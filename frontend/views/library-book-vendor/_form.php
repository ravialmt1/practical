<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LibraryBookVendor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-book-vendor-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="form-group kv-fieldset-inline">
<div class="col-sm-6">
    <?= $form->field($model, 'id')->textInput() ?>
</div><div class="col-sm-6">
    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>
</div><div class="col-sm-6">
    <?= $form->field($model, 'Address')->textarea(['rows' => 6]) ?>
</div><div class="col-sm-6">
    <?= $form->field($model, 'Contact_no')->textInput() ?>
</div><div class="col-sm-6">
    <?= $form->field($model, 'email_id')->textInput(['maxlength' => true]) ?>
</div></div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
