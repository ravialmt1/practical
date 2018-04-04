<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Academic Hour Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-hour-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Academic Hour Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'class.number',
            'class.letter',
            'subject.name',
            'num_of_hours',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
