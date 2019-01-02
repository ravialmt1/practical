<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Course */

?>
<div class="course-view">

    

    <div class="row">
<?php 
    $gridColumn = [
        
        
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
	<div class="row" align="center">
        <div class="col-sm-12">
            <p>
        
		<?= Html::a('Students ', ['./classstudents?id='.$model->id],['class' => 'btn btn-success']) ?>
		<?= Html::a('Subjects ', ['./subjects?id='.$model->id],['class' => 'btn btn-info']) ?>
		<?= Html::a('Past Results ', ['./classstudents/resultimport?id='.$model->id],['class' => 'btn btn-success']) ?>
		<?= Html::a('Events', ['events'], ['class' => 'btn btn-info']) ?>
		<?= Html::a('Assignments', ['site/index'], ['class' => 'btn btn-warning']);?>
		<?= Html::a('MCQ Test', ['/atest'], ['class' => 'btn btn-danger']);?>
		<?= Html::a('Fees Collection', ['/classfess?id='.$model->id], ['class' => 'btn btn-warning']);?>
		<?= Html::a('Timetable', ['/timetable/timetable?id='.$model->id], ['class' => 'btn btn-info']);?>
		<?= Html::a('Attendance', ['attendance/create?id='.$model->id], ['class' => 'btn btn-success']);?>
		<?= Html::a('Examination', ['site/index'], ['class' => 'btn btn-warning']);?>
		<?= Html::a('Feedback', ['/feedback?id='.$model->id], ['class' => 'btn btn-danger']);?>
		<?= Html::a('Result Sheet', ['/classresult?id='.$model->id], ['class' => 'btn btn-info']);?>
		<?= Html::a('Promote Students', ['promote?id='.$model->id], ['class' => 'btn btn-success']);?>
		
		
    </p>
        </div>
    </div>
</div>