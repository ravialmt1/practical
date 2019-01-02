<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StudentsPersonal */

$this->title = 'Create Students Personal';
$this->params['breadcrumbs'][] = ['label' => 'Students Personal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-personal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
