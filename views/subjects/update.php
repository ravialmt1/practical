<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subjects */

$this->title = 'Update Subjects: ' . $model->sub_id;
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sub_id, 'url' => ['view', 'id' => $model->sub_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subjects-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('update_form', [
        'model' => $model,
		'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
		'sem' => $sem,
			'course_name' => $course_name,
			'course_id' => $course_id,
			'uni_id' => $uni_id,
    ]) ?>

</div>
