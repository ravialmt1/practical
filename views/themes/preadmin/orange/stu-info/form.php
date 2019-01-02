<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StuInfo */
/* @var $form yii\widgets\ActiveForm */
$form = ActiveForm::begin(); 
?>

<div class="stu-info-form">

    

        <?= $form->field($model, 'stu_mobile_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_info_stu_master_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
