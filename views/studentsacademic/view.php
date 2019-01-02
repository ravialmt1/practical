<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\StudentsAcademic */

$this->title = $model->stu_id;
$this->params['breadcrumbs'][] = ['label' => 'Students Academic', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-academic-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Students Academic'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', ], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', ], [
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
        [
            'attribute' => 'stu.id',
            'label' => 'Stu',
        ],
        'class10_marks',
        'class10_board',
        'class12_marks',
        'class12_board',
        'class12_stream',
        'ug_perc',
        'ug_stream',
        'ug_university',
        'sem1_perc',
        'sem2_perc',
        'sem3_perc',
        'sem4_perc',
        'sem5_perc',
        'sem6_perc',
        'sem7_perc',
        'sem8_perc',
        'sem9_perc',
        'sem10_perc',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Students<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnStudents = [
        'uni_id',
        'course_id',
        'stu_name',
        'reg_no',
        'semester',
        'section',
        'emai_id',
        'mobile_no',
        'laptop',
        'smart_phone',
        'address',
        'dob',
        'father_name',
        'mother_name',
        'parent_contact',
        'caste',
        'religion',
        'nationality',
    ];
    echo DetailView::widget([
        'model' => $model->stu,
        'attributes' => $gridColumnStudents    ]);
    ?>
</div>
