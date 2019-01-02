<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Infrastructure';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>        No of Class Rooms : 01 </p>
	<p>	No of Labs : 01 </p>
	<p>	No of Seminar Halls : 01 </p>
	<p>	No of Computers : 40     </p>


</div>
