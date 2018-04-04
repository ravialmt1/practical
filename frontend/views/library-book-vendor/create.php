<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\LibraryBookVendor */

$this->title = 'Create Library Book Vendor';
$this->params['breadcrumbs'][] = ['label' => 'Library Book Vendors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-book-vendor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
