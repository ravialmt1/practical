<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Classstudents */

$this->title = 'Update Classstudents: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Classstudents', 'url' => ['index?id='.$classid]];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="classstudents-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'classid' => $classid,
    ]) ?>

</div>
