<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StudentsAcademic */

$this->title = 'Update Students Academic: ' . ' ' . $model->stu_id;
$this->params['breadcrumbs'][] = ['label' => 'Students Academic', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stu_id, 'url' => ['view', ]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="students-academic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
