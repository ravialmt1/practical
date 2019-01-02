<?php 
	use yii\widgets\ActiveForm;
	use yii\helpers\Html;
?>
<h1>Import Data</h1>
<p>
        <?= Html::a('Back to Students', ['?id='.$classid], ['class' => 'btn btn-success']) ?>
				
    </p>
<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]);?>
 
<?= $form->field($modelImport,'fileImport')->fileInput() ?>
 
<?= Html::submitButton('Import',['class'=>'btn btn-primary']);?>
 
<?php ActiveForm::end();?>