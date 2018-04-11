<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FacultyMap */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faculty-map-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fac_id')->textInput() ?>

    <?= $form->field($model, 'sub_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
