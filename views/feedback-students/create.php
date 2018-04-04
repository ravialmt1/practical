<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FeedbackStudents */

$this->title = 'Create Feedback Students';
$this->params['breadcrumbs'][] = ['label' => 'Feedback Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-students-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
