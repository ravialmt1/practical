<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Subject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subject-form">

    <?php 
	$session = Yii::$app->session;
	$form = ActiveForm::begin(); 
	?>

    <?= $form->field($model, 'subject_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject_name')->textInput(['maxlength' => true]) ?>
	
		
	<?= $form->field($model, 'clas')->textInput(['hidden' => true, ])->label(false) ->hiddenInput(['value' => $session->get('clas')])?>
	
	<?= $form->field($model, 'section')->textInput(['hidden' => true, ])->label(false) ->hiddenInput(['value' => $session->get('section')])?>

   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
