<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clas */

$this->title = 'Create Clas';
$this->params['breadcrumbs'][] = ['label' => 'Clas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>