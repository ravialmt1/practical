<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\AttendanceDate */

$this->title = 'Update Attendance Date: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Attendance Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="attendance-date-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
