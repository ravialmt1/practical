<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\LibraryBooksSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-books-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'Isbn') ?>

    <?= $form->field($model, 'Book_name') ?>

    <?= $form->field($model, 'Book_catogary_id') ?>

    <?= $form->field($model, 'Cupboard_id') ?>

    <?php // echo $form->field($model, 'Cupboard_shelf_id') ?>

    <?php // echo $form->field($model, 'Author') ?>

    <?php // echo $form->field($model, 'Copy') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
