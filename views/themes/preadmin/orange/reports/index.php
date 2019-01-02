<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Subjects;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UniversitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Create Subject Wise Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Report', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
