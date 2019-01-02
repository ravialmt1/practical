<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Subjectelectivemap */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Subjectelectivemap', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjectelectivemap-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Subjectelectivemap'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
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

    <div class="row">
<?php 
    $gridColumn = [
        'id',
        'elective_group',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerSubjects->totalCount){
    $gridColumnSubjects = [
        ['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'university.uni_id',
                'label' => 'University'
            ],
            [
                'attribute' => 'course.course_id',
                'label' => 'Course'
            ],
            'sem',
            'section',
            'sub_name',
                ];
    echo Gridview::widget([
        'dataProvider' => $providerSubjects,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-subjects']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Subjects'),
        ],
        'export' => false,
        'columns' => $gridColumnSubjects
    ]);
}
?>

    </div>
</div>
