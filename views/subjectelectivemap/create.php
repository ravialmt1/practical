<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Subjectelectivemap */

$this->title = 'Create Subjectelectivemap';
$this->params['breadcrumbs'][] = ['label' => 'Subjectelectivemap', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjectelectivemap-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
