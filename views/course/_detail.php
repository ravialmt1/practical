<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Course */

?>
<div class="course-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->course_id) ?></h2>
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
</div>