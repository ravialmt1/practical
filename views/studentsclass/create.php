<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Studentsclass */

$this->title = 'Create Studentsclass';
$this->params['breadcrumbs'][] = ['label' => 'Studentsclass', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studentsclass-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
