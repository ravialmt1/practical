<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\students\models\StudentFeesCollection */

$this->title = 'Create Student Fees Collection';
$this->params['breadcrumbs'][] = ['label' => 'Student Fees Collections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-fees-collection-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
