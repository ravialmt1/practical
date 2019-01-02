<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AtestQuestions */

$this->title = 'Take Test';
$this->params['breadcrumbs'][] = ['label' => 'Atest Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atest-questions-create">

    <h1 align="center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_mcqform', [
        'questions' => $questions,
		'ansmodel' =>$ansmodel,
		'responsemodel' => $responsemodel,
    ]) ?>

</div>
