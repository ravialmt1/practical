<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Subjectstudents */

$this->title = 'Create Subjectstudents';
$this->params['breadcrumbs'][] = ['label' => 'Subjectstudents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjectstudents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
