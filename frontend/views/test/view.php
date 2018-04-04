<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\models\TestDates;

/* @var $this yii\web\View */
/* @var $model frontend\models\Test */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$testdates=new TestDates();
?>
<div class="test-view">

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
            'faculty_id',
            'class_id',
            'section_id',
            'name',
            'description:ntext',
        ],
    ]) ?>
<?= Html::a('Create Test Dates', ['test-dates/create'], ['class' => 'btn btn-success']) ?>
</div>
