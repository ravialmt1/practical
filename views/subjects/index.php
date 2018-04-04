<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Course;
use app\models\Subjects;
use yii\data\ActiveDataProvider;
use yii\bootstrap\Button;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SubjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Subjects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjects-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?php //print_r($dataProvider->getModels()[0]['sub_name']); 
	$ao_list = array();
$ao_list["jlu_ao"] = 32;
$ao_list["sup_user"] = 1;
	$query = Course::find()->where(['uni_id'=>32,]);
	$provider = new ActiveDataProvider([
    'query' => $query,
]);
	$posts = $provider->getModels();
	foreach($provider ->getModels() as $posts)
	{
		$course_n = $posts->course_name ;
		$course_n = preg_replace("/[^a-zA-Z0-9\s\-]/", "", $course_n);
		$course_id = $posts->course_id ;
		?>
		
		<div class="panel panel-success">
		
  <div class="panel-heading"><?php echo $posts->course_name ; ?></div>
  
    <div class="panel-body">
 
<h2>Select Any Semester to Proceed Further</h2>
	<?php 
	
	$query = Subjects::find()->select('sem')->where(['course'=>$posts->course_id,])->distinct();
	$provider1 = new ActiveDataProvider([
    'query' => $query,
]);
	$posts = $provider1->getModels();
	$sem_count = 10;
	for($sem=1;$sem<=$sem_count;$sem++)
	
	{
	//$course = new course();
	
	//echo "Semester".$subject_model->sem. "  "; 
	//$a = '/subjects/class?uni_id='.$ao_list[Yii::$app->user->identity->username].'&sem='. $subject_model->sem.'&course='. $course_n ;
	//echo $a;
	?>
	<?= Html::a('Semester - '.$sem, ['/subjects/class?uni_id='.$ao_list[Yii::$app->user->identity->username].'&sem='. $sem.'&course='. $course_n.'&course_id='. $course_id,], ['class'=>'btn btn-primary grid-button']) ?>
	<?php //echo ['label' => 'Faculty', 'url' => ['/faculty/create?CourseSearch[uni_id]='.$ao_list[Yii::$app->user->identity->username]]];
	}
	
	?>
	</div> </div>
	<?php
	}
	?>
	
	
	 
	 <?php  /*GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sub_id',
			'faculty_id',
            'sub_name',
            'university_id',
            'course',
            'sem',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); */ ?> 
</div>
