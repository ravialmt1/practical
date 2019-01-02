<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedbackFacultySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedback Faculties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-faculty-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Feedback Faculty', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'feed_id',
            'faculty',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
