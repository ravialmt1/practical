<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = $model->stu_name;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content container-fluid">
                <div class="row">
                    <div class="col-xs-7">
                        <h4 class="page-title"><?= $model->stu_name ?> Profile</h4>
                    </div>

                    <div class="col-xs-5 text-right m-b-30">
                        <a href="http://localhost/practical/students/update?id=<?= $model->id; ?>" class="btn btn-primary rounded"><i class="fa fa-plus"></i> Edit Profile</a>
                    </div>
                </div>
                <div class="card-box">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="assets/img/user.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 m-b-0"><?= $model->stu_name ?></h3>
												 <small class="text-muted"><?= $model->uni->university_name ?></small><br />
												 <small class="text-muted"><?= $model->course->course_name ?></small><br />
												 <small class="text-muted">Batch: <?= $model->course->course_batch ?></small><br />
                                                <div class="staff-id">Student ID : <?= $model->id ?></div>
                                                <div class="staff-msg"><a href="chat.html" class="btn btn-primary">Send Message</a></div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Phone:</span>
                                                    <span class="text"><a href=""><?= $model->mobile_no ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href=""><?= $model->emai_id ?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Birthday:</span>
                                                    <span class="text"><?= $model->dob ?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Address:</span>
                                                    <span class="text"><?= $model->address ?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Gender:</span>
                                                    <span class="text"> </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="card-box m-b-0">
                            <h3 class="card-title">Skills</h3>
                            <div class="skills">
                                <span>IOS</span>
                                <span>Android</span>
                                <span>Html</span>
                                <span>CSS</span>
                                <span>Codignitor</span>
                                <span>Php</span>
                                <span>Javascript</span>
                                <span>Wordpress</span>
                                <span>Jquery</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card-box">
                            <h3 class="card-title">Education Informations</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">International College of Arts and Science (UG)</a>
                                                <div>Bsc Computer Science</div>
                                                <span class="time">2000 - 2003</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">International College of Arts and Science (PG)</a>
                                                <div>Msc Computer Science</div>
                                                <span class="time">2000 - 2003</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-box m-b-0">
                            <h3 class="card-title">Experience</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Web Designer at Zen Corporation</a>
                                                <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Web Designer at Ron-tech</a>
                                                <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Web Designer at Dalt Technology</a>
                                                <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            'attribute' => 'uni.university_name',
            'label' => 'Uni',
        ],
        [
            'attribute' => 'course.course_name',
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
