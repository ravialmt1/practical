<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\UniversityContact */

$this->title = $model->uni_contact_id;
$this->params['breadcrumbs'][] = ['label' => 'University Contact', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-contact-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'University Contact'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->uni_contact_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->uni_contact_id], [
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
    <div class="row">
        <h4>University<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUniversity = [
        'university_name',
    ];
    echo DetailView::widget([
        'model' => $model->uni,
        'attributes' => $gridColumnUniversity    ]);
    ?>
</div>
