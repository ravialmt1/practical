<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\TestQuestions */

$this->title = 'Update Test Questions: ' . $model->test_id;
$this->params['breadcrumbs'][] = ['label' => 'Test Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->test_id, 'url' => ['view', 'id' => $model->test_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="test-questions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
