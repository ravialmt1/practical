<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AtestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Atests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atest-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Atest', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'atest_id',
            'atest_name',
            'atest_difficulty',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
