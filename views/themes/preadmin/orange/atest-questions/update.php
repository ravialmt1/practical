<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AtestQuestions */

$this->title = 'Update Atest Questions: ' . ' ' . $model->atest_question_id;
$this->params['breadcrumbs'][] = ['label' => 'Atest Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->atest_question_id, 'url' => ['view', 'id' => $model->atest_question_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="atest-questions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'modelsAnswers' =>$modelsAnswers,
    ]) ?>

</div>
