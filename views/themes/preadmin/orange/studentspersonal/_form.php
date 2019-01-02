<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentsPersonal */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="students-personal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'stu_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Students::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Students'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'laptop')->textInput(['maxlength' => true, 'placeholder' => 'Laptop']) ?>

    <?= $form->field($model, 'smart_phone')->textInput(['maxlength' => true, 'placeholder' => 'Smart Phone']) ?>

    <?= $form->field($model, 'Address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true, 'placeholder' => 'City']) ?>

    <?= $form->field($model, 'dob')->textInput(['maxlength' => true, 'placeholder' => 'Dob']) ?>

    <?= $form->field($model, 'father_name')->textInput(['maxlength' => true, 'placeholder' => 'Father Name']) ?>

    <?= $form->field($model, 'mother_name')->textInput(['maxlength' => true, 'placeholder' => 'Mother Name']) ?>

    <?= $form->field($model, 'parent_contact')->textInput(['maxlength' => true, 'placeholder' => 'Parent Contact']) ?>

    <?= $form->field($model, 'caste')->textInput(['maxlength' => true, 'placeholder' => 'Caste']) ?>

    <?= $form->field($model, 'religion')->textInput(['maxlength' => true, 'placeholder' => 'Religion']) ?>

    <?= $form->field($model, 'nationality')->textInput(['maxlength' => true, 'placeholder' => 'Nationality']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
