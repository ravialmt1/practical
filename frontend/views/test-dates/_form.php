<?php
use yii\jui\DatePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Test;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model frontend\models\TestDates */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="test-dates-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $lib_category1 = ArrayHelper::map(Test::find()->all(), 'test_id', 'name');?>
	<?= $form->field($model, 'test_id')->DropDownList($lib_category1)->label('Catogary') ?>

   <?php echo DatePicker::widget([
    'model' => $model,
    'attribute' => 'test_date',
    //'language' => 'ru',
    'dateFormat' => 'yyyy-MM-dd',
]);
?>
</div>
<br />
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


