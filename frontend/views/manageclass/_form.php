<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clas-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'teacher_id')->hiddenInput(['value'=>Yii::$app->user->identity->id],['readonly' => true]) ?>

    <?php $class_name = [
    ['id' => '1', 'name' => 'I'],
    ['id' => '2', 'name' => 'II'],
    ['id' => '3', 'name' => 'III'],
	['id' => '4', 'name' => 'IV'],
	['id' => '5', 'name' => 'V'],
	['id' => '6', 'name' => 'VI'],
	['id' => '7', 'name' => 'VII'],
	['id' => '8', 'name' => 'VIII'],
	['id' => '9', 'name' => 'IX'],
	['id' => '10', 'name' => 'X'],
	['id' => '11', 'name' => 'XI'],
	['id' => '12', 'name' => 'XII'],
];?>
 <?php $section = [
    ['id' => '1', 'name' => 'A'],
    ['id' => '2', 'name' => 'B'],
    ['id' => '3', 'name' => 'C'],
	['id' => '4', 'name' => 'D'],
	['id' => '5', 'name' => 'E'],
	['id' => '6', 'name' => 'F'],
	['id' => '7', 'name' => 'G'],
	['id' => '8', 'name' => 'H'],
];?>
    <?= $form->field($model,'clas_name')->dropDownList(ArrayHelper::map($class_name, 'id', 'name')); ?>
	
	<?= $form->field($model,'section')->dropDownList(ArrayHelper::map($section, 'id', 'name')); ?>

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
