<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\LibraryBookStatus */

$this->title = 'Update Library Book Status: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Library Book Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="library-book-status-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
