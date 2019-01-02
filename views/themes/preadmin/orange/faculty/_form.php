<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Faculty */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="faculty-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    

    <?= $form->field($model, 'fac_name')->textInput(['maxlength' => true, 'placeholder' => 'Fac Name']) ?>

    <?= $form->field($model, 'uni_id')->hiddenInput(['readonly' => true, 'value' => $university_id])->label(false) ?>
	
	
	<?php
	$data = \yii\helpers\ArrayHelper::map(\app\models\Course::find()->where(['uni_id'=>$university_id])->select('vertical')->distinct()->asArray()->all(), 'vertical', 'vertical');
	echo $form->field($model, 'vertical')->dropDownList($data);
	?>
	    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
