<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subjects */

$this->title = 'Assign Faculties: ' . ' ' ;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sub_id, 'url' => ['view', 'id' => $model->sub_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subjects-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_assignform', [
        'model' => $model,
		'faculties' => $faculties,
		'course' => $course,
    ]) ?>

</div>
