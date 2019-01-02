<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\AttendanceBell */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Attendance Bell', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-bell-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Attendance Bell'.' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'university.uni_id',
            'label' => 'University',
        ],
        [
            'attribute' => 'course.course_id',
            'label' => 'Course',
        ],
        'time_start',
        'time_end',
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
                'attribute' => 'student.id',
                'label' => 'Student'
            ],
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
        <h4>University<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnUniversity = [
        'uni_id',
        'university_name',
    ];
    echo DetailView::widget([
        'model' => $model->university,
        'attributes' => $gridColumnUniversity    ]);
    ?>
    <div class="row">
        <h4>Course<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnCourse = [
        'uni_id',
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
<?php
if($providerTimetable->totalCount){
    $gridColumnTimetable = [
        ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'class.course_id',
                'label' => 'Class'
            ],
            'sem',
            'section',
                        [
                'attribute' => 'day.id',
                'label' => 'Day'
            ],
            [
                'attribute' => 'subject.id',
                'label' => 'Subject'
            ],
    ];
    echo Gridview::widget([
        'dataProvider' => $providerTimetable,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-timetable']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Timetable'),
        ],
        'export' => false,
        'columns' => $gridColumnTimetable
    ]);
}
?>

    </div>
</div>
