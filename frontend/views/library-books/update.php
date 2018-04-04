<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\LibraryBooks */

$this->title = 'Update Library Books: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Library Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="library-books-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
