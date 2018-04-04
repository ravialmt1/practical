<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DisciplineTeacherModel */

$this->title = 'Update Discipline Teacher Model: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Discipline Teacher Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="discipline-teacher-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>