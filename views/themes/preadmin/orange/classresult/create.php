<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Classresult */

$this->title = 'Create Classresult';
$this->params['breadcrumbs'][] = ['label' => 'Classresult', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classresult-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
