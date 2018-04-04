<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\BaseStringHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TestQuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Test Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-questions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Test Questions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'test_id',
            [
    'format' => 'html',
    'label' => 'Description',
    'value' => function ($dataProvider) {
        $url = $dataProvider->questions;
        return BaseStringHelper::truncateWords($url,30,null,true);
    },
],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
