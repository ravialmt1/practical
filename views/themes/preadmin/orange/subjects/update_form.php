<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\University;
use app\models\Faculty;
use app\models\Course;
use yii\helpers\ArrayHelper;
use kartik\typeahead\Typeahead;
use kartik\depdrop\Depdrop;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Subjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subjects-form">
<?php $model2 = new University(); 
$model3 = new Course();
$items = array ('1','2','3','4','5','6','7','8','9','10');
?>
    <?php $form = ActiveForm::begin(); 
	

	//ArrayHelper::map(faculty::find()->all(),'fac_id','fac_name');
	?>

    


	
    <div class="row">
						<div class="col-sm-3">
                        <?= $form->field($model,'faculty_id')->DropDownList( ArrayHelper::map(faculty::find()->where('uni_id' == $uni_id)->all(), 'fac_id', 'fac_name'),['prompt'=>'Select Faculty Name'])  ?>
						</div>
						<div class="col-sm-6">
                               <?= $form->field($model, 'sub_name')->textInput() ?>
                         </div>
						
					</div>	

	  <?= $form->field($model, 'university_id')->textInput(['hidden' => true]) ->hiddenInput(['value' => $uni_id])->label(false);?>
	 <?= $form->field($model,'course')->textInput(['readonly' => true, 'value' => $course_id])->hiddenInput(['value' => $course_id])->label(false); ?>
	 
	 <?= $form->field($model,'sem')->textInput(['readonly' => true, 'value' => $sem])->hiddenInput(['value' => $sem])->label(false); ?>
	 
	 
    

    <div class="form-group">
        <?= Html::submitButton('Update Subject Information', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	
</div>