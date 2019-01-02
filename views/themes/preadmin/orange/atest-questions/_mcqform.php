<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AtestQuestionAnswers */
/* @var $form yii\widgets\ActiveForm */


?>

<div class="atest-question-answers-form">

    <?php $form = ActiveForm::begin(); 
$i=1;
    foreach($questions as $question)
	{
		echo '<div class="well">';
		echo "Q ".$i." ). &nbsp &nbsp".$question["atest_question"]."<br />";
		$answers = $ansmodel::find()->where(['atest_question_id'=>$question['atest_question_id']])->asArray()->all();
		//var_dump($answers);
		
		$resposes = array();
		foreach($answers as $answer)
		{
			//echo $answer['atest_question_answer'];
			//$answer
			$answer1 = implode(",",$answer);
			array_push($resposes,$answer['atest_question_answer']);
		}
		
			
			echo $form->field($responsemodel, "[$i]atest_question_answer_id")->inline(false)->radioList(['A'=>'A &nbsp &nbsp '.$resposes['0'],'B'=>'B &nbsp &nbsp '.$resposes['1'],'C'=>'C &nbsp &nbsp '.$resposes['2'],'D'=>'D &nbsp &nbsp '.$resposes['3']])->label(false); 
			
			//echo "$i) . ". $answer['atest_question_answer']."<br />";
		
		echo "<br />";
		$i++;
		echo "</div>";
	}
?>
  

    
    <?php ActiveForm::end(); ?>

</div>
