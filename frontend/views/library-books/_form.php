
<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use yii\widgets\Menu;
/* @var $this yii\web\View */
/* @var $model frontend\models\LibraryBooks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="library-books-form">

    <?php $form = ActiveForm::begin([
    'type'=>ActiveForm::TYPE_HORIZONTAL,
    'formConfig'=>['labelSpan'=>2, 'deviceSize'=>ActiveForm::SIZE_SMALL],
]); ?>
<div class="form-group kv-fieldset-inline">
<div class="col-sm-4">
    <?= $form->field($model, 'Id')->textInput()->label('ID') ?>
</div><div class="col-sm-4">
    <?= $form->field($model, 'Isbn')->textInput(['maxlength' => true]) ?>
	
</div><div class="col-sm-4">
    <?= $form->field($model, 'Book_name')->textInput(['maxlength' => true]) ?>
</div><div class="col-sm-4">
    <?= $form->field($model, 'Book_catogary_id')->DropDownList($lib_category1)->label('Catogary') ?>
</div><div class="col-sm-4">

    <?= $form->field($model, 'Cupboard_id')->DropDownList($lib_cupboard1)->label('Cupboard') ?>
</div><div class="col-sm-4">
    <?= $form->field($model, 'Cupboard_shelf_id')->DropDownList($lib_shelf1)->label('Cupboard Self') ?>
</div><div class="col-sm-4">
    <?= $form->field($model, 'Author')->textInput(['maxlength' => true]) ?>
</div><div class="col-sm-4">
    <?= $form->field($model, 'Copy')->textInput() ?>
</div></div>
<?php 

if (empty($lib_category1)) {
	echo "Before entering Library Books Enter Library Books Category Details"."<br />";
}
if (empty($lib_cupboard1)) {
	echo "Before entering Library Books Enter Library Books cupboard Details"."<br />";
	echo "<br />"."you can do it here"."<br />" ;
	?>
	<p>
	<?= Html::a('Create Book Cupboard', ['/library-book-cupboard/create'], ['class'=>'btn btn-primary']) ?>
	</p>
	<?php
}
if (empty($lib_shelf1)) {
	echo "<br />"."Before entering Library Books Enter LibraryBooks cupboard Shelf Details"."<br />";
	echo "<br />"."you can do it here"."<br />" ;
?>
<p>
	<?= Html::a('Create Library Book Cupboard Shelf', ['/library-cupboard-shelf/create'], ['class'=>'btn btn-primary']) ?>
	</p><br />
	<?php
	}
?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
