<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\students\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Students', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'course_id',
            'stu_name',
            'reg_no',
            'semester',
            // 'section',
            // 'emai_id',
            // 'mobile_no',
            // 'laptop',
            // 'smart_phone',
            // 'address:ntext',
            // 'dob',
            // 'father_name',
            // 'mother_name',
            // 'parent_contact',
            // 'caste',
            // 'religion',
            // 'nationality',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
