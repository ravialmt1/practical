<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StudentsAcademic */

$this->title = 'Create Students Academic';
$this->params['breadcrumbs'][] = ['label' => 'Students Academic', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-academic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
