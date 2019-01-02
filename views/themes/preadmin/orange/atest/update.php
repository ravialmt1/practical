<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atest */

$this->title = 'Update Atest: ' . $model->atest_id;
$this->params['breadcrumbs'][] = ['label' => 'Atests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->atest_id, 'url' => ['view', 'id' => $model->atest_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="atest-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
