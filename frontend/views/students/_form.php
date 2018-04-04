<?php
use yii\helpers\html;
use kartik\widgets\ActiveForm;
use kartik\grid\GridView;
use kartik\builder\TabularForm;
$form = ActiveForm::begin();
echo TabularForm::widget([
    'dataProvider'=>$dataProvider,
    'form'=>$form,
    'attributes'=>$model->formAttribs,
	'gridSettings'=>[
        'floatHeader'=>true,
        'panel'=>[
            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Manage Students</h3>',
            'type' => GridView::TYPE_PRIMARY,
            'after'=> Html::a('<i class="glyphicon glyphicon-plus"></i> Add New', '#', ['class'=>'btn btn-success']) . ' ' . 
                    Html::a('<i class="glyphicon glyphicon-remove"></i> Delete', '#', ['class'=>'btn btn-danger']) . ' ' .
                    Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Save', ['class'=>'btn btn-primary'])
        ]
    ]   
]);
// Add other fields if needed or render your submit button
echo '<div class="text-right">' . 
     Html::submitButton('Submit', ['class'=>'btn btn-primary']) .
     '<div>';
ActiveForm::end();