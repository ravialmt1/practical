<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LibraryBookCatogarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Library Book Catogaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-book-catogary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Library Book Catogary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'book_catogary',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
