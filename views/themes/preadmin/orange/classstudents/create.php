<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Classstudents */

$this->title = 'Create Classstudents';
$this->params['breadcrumbs'][] = ['label' => 'Classstudents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classstudents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'classid' => $classid,
    ]) ?>

</div>