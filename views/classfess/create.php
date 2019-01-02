<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Classfees */

$this->title = 'Create Classfees';
$this->params['breadcrumbs'][] = ['label' => 'Classfees', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classfees-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
