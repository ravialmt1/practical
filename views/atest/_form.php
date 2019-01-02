<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Atest */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atest-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'atest_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'atest_difficulty')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
