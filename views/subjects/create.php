<?php

use yii\helpers\Html;
use app\models\Subjects;

/* @var $this yii\web\View */
/* @var $model app\models\Subjects */


$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjects-create">

    <h1><?= Html::encode($this->title) ?></h1>

        <?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Saved!</h4>
  <?= Yii::$app->session->getFlash('success') ?>
  </div>
<?php endif; ?>

    <?= $this->render('_form', [
        'model' => $model,
		'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
		'sem' => $sem,
			'course_name' => $course_name,
			'course_id' => $course_id,
			'uni_id' => $uni_id,
    ]) ?>

	
</div>
