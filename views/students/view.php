<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Students'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'attribute' => 'uni.uni_id',
            'label' => 'Uni',
        ],
        [
            'attribute' => 'course.course_id',
            'label' => 'Course',
        ],
        'stu_name',
        'reg_no',
        'semester',
        'section',
        'emai_id',
        'mobile_no',
        'laptop',
        'smart_phone',
        'address:ntext',
        'dob',
        'father_name',
        'mother_name',
        'parent_contact',
        'caste',
        'religion',
        'nationality',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerAttendance->totalCount){
    $gridColumnAttendance = [
        ['class' => 'yii\grid\SerialColumn'],
                        [
                'attribute' => 'teacher.fac_id',
                'label' => 'Teacher'
            ],
            [
                'attribute' => 'section.section',
                'label' => 'Section'
            ],
            [
                'attribute' => 'subject.id',
                'label' => 'Subject'
            ],
            'att_date',
            [
                'attribute' => 'bell.id',
                'label' => 'Bell'
            ],
            'att_status',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerAttendance,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-attendance']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Attendance'),
        ],
        'export' => false,
        'columns' => $gridColumnAttendance
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerSection->totalCount){
    $gridColumnSection = [
        ['class' => 'yii\grid\SerialColumn'],
                        'semester',
            'section',
            'created_at',
            'updated_at',
            'created_by',
            'updated_by',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerSection,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-section']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Section'),
        ],
        'export' => false,
        'columns' => $gridColumnSection
    ]);
}
?>

    </div>
    <div class="row">
        <h4>Course<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnCourse = [
        [
            'attribute' => 'uni.uni_id',
            'label' => 'Uni',
        ],
        'vertical',
        'course_name',
        'course_short_name',
        'course_batch',
        'created_by',
        'updated_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    echo DetailView::widget([
        'model' => $model->course,
        'attributes' => $gridColumnCourse    ]);
    ?>
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
    
    <div class="row">
<?php
if($providerStudentsAcademic->totalCount){
    $gridColumnStudentsAcademic = [
        ['class' => 'yii\grid\SerialColumn'],
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
    echo Gridview::widget([
        'dataProvider' => $providerStudentsAcademic,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-students-academic']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Students Academic'),
        ],
        'export' => false,
        'columns' => $gridColumnStudentsAcademic
    ]);
}
?>

    </div>
    
    <div class="row">
<?php
if($providerStudentsPersonal->totalCount){
    $gridColumnStudentsPersonal = [
        ['class' => 'yii\grid\SerialColumn'],
                        'laptop',
            'smart_phone',
            'Address:ntext',
            'city',
            'dob',
            'father_name',
            'mother_name',
            'parent_contact',
            'caste',
            'religion',
            'nationality',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerStudentsPersonal,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-students-personal']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Students Personal'),
        ],
        'export' => false,
        'columns' => $gridColumnStudentsPersonal
    ]);
}
?>

    </div>
</div>
