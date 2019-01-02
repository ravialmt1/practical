<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Atest */

$this->title = $model->atest_id;
$this->params['breadcrumbs'][] = ['label' => 'Atests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atest-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->atest_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->atest_id], [
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
            'atest_id',
            'atest_name',
            'atest_difficulty',
        ],
    ]) ?>

</div>
