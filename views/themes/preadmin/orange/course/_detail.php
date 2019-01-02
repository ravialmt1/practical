<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Course */

?>
<div class="course-view">

    

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'course_id', 'visible' => false],
        [
            'attribute' => 'uni.university_name',
            'label' => 'Uni',
        ],
        'vertical',
        'course_name',
        'course_short_name',
        'course_batch',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
	<div class="row">
        <div class="col-sm-9">
            <p>
        
		<?php $url = Url::toRoute(['../classes', 'id' => $model->course_id]); ?>
		<?= Html::a('Classes ', [$url],['class' => 'btn btn-success']) ?>
		<?= Html::a('Course Matrix', ['site/index'], ['class' => 'btn btn-info']) ?>
		<?= Html::a('Events', ['events'], ['class' => 'btn btn-warning']);?>
		<?= Html::a('Fees Structure', ['fees','id' => $model->course_id], ['class' => 'btn btn-danger']);?>
		<?= Html::a('Infrastructure', ['infra','id' => $model->course_id], ['class' => 'btn btn-warning']);?>
		<?= Html::a('Examination', ['examination','id'=>$model->course_id], ['class' => 'btn btn-info']);?>
		<?= Html::a('Course Settings', ['coursesettings','id'=>$model->course_id], ['class' => 'btn btn-info']); // duration, fees etc?>
		
    </p>
        </div>
    </div>
</div>