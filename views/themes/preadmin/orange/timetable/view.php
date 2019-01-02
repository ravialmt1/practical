<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Timetable */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Timetable', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Timetable'.' '. Html::encode($this->title) ?></h2>
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
        'sem',
        [
            'attribute' => 'section.section',
            'label' => 'Section',
        ],
        [
            'attribute' => 'bell.id',
            'label' => 'Bell',
        ],
        [
            'attribute' => 'day.id',
            'label' => 'Day',
        ],
        [
            'attribute' => 'subject.id',
            'label' => 'Subject',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
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
        <h4>AttendanceBell<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnAttendanceBell = [
        'university_id',
        [
            'attribute' => 'course.course_id',
            'label' => 'Course',
        ],
        'time_start',
        'time_end',
    ];
    echo DetailView::widget([
        'model' => $model->bell,
        'attributes' => $gridColumnAttendanceBell    ]);
    ?>
    <div class="row">
        <h4>DaysWeek<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnDaysWeek = [
        'name',
    ];
    echo DetailView::widget([
        'model' => $model->day,
        'attributes' => $gridColumnDaysWeek    ]);
    ?>
    <div class="row">
        <h4>Subjects<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnSubjects = [
        'university_id',
        [
            'attribute' => 'course.course_id',
            'label' => 'Course',
        ],
        'sem',
        'section',
        'sub_name',
    ];
    echo DetailView::widget([
        'model' => $model->subject,
        'attributes' => $gridColumnSubjects    ]);
    ?>
    <div class="row">
        <h4>Section<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnSection = [
        'stu_id',
        [
            'attribute' => 'uni.id',
            'label' => 'Uni',
        ],
        [
            'attribute' => 'course.id',
            'label' => 'Course',
        ],
        'semester',
        'section',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
    ];
    echo DetailView::widget([
        'model' => $model->section,
        'attributes' => $gridColumnSection    ]);
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
</div>
