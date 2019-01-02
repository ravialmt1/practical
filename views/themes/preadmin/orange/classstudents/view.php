<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Classstudents */

$this->title = $model->student_name;
$this->params['breadcrumbs'][] = ['label' => 'Classstudents', 'url' => ['index?id='.$model->class_id]];
$this->params['breadcrumbs'][] = ['label' => 'Classstudents', 'url' => ['index?id='.$model->class_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classstudents-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?=  Html::encode($this->title) ?></h2>
			<p>
        <?= Html::a('Back to Students', ['classstudents/index?id='.$model->class_id], ['class' => 'btn btn-success']) ?>
		<?= Html::a('Add Another student', ['classstudents/create?id='.$model->class_id], ['class' => 'btn btn-success']) ?>
		
    </p>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id,'classid'=>$model->class_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id,'classid'=>$model->class_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'id',
        [
            'attribute' => 'class.course.course_name',
            'label' => 'Class',
        ],
        'student_name',
        'regno',
    ];
   
?>
    </div>
    <div class="row">
        <h4><?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnClasses = [
        //'id',
        'course.course_name',
        'sem',
        'section',
    ];
    echo DetailView::widget([
        'model' => $model->class,
        'attributes' => $gridColumnClasses    ]);
    ?>
</div>
