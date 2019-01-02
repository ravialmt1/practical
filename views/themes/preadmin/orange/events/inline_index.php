<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use app\assets\AppAsset;
AppAsset::register($this);


$this->params['breadcrumbs'][] = $this->title;
/* $search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search); */
?>

<div class="events-index">

    

    
        
		
		
						<?php
yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader',],
    'id' => 'modal',
    'size' => 'modal-lg',
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);

echo "<div id='modalContent'>";

echo "</div>";
yii\bootstrap\Modal::end();
?>
    
<?= \yii2fullcalendar\yii2fullcalendar::widget(array(
      'events'=> $events,

	  
  ));
?>
</div>
