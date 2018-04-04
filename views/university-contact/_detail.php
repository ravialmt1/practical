<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\UniversityContact */

?>
<div class="university-contact-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->uni_contact_id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'uni_contact_id', 'visible' => false],
        [
            'attribute' => 'uni.university_name',
            'label' => 'University',
        ],
        'coordinator',
        'contact_no',
        'address:ntext',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>