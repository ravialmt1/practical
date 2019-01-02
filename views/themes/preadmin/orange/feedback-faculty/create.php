<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FeedbackFaculty */

$this->title = 'Create Feedback Faculty';
$this->params['breadcrumbs'][] = ['label' => 'Feedback Faculties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-faculty-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
