<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Subjects */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="faculty-map-form">
<? $course ?>
    <?php $form = ActiveForm::begin(); ?>
<?php
$faculties=ArrayHelper::map($faculties,'fac_id','fac_name');
?>
    <?= $form->field($model, 'fac_id')->dropDownList(
        $faculties,
        ['prompt'=>'Select faculty']
        ); ?>

    <?= $form->field($model, 'sub_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
