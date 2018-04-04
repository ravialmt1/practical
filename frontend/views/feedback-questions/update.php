<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\FeedbackQuestions */

$this->title = 'Update Feedback Questions: ' . $model->q_id;
$this->params['breadcrumbs'][] = ['label' => 'Feedback Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->q_id, 'url' => ['view', 'id' => $model->q_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="feedback-questions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
