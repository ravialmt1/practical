<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tempfile */

$this->title = 'Create Tempfile';
$this->params['breadcrumbs'][] = ['label' => 'Tempfile', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tempfile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
