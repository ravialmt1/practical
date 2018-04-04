<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StuInfo */
/* @var $form yii\widgets\ActiveForm */
$form = ActiveForm::begin(); 

 ?>
<div class="stu-info-form">
<?= $form->field($model, 'stu_email_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_bloodgroup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_birthplace')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_religion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_admission_date')->textInput() ?>
	</div>