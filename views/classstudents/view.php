<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Classstudents */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Classstudents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classstudents-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Classstudents'.' '. Html::encode($this->title) ?></h2>
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
        [
            'attribute' => 'class.id',
            'label' => 'Class',
        ],
        'student_name',
        'regno',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Classes<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnClasses = [
        'id',
        'course_id',
        'sem',
        'section',
    ];
    echo DetailView::widget([
        'model' => $model->class,
        'attributes' => $gridColumnClasses    ]);
    ?>
</div>
