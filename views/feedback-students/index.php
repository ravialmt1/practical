<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedbackStudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Feedback Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-students-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Feedback Students', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'university',
            'student_name',
            'registration_no',
            'course_name',
            // 'batch',
            // 'semester',
            // 'email_id:email',
            // 'mobile_no',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
