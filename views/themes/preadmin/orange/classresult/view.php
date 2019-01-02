<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Classresult */

$this->title = $model->reg_no;
$this->params['breadcrumbs'][] = ['label' => 'Classresult', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classresult-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Classresult'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', ], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', ], [
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
        'reg_no',
        'Name',
        'subject',
        'internal',
        'university_marks',
        'practical',
        'total',
        'credits',
        'grade',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
</div>
