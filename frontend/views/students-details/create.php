<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\StudentsDetails */

$this->title = 'Create Students Details';
$this->params['breadcrumbs'][] = ['label' => 'Students Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-details-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
