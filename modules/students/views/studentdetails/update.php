<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\StudentDetails */

$this->title = 'Update Student Details: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Student Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="student-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
