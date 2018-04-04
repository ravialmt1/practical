<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model frontend\models\Students */

$this->title = 'Create Students';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>
	
	<div class="countries-index">

    <?= $this->render('_form', [
        'model' => $model,
		'clas' => $clas,
		'section' => $section,
		'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
    ]) ?>



</div>