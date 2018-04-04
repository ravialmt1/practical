<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\UniversityContactSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="university-contact-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'uni_contact_id') ?>

    <?= $form->field($model, 'uni_id') ?>

    <?= $form->field($model, 'coordinator') ?>

    <?= $form->field($model, 'contact_no') ?>

    <?= $form->field($model, 'address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
