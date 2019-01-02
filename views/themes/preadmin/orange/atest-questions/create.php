<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AtestQuestions */

$this->title = 'Create Atest Questions';
$this->params['breadcrumbs'][] = ['label' => 'Atest Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atest-questions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'modelsAnswers' =>$modelsAnswers,
    ]) ?>

</div>
