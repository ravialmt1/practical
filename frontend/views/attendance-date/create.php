<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\AttendanceDate */

$this->title = 'Create Attendance Date';
$this->params['breadcrumbs'][] = ['label' => 'Attendance Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-date-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
