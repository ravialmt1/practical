<?php
use yii\helpers\html;
use kartik\form\ActiveForm;
//use kartik\widgets\ActiveForm;
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\base\Model; 

$form = ActiveForm::begin();
$count = 0;
$data = [0 => 'Present', 1 => 'Absent', 2 => 'Tardy'];
echo "<div class='row'>";
?>
<div class="panel panel-primary">
                        <div class="panel-heading">
						
						<?php echo '<div class="col-lg-1 col-md-2" halign="center">'.'Sl.No'.'</div>';
	echo '<div class="col-lg-3 col-md-6" halign="center">'.'Name'.'</div>';
	echo '<div class="col-lg-3 col-md-6" halign="center">'.'Attendance'.'</div><br /></div></div></div>';
foreach ($models as $index => $model) {
	$count++;
	
	echo "<div class='row'>";
	echo '<div class="col-lg-1 col-md-2" halign="center">'.$count.'</div>';
	echo '<div class="col-lg-3 col-md-6">';
	echo $form->field($model, "[$index]fullname")->staticInput()->label(false);
	echo '</div><div class="col-lg-6 col-md-12">';
	echo $form->field($model, "[$index]attstatus")->radioButtonGroup($data,[
	'value' => '0',
    'class' => 'btn-group-lg',
    'itemOptions' => ['labelOptions' => ['class' => 'btn btn-success']]])->label(false);
	echo "</div></div>";
}
?>

<?= Html::submitButton('Save'); 

ActiveForm::end(); 
/*
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
	 
	 
	 
	 */
	?> 
	 
