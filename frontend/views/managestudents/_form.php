<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\clas;

/* @var $this yii\web\View */
/* @var $model frontend\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'teacher_id')->hiddenInput(['value'=>Yii::$app->user->identity->id],['readonly' => true]) ?>
	
	<?= $form->field($model, 'student_clas')->dropDownlist(
			ArrayHelper::map(clas::find()->where(['teacher_id' => Yii::$app->user->id])->all(),'clas_id','clas_name'),
['prompt'=>'Select Class'])
			?>

    <?= $form->field($model, 'section')->dropDownlist(
			ArrayHelper::map(clas::find()->where(['teacher_id' => Yii::$app->user->id])->all(),'clas_id','section'),
['prompt'=>'Select Section'])
			?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
