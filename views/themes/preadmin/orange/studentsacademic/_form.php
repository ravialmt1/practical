<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StudentsAcademic */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="students-academic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'stu_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Students::find()->orderBy('id')->asArray()->all(), 'id', 'id'),
        'options' => ['placeholder' => 'Choose Students'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'class10_marks')->textInput(['maxlength' => true, 'placeholder' => 'Class10 Marks']) ?>

    <?= $form->field($model, 'class10_board')->textInput(['maxlength' => true, 'placeholder' => 'Class10 Board']) ?>

    <?= $form->field($model, 'class12_marks')->textInput(['maxlength' => true, 'placeholder' => 'Class12 Marks']) ?>

    <?= $form->field($model, 'class12_board')->textInput(['maxlength' => true, 'placeholder' => 'Class12 Board']) ?>

    <?= $form->field($model, 'class12_stream')->textInput(['maxlength' => true, 'placeholder' => 'Class12 Stream']) ?>

    <?= $form->field($model, 'ug_perc')->textInput(['maxlength' => true, 'placeholder' => 'Ug Perc']) ?>

    <?= $form->field($model, 'ug_stream')->textInput(['maxlength' => true, 'placeholder' => 'Ug Stream']) ?>

    <?= $form->field($model, 'ug_university')->textInput(['maxlength' => true, 'placeholder' => 'Ug University']) ?>

    <?= $form->field($model, 'sem1_perc')->textInput(['maxlength' => true, 'placeholder' => 'Sem1 Perc']) ?>

    <?= $form->field($model, 'sem2_perc')->textInput(['maxlength' => true, 'placeholder' => 'Sem2 Perc']) ?>

    <?= $form->field($model, 'sem3_perc')->textInput(['maxlength' => true, 'placeholder' => 'Sem3 Perc']) ?>

    <?= $form->field($model, 'sem4_perc')->textInput(['maxlength' => true, 'placeholder' => 'Sem4 Perc']) ?>

    <?= $form->field($model, 'sem5_perc')->textInput(['maxlength' => true, 'placeholder' => 'Sem5 Perc']) ?>

    <?= $form->field($model, 'sem6_perc')->textInput(['maxlength' => true, 'placeholder' => 'Sem6 Perc']) ?>

    <?= $form->field($model, 'sem7_perc')->textInput(['maxlength' => true, 'placeholder' => 'Sem7 Perc']) ?>

    <?= $form->field($model, 'sem8_perc')->textInput(['maxlength' => true, 'placeholder' => 'Sem8 Perc']) ?>

    <?= $form->field($model, 'sem9_perc')->textInput(['maxlength' => true, 'placeholder' => 'Sem9 Perc']) ?>

    <?= $form->field($model, 'sem10_perc')->textInput(['maxlength' => true, 'placeholder' => 'Sem10 Perc']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
