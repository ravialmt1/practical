<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedbackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedbacks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>
    

    <p>
        <?= Html::a('Create Feedback', 'feedback/create', ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'reg_no',
            'subject_id',
            'q1',
            'q2',
            // 'q3',
            // 'q4',
            // 'q5',
            // 'q6',
            // 'q7',
            // 'q8',
            // 'q9',
            // 'q10',
            // 'q11',
            // 'q12',
            // 'q13',
            // 'q14',
            // 'q15',
            // 'q16',
            // 'q17',
            // 'q18',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
