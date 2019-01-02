<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\models\University;

/* @var $this yii\web\View */
/* @var $model app\models\Classes */

$this->title = "";
//$this->params['breadcrumbs'][] = ['label' => 'Classes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-view">

    <div class="row">
        <div class="col-sm-12" align="center">
            <h2><?= 'Classes'.' '. Html::encode($this->title) ?></h2>
        </div>
       
    </div>

    <div class="row">
<?php 
//$uni = new University();
$uni_id = $model->course->uni_id;
$university = University::findOne($uni_id);
$university_name = $university->university_name;
    $gridColumn = [
	
        [
            'attribute' => 'uni_id',
            'label' => 'University',
			'value' => $university_name,
        ],
		[
            'attribute' => 'course.course_name',
            'label' => 'Course',
        ],
		[
            'attribute' => 'course.course_batch',
            'label' => 'Batch',
        ],
        'sem',
        'section',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
   <div class="col-sm-12" align = "center" style="margin-top: 15px">
            
            <?= Html::a('OK', ['./classes?id='.$model->course_id], ['class' => 'btn btn-success']) ?>
			<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>  
</div>
