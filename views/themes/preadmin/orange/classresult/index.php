<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = "Class Result2". " $course_name $sem";
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="classresult-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Classresult', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php 
     $res = [];
	 foreach($result as $result)
	 	 {
			 
			 echo $result['subject'];
			 foreach($subjects as $subject)
			 {
				 $subject1 = [];
		 if($result['subject']==$subject['subject']){
			 echo $result['subject'];
			 array_push($subject1,$result['reg_no']);
		 array_push($subject1,$result['Name']);
		 array_push($subject1,$result['subject']);
		 array_push($subject1,$result['internal']);
		 array_push($subject1,$result['university_marks']);
		 array_push($subject1,$result['practical']);
		 array_push($subject1,$result['total']);
		 array_push($subject1,$result['grade']);
		 array_push($res,$subject1);
			 }
	 /*{
		 
		 
		 
		 
		 
		 
			  */
	 }
		 var_dump($res);
			 }
    ?>
    
</div>
