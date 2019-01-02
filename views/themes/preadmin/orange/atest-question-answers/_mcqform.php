<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AtestQuestionAnswers */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="atest-question-answers-form">

    <?php $form = ActiveForm::begin(); 

    foreach($stu_list as $questions)
	echo "$questions ->atest_question";
?>
  

    
    <?php ActiveForm::end(); ?>

</div>
