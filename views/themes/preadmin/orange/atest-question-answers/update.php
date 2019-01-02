<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AtestQuestionAnswers */

$this->title = 'Update Atest Question Answers: ' . ' ' . $model->atest_question_answer_id;
$this->params['breadcrumbs'][] = ['label' => 'Atest Question Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->atest_question_answer_id, 'url' => ['view', 'id' => $model->atest_question_answer_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="atest-question-answers-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
