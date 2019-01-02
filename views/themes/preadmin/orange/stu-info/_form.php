<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\StuInfo */
/* @var $form yii\widgets\ActiveForm */

use kartik\tabs\TabsX;
// Above

$items = [
    [
        'label'=>'<i class="glyphicon glyphicon-home"></i> Basic Info',
        'content'=>$this->render('form2', ['model' => $model]),
        'active'=>true
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-user"></i> Personal Profile',
        'content'=>$this->render('form3', ['model' => $model]),
        'active'=>false
    ],
    [
        'label'=>'<i class="glyphicon glyphicon-list-alt"></i> Other Details',
        'content'=>$this->render('form4', ['model' => $model]),
        'active'=>false
    ],
	[
        'label'=>'<i class="glyphicon glyphicon glyphicon-usd"></i> Fees Details',
        'content'=>$this->render('form5', ['model' => $model]),
        'active'=>false
    ],
    
];
echo TabsX::widget([
    'items'=>$items,
    'position'=>TabsX::POS_ABOVE,
    'encodeLabels'=>false
]);
// Below
