<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FeedbackcourseMatrix */

$this->title = 'Create Feedbackcourse Matrix';
$this->params['breadcrumbs'][] = ['label' => 'Feedbackcourse Matrices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedbackcourse-matrix-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
