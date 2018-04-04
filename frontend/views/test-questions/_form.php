<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Test;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\TestQuestions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-questions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $lib_category1 = ArrayHelper::map(Test::find()->all(), 'test_id', 'name');?>
	<?= $form->field($model, 'test_id')->DropDownList($lib_category1)->label('Catogary') ?>

    <?= $form->field($model, 'questions')->widget(\yii\redactor\widgets\Redactor::className()) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
