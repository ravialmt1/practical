<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedbackcourseMatrixSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedbackcourse Matrices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedbackcourse-matrix-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Feedbackcourse Matrix', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'university',
            'course_name',
            'batch',
            'semester',
            // 'subject_code',
            // 'category',
            // 'subject',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
