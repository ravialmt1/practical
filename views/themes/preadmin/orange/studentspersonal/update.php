<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentsPersonal */

$this->title = 'Update Students Personal: ' . ' ' . $model->stu_id;
$this->params['breadcrumbs'][] = ['label' => 'Students Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stu_id, 'url' => ['view', ]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="students-personal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
