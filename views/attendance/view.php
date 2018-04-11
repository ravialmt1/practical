<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Attendance */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Attendance', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="attendance-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Attendance'.' '. Html::encode($this->title) ?></h2>
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
        'id',
        [
            'attribute' => 'student.id',
            'label' => 'Student',
        ],
        [
            'attribute' => 'teacher.fac_id',
            'label' => 'Teacher',
        ],
        [
            'attribute' => 'section.section',
            'label' => 'Section',
        ],
        [
            'attribute' => 'subject.id',
            'label' => 'Subject',
        ],
        'att_date',
        [
            'attribute' => 'bell.id',
            'label' => 'Bell',
        ],
        'att_status',
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
        'id',
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
        'model' => $model->student,
        'attributes' => $gridColumnStudents    ]);
    ?>
    <div class="row">
        <h4>Faculty<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnFaculty = [
        'fac_id',
        'fac_name',
    ];
    echo DetailView::widget([
        'model' => $model->teacher,
        'attributes' => $gridColumnFaculty    ]);
    ?>
    <div class="row">
        <h4>Section<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnSection = [
        'id',
        'stu_id',
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
        <h4>Subjects<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnSubjects = [
        'id',
        'university_id',
        'course_id',
        'sem',
        'sub_name',
    ];
    echo DetailView::widget([
        'model' => $model->subject,
        'attributes' => $gridColumnSubjects    ]);
    ?>
    <div class="row">
        <h4>AttendanceBell<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnAttendanceBell = [
        'id',
        'university_id',
        'course_id',
        'time_start',
        'time_end',
    ];
    echo DetailView::widget([
        'model' => $model->bell,
        'attributes' => $gridColumnAttendanceBell    ]);
    ?>
</div>
