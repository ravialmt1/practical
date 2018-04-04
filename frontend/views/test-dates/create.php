<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\TestDates */

$this->title = 'Create Test Dates';
$this->params['breadcrumbs'][] = ['label' => 'Test Dates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="test-dates-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
