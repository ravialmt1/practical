<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AcademicHourModel */

$this->title = 'Create Academic Hour Model';
$this->params['breadcrumbs'][] = ['label' => 'Academic Hour Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-hour-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
