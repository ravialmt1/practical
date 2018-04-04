<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\LibraryBookVendor */

$this->title = 'Update Library Book Vendor: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Library Book Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="library-book-vendor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
