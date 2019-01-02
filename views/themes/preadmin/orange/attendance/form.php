<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Attendance */
/* @var $form ActiveForm */
?>
<div class="attendance-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'student_id') ?>
        <?= $form->field($model, 'teacher_id') ?>
        <?= $form->field($model, 'section_id') ?>
        <?= $form->field($model, 'subject_id') ?>
        <?= $form->field($model, 'bell_id') ?>
        <?= $form->field($model, 'att_status') ?>
        <?= $form->field($model, 'att_date') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- attendance-form -->
