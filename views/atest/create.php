<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Atest */

$this->title = 'Create Atest';
$this->params['breadcrumbs'][] = ['label' => 'Atests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atest-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
