<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model StudentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-students-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'course_id')->textInput(['placeholder' => 'Course']) ?>

    <?= $form->field($model, 'stu_name')->textInput(['maxlength' => true, 'placeholder' => 'Stu Name']) ?>

    <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true, 'placeholder' => 'Reg No']) ?>

    <?= $form->field($model, 'semester')->textInput(['placeholder' => 'Semester']) ?>

    <?= $form->field($model, 'section')->textInput(['maxlength' => true, 'placeholder' => 'Section']) ?>

    <?php /* echo $form->field($model, 'emai_id')->textInput(['maxlength' => true, 'placeholder' => 'Emai']) */ ?>

    <?php /* echo $form->field($model, 'mobile_no')->textInput(['maxlength' => true, 'placeholder' => 'Mobile No']) */ ?>

    <?php /* echo $form->field($model, 'laptop')->textInput(['maxlength' => true, 'placeholder' => 'Laptop']) */ ?>

    <?php /* echo $form->field($model, 'smart_phone')->textInput(['maxlength' => true, 'placeholder' => 'Smart Phone']) */ ?>

    <?php /* echo $form->field($model, 'address')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'dob')->textInput(['maxlength' => true, 'placeholder' => 'Dob']) */ ?>

    <?php /* echo $form->field($model, 'father_name')->textInput(['maxlength' => true, 'placeholder' => 'Father Name']) */ ?>

    <?php /* echo $form->field($model, 'mother_name')->textInput(['maxlength' => true, 'placeholder' => 'Mother Name']) */ ?>

    <?php /* echo $form->field($model, 'parent_contact')->textInput(['maxlength' => true, 'placeholder' => 'Parent Contact']) */ ?>

    <?php /* echo $form->field($model, 'caste')->textInput(['maxlength' => true, 'placeholder' => 'Caste']) */ ?>

    <?php /* echo $form->field($model, 'religion')->textInput(['maxlength' => true, 'placeholder' => 'Religion']) */ ?>

    <?php /* echo $form->field($model, 'nationality')->textInput(['maxlength' => true, 'placeholder' => 'Nationality']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
