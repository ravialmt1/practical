<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LibraryBooksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Library Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Library Books', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'Isbn',
            'Book_name',
            'Book_catogary_id',
            'Cupboard_id',
            // 'Cupboard_shelf_id',
            // 'Author',
            // 'Copy',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
