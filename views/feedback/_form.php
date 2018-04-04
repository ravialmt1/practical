<?php
use kartik\rating\StarRating;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\db\Query;
$connection = \Yii::$app->db;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */
/* @var $form yii\widgets\ActiveForm */
?>
<?php 
$q1 = (new Query())->select('question')->from('feedback_questions')->where('q_id=1')->one();
$q2 = (new Query())->select('question')->from('feedback_questions')->where('q_id=2')->one();
$q3 = (new Query())->select('question')->from('feedback_questions')->where('q_id=3')->one();
$q4 = (new Query())->select('question')->from('feedback_questions')->where('q_id=4')->one();
$q5 = (new Query())->select('question')->from('feedback_questions')->where('q_id=5')->one();
$q6 = (new Query())->select('question')->from('feedback_questions')->where('q_id=6')->one();
$q7 = (new Query())->select('question')->from('feedback_questions')->where('q_id=7')->one();
$q8 = (new Query())->select('question')->from('feedback_questions')->where('q_id=8')->one();
$q9 = (new Query())->select('question')->from('feedback_questions')->where('q_id=9')->one();
$q10 = (new Query())->select('question')->from('feedback_questions')->where('q_id=10')->one();
$q11 = (new Query())->select('question')->from('feedback_questions')->where('q_id=11')->one();
$q12 = (new Query())->select('question')->from('feedback_questions')->where('q_id=12')->one();
$q13 = (new Query())->select('question')->from('feedback_questions')->where('q_id=13')->one();
$q14 = (new Query())->select('question')->from('feedback_questions')->where('q_id=14')->one();
$q15 = (new Query())->select('question')->from('feedback_questions')->where('q_id=15')->one();
$q16 = (new Query())->select('question')->from('feedback_questions')->where('q_id=16')->one();
$q17 = (new Query())->select('question')->from('feedback_questions')->where('q_id=17')->one();
$q18 = (new Query())->select('question')->from('feedback_questions')->where('q_id=18')->one();
?>
<div class="feedback-form">

    <?php $form = ActiveForm::begin(['layout' => 'horizontal']); ?>

    <?= $form->field($model, 'id')->textInput()->hiddenInput()->label(false); ?>
	
	<?= $form->field($model, 'reg_no')->textInput(['maxlength' => true])->label("Enter your Registartion Number"); ?>

    <?= $form->field($model, 'subject_id')->textInput(['maxlength' => true])->hiddenInput()->label(false); ?>

    <?= $form->field($model, 'q1')->widget(StarRating::classname(), [ 'pluginOptions' => ['step' => 1, 'stars' => 4, 'min' => 0,'max' => 4]])->label($q1['question']); ?>

    <?= $form->field($model, 'q2')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q2['question']); ?>

    <?= $form->field($model, 'q3')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q3['question']); ?>

    <?= $form->field($model, 'q4')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q4['question']); ?>

    <?= $form->field($model, 'q5')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q5['question']); ?>

    <?= $form->field($model, 'q6')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q6['question']); ?>

    <?= $form->field($model, 'q7')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q7['question']); ?>

    <?= $form->field($model, 'q8')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q8['question']); ?>

    <?= $form->field($model, 'q9')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q9['question']); ?>

    <?= $form->field($model, 'q10')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q10['question']); ?>

    <?= $form->field($model, 'q11')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q11['question']); ?>

    <?= $form->field($model, 'q12')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q12['question']); ?>

    <?= $form->field($model, 'q13')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q13['question']); ?>

    <?= $form->field($model, 'q14')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q14['question']); ?>

    <?= $form->field($model, 'q15')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q15['question']); ?>

    <?= $form->field($model, 'q16')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q16['question']); ?>

    <?= $form->field($model, 'q17')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q17['question']); ?>

    <?= $form->field($model, 'q18')->inline(true)->radioList(['1'=>'Best',2=>'Better',3=>'Good',4=>'Ok'])->label($q18['question']); ?>
	

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>