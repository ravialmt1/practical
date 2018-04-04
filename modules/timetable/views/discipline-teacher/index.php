<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Discipline Teacher Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discipline-teacher-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Discipline Teacher Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'discipline.name',
            'teacher.lastname',
            'teacher.firstname',
            'teacher.fathername',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
