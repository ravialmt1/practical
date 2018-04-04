<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\FeedbackQuestions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-questions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ques')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'one_word')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
