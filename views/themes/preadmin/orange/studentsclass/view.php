<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Studentsclass */

$this->title = $model->student_id;
$this->params['breadcrumbs'][] = ['label' => 'Studentsclass', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="studentsclass-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Studentsclass'.' '. Html::encode($this->title) ?></h2>
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
            'attribute' => 'student.id',
            'label' => 'Student',
        ],
        [
            'attribute' => 'class.id',
            'label' => 'Class',
        ],
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
        'model' => $model->student,
        'attributes' => $gridColumnStudents    ]);
    ?>
    <div class="row">
        <h4>Classes<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnClasses = [
        'course_id',
        'sem',
        'section',
    ];
    echo DetailView::widget([
        'model' => $model->class,
        'attributes' => $gridColumnClasses    ]);
    ?>
</div>
