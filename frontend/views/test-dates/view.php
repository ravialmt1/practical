<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\TestDates */

$this->title = $model->test_id;
$this->params['breadcrumbs'][] = ['label' => 'Test Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-dates-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->test_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->test_id], [
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
            'test_id',
            'test_date',
        ],
    ]) ?>

</div>
<?= Html::a('Create Test Questions', ['test-questions/create'], ['class' => 'btn btn-success']) ?>
