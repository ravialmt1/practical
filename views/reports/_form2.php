<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Subjects;
use app\models\University;
use app\models\Faculty;
use app\models\Course;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\University */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="university-form">

    <?php $form = ActiveForm::begin(); 
	$uni_model = new University();
	$sub_model = new Subjects();
	
	if(yii::$app->user->isGuest) {?>
		<?= $form->field($uni_model,'university_id')->DropDownList( ArrayHelper::map(university::find()->all(), 'uni_id', 'university_name'),['prompt'=>'Select University Name'])  ?>
	<?php } //else if(Yii::$app->user->identity->username == 'jain_ao') {
	//$model->university_id = 32; 
	//}
	else if(Yii::$app->user->identity->username == 'jlu_ao') {
	$uni_model->uni_id = 32; 
	$posts = 
	$uni_name = $uni_model::find('university_name')
                ->where(['uni_id' => $uni_model -> uni_id])
                ->One()['university_name'];
	}
    ?>
	<?= $form->field($uni_model, 'uni_id')->textInput(['readonly' => true, 'value' => $uni_name]) ?>
	<?= $form->field($sub_model, 'course')->DropDownList( ArrayHelper::map(course::find()->all(), 'course_id', 'course_name'),['prompt'=>'Select Course Name']) ?>
	<?= $form->field($sub_model, 'sem')->DropDownList( ArrayHelper::map(subjects::find()->all(), 'sem', 'sem'),['prompt'=>'Select Semester']) ?>
	

    <div class="form-group">
        <?= Html::submitButton('Get the Report', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
