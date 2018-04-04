<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LibraryBookVendorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Library Book Vendors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-book-vendor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Library Book Vendor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Name',
            'Address:ntext',
            'Contact_no',
            'email_id:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
