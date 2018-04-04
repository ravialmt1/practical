<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Faculty */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="faculty-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fac_name')->textInput(['maxlength' => true]) ?>
	<?php //$form->field($model,'university_id')->DropDownList( ArrayHelper::map(faculty::find()->all(), 'fac_id', 'fac_name'),['prompt'=>'Select Faculty']) 
	if(yii::$app->user->isGuest) {?>
		<?= $form->field($model,'uni_id')->DropDownList( ArrayHelper::map(university::find()->all(), 'uni_id', 'university_name'),['prompt'=>'Select University Name'])  ?>
	<?php } //else if(Yii::$app->user->identity->username == 'jain_ao') {
	//$model->university_id = 32; 
	//}
	else if(Yii::$app->user->identity->username == 'jlu_ao') {
	$model->uni_id = 32; 
	$uni_name = $model::find('university_name')
                ->where(['uni_id' => $uni_model -> uni_id])
                ->One()['university_name'];
	}
?>
	  <?= $form->field($model, 'uni_id')->textInput(['readonly' => true, 'value' => $model->uni_name]) ?>
	

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
