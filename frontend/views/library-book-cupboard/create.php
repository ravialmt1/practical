<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\LibraryBookCupboard */

$this->title = 'Create Library Book Cupboard';
$this->params['breadcrumbs'][] = ['label' => 'Library Book Cupboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="library-book-cupboard-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
