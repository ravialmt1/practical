<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AttendanceBell */

$this->title = 'Create Attendance Bell';
$this->params['breadcrumbs'][] = ['label' => 'Attendance Bell', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-bell-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
