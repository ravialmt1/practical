<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\FeedbackQuestions */

$this->title = 'Create Feedback Questions';
$this->params['breadcrumbs'][] = ['label' => 'Feedback Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-questions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
