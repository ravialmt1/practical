<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DisciplineTeacherModel */

$this->title = 'Create Discipline Teacher Model';
$this->params['breadcrumbs'][] = ['label' => 'Discipline Teacher Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="discipline-teacher-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
