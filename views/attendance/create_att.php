<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Attendance */

$this->title = 'Create Attendance';
$this->params['breadcrumbs'][] = ['label' => 'Attendance', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formatt', [
		'model' => $model,
        'stu_list' => $stu_list,
		'uni_id' => $uni_id,
			'course_id' => $course_id,
			'sem' => $sem,
			'hours' => $hours,
			'section' => $section,
			'att_date' => $att_date,
		//'section_id' => $section_id,
		//'att_model' => $att_model,
    ]) ?>

</div>
