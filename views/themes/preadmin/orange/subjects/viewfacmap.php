<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use app\models\Subjects;
use app\models\Faculty;

/* @var $this yii\web\View */
/* @var $model app\models\Subjects */

$this->title = "Faculty Map";
$this->params['breadcrumbs'][] = ['label' => 'Subjects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjects-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Subjects'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model["sub_id"]], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['dele', 'id' => $model["sub_id"]], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php
$subject = Subjects::find('sub_name')->where(['id' => $sub_id])->one();
$faculty = Faculty::find('fac_name')->where(['fac_id' => $model['fac_id']])->one();
echo $subject['sub_name']." is assigned to ".$faculty['fac_name'];
    ?>
	<br />
	<?= $model['fac_id']; ?>
	<br />
	

    </div>
    
    
