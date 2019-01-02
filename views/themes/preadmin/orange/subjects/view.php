<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Subjects */

$this->title = $model->sub_name;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index?'.$_GET['class_id']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjects-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Subjects'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
			
			<?= Html::a('OK', ['index', 'id' => $_GET['class_id']], ['class' => 'btn btn-primary']) ?>
            <?= Html::button('Update', ['value' => Url::to(['subjects/update?id='.$model->id]), 'title' => 'Update the Subject', 'class' => 'showModalButton btn btn-success']); ?>
			
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
            'attribute' => 'university.university_name',
            'label' => 'University',
        ],
        [
            'attribute' => 'course.course_short_name',
            'label' => 'Course',
        ],
		[
            'attribute' => 'course.course_batch',
            'label' => 'Batch',
        ],
        'sem',
		'section',
        'sub_name',
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
    
    
