<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subjects */

$this->title = 'Assign Faculty for: ' . $subject_name. ' ' ;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sub_id, 'url' => ['view', 'id' => $model->sub_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subjects-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_assignform', [
        'model' => $model,
		'faculties' => $faculties,
		'course' => $course,
		'subject_name' => $subject_name,
    ]) ?>

</div>
