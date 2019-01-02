<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FeedbackcourseMatrix */

$this->title = 'Send Feedback to students';
$this->params['breadcrumbs'][] = ['label' => 'Feedback to students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedbackcourse-matrix-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
