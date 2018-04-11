<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\FacultyMap */

$this->title = 'Create Faculty Map';
$this->params['breadcrumbs'][] = ['label' => 'Faculty Maps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="faculty-map-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
