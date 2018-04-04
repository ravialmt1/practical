<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teacher Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Teacher Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lastname',
            'firstname',
            'fathername',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
