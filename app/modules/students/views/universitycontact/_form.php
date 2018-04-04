<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\UniversityContact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="university-contact-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'uni_id')->textInput() ?>

    <?= $form->field($model, 'coordinator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
