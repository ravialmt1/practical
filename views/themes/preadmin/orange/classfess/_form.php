<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $model app\models\Classfees */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="classfees-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'id')->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'class_id')->hiddenInput(['value'=> $classid])->label(false); ?>

	<?= $form->field($model, 'classstudent_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => $students_list,
        'options' => ['placeholder' => 'Select Student'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
   
   <?= $form->field($model, 'amount')->textInput(['placeholder' => 'Amount']) ?>
	
    <?= $form->field($model, 'particulars')->textInput(['maxlength' => true, 'placeholder' => 'Particulars']) ?>

    <?= $form->field($model, 'feesdate')->widget(DateControl::classname(), [
     'type'=>DateControl::FORMAT_DATE,
	 'displayFormat' => 'yyyy/MM/dd',
]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
