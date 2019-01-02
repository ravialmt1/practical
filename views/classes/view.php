<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Classes */

$this->title = "";
$this->params['breadcrumbs'][] = ['label' => 'Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Classes'.' '. Html::encode($this->title) ?></h2>
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
        [
            'attribute' => 'course.course_name',
            'label' => 'Course',
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
    <div class="row">
        <h4>Course<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnCourse = [
		 [
            'attribute' => 'uni.university_name',
            'label' => 'University',
        ],
        'vertical',
        'course_name',
        'course_short_name',
        'course_batch',
        
    ];
    echo DetailView::widget([
        'model' => $model->course,
        'attributes' => $gridColumnCourse    ]);
    ?>
</div>
