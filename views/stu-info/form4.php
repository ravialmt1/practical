<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StuInfo */
/* @var $form yii\widgets\ActiveForm */

$form = ActiveForm::begin(); 
?>
<div class="stu-info-form">
<?= $form->field($model, 'stu_photo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stu_languages')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'stu_mobile_no')->textInput(['maxlength' => true]) ?>
	</div>
