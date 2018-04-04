<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Clas */

$this->title = $model->clas_id;
$this->params['breadcrumbs'][] = ['label' => 'Clas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->clas_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->clas_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'clas_id',
            'teacher_id',
            'clas_name',
        ],
    ]) ?>

</div>