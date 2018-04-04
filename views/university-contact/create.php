<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UniversityContact */

$this->title = 'Create University Contact';
$this->params['breadcrumbs'][] = ['label' => 'University Contact', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-contact-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
