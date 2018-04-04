<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\LibraryCupboardShelf */

$this->title = 'Create Library Cupboard Shelf';
$this->params['breadcrumbs'][] = ['label' => 'Library Cupboard Shelves', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-cupboard-shelf-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
