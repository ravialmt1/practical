<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subjectelectivemap */

$this->title = 'Update Elective Group: ' . ' ' . $model->elective_group;
$this->params['breadcrumbs'][] = ['label' => 'Elective Group', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->elective_group, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subjectelectivemap-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
