<?php
 use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 
/* @var $this yii\web\View */
/* @var $model app\models\Countries */
/* @var $form yii\widgets\ActiveForm */
?>
 
<?php
 
$this->registerJs(
   '$("document").ready(function(){ 
        $("#new_student").on("pjax:end", function() {
            $.pjax.reload({container:"#students"});  //Reload GridView
        });
    });'
);
?>
 

 
<?php yii\widgets\Pjax::begin(['id' => 'new_student']) ?>
<?php $form = ActiveForm::begin(['options' => ['data-pjax' => true ]]); ?>
 <div class="row">
<div class="col-lg-3">
    <?= $form->field($model, 'first_name')->textInput(['maxlength' => 200]) ?>
	</div><div class="col-lg-3">
	   <?= $form->field($model, 'last_name')->textInput(['maxlength' => 200]) ?>
	   </div><div class="col-lg-3">
	   <?= $form->field($model, 'student_clas')->hiddenInput(['maxlength' => 200, 'value' => $clas])->label(false) ?>
	   </div><div class="col-lg-3">
		     <?= $form->field($model, 'section')->hiddenInput(['maxlength' => 200, 'value' => $section,])->label(false) ?>
	   </div>
	      
 
 
    <div class="col-lg-3"><br />
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	</div>
 
<?php ActiveForm::end(); ?>

<div class="col-lg-06">
<div class="students">
<?php //yii\widgets\Pjax::begin(['id' => 'students']) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            'first_name',
            'last_name',
            //'student_clas',
            //'section',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	
<?php yii\widgets\Pjax::end() ?>
</div>
</div>
</div>
