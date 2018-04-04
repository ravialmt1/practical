<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FeedbackQuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedback Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-questions-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Feedback Questions', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'q_id',
            'ques',
            'one_word',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
