<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Timetable of classes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'day.name',
            'bell.time_start',
            'bell.time_end',
            'teacher.lastname',
            'teacher.firstname',
            'teacher.fathername',
            'class.number',
            'class.letter',
            'subject.name_short',
        ],
    ]); ?>
</div>
