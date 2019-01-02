<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Classresult */

$this->title = 'Update Classresult: ' . ' ' . $model->reg_no;
$this->params['breadcrumbs'][] = ['label' => 'Classresult', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->reg_no, 'url' => ['view', ]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="classresult-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
