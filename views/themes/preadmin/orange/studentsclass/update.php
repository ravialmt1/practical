<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Studentsclass */

$this->title = 'Update Studentsclass: ' . ' ' . $model->student_id;
$this->params['breadcrumbs'][] = ['label' => 'Studentsclass', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_id, 'url' => ['view', ]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="studentsclass-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
