<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\LibraryBookCatogary */

$this->title = 'Update Library Book Catogary: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Library Book Catogaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="library-book-catogary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
