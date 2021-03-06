<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Faculty */

$this->title = $model->fac_id;
$this->params['breadcrumbs'][] = ['label' => 'Faculty', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Faculty'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-6" style="margin-top: 15px">
            
			<?= Html::a('Add Another Faculty', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Update', ['update', 'id' => $model->fac_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->fac_id], [
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
        'fac_id',
        'fac_name',
        [
            'attribute' => 'uni.university_name',
            'label' => 'Uni',
        ],
        [
            'attribute' => 'course.course_name',
            'label' => 'Course',
        ],
		[
            'attribute' => 'course.vertical',
            'label' => 'Vertical',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    
