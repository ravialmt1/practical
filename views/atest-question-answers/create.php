<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AtestQuestionAnswers */

$this->title = 'Create Atest Question Answers';
$this->params['breadcrumbs'][] = ['label' => 'Atest Question Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atest-question-answers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
