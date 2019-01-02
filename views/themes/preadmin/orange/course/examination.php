<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Course */

$this->title = $model->course_name;
$this->params['breadcrumbs'][] = ['label' => 'Course', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Course'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->course_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->course_id], [
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
        ['attribute' => 'course_id', 'visible' => false],
        [
            'attribute' => 'uni.uni_id',
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
        <h4>University<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUniversity = [
        'university_name',
    ];
    echo DetailView::widget([
        'model' => $model->uni,
        'attributes' => $gridColumnUniversity    ]);
    ?>
</div>
<div class="row">
<?= Html::a('Common Exams', ['examination','id'=>$model->course_id], ['class' => 'btn btn-info']);?>||
<?= Html::a('Default Grading', ['examination','id'=>$model->course_id], ['class' => 'btn btn-info']);?>||
<?= Html::a('Results', ['examination','id'=>$model->course_id], ['class' => 'btn btn-info']);?>||
<?= Html::a('Grade Book', ['examination','id'=>$model->course_id], ['class' => 'btn btn-info']);?>||
<?= Html::a('Exam Schedule', ['examination','id'=>$model->course_id], ['class' => 'btn btn-info']);?>||
<?= Html::a('Preperatory exams Shcedule', ['examination','id'=>$model->course_id], ['class' => 'btn btn-info']);?>
</div>
