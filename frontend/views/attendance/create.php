<?php

use yii\helpers\Html;
use yii\base\Model; 

/* @var $this yii\web\View */
/* @var $model frontend\models\Students */

$this->title = 'Enter Attendance';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'models' => $models,
		//'dataProvider' => $dataProvider,
    ]) ?>

</div>
