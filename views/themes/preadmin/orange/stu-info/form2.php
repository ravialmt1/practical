<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StuInfo */
/* @var $form yii\widgets\ActiveForm */

$form = ActiveForm::begin(); 
?>

<div class="stu-info-form">

    <?= $form->field($model, 'stu_unique_id')->textInput() ?>

    <?= $form->field($model, 'stu_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_middle_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_dob')->textInput() ?>

</div>