<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DisciplineModel */

$this->title = 'Create Discipline Model';
$this->params['breadcrumbs'][] = ['label' => 'Discipline Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discipline-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
