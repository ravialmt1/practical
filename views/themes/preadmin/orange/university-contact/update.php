<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UniversityContact */

$this->title = 'Update University Contact: ' . ' ' . $model->uni_contact_id;
$this->params['breadcrumbs'][] = ['label' => 'University Contact', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->uni_contact_id, 'url' => ['view', 'id' => $model->uni_contact_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="university-contact-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
