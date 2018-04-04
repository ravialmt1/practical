<?php
use  yii\web\Session;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Test */
/* @var $form yii\widgets\ActiveForm */
$session = Yii::$app->session;
?>

<div class="test-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'faculty_id')->textInput(['hidden' => true, ])->label(false) ->hiddenInput(['value' => Yii::$app->user->id])?>

    <?= $form->field($model, 'class_id')->textInput(['hidden' => true, ])->label(false) ->hiddenInput(['value' => $session->get('clas')])?>
	
	<?= $form->field($model, 'section_id')->textInput(['hidden' => true, ])->label(false) ->hiddenInput(['value' => $session->get('section')])?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
