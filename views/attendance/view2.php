<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Attendance */

$this->title = $sem;
$this->params['breadcrumbs'][] = ['label' => 'Attendance', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Attendance'.' '. Html::encode($this->title) ?></h2>
        </div>
        
    </div>

    <div class="row">
<?php 
    var_dump $sem;
?>
    </div>
   
</div>
