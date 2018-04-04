<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LibraryCupboardShelfSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Library Cupboard Shelves';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-cupboard-shelf-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Library Cupboard Shelf', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Cupboard_id',
            'Capacity',
            'Details:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
