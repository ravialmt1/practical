<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Subjects */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjects-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->renderAjax('_form', [
        'model' => $model,
		'university_id' => $university_id,
		'course' => $course,
		'sem' => $sem,
		'section' => $section,
    ]) ?>
	
</div>
