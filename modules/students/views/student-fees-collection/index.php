<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\StudentFeesCollectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Student Fees Collections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-fees-collection-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Student Fees Collection', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'student_id',
            'amount',
            'payment_type',
            'cheque_no',
            // 'bank_name',
            // 'bank_branch',
            // 'created_at',
            // 'updated_at',
            // 'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
