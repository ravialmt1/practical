<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TestDates */

$this->title = 'Update Test Dates: ' . $model->test_id;
$this->params['breadcrumbs'][] = ['label' => 'Test Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->test_id, 'url' => ['view', 'id' => $model->test_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-dates-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
