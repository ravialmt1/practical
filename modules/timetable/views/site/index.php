<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Time Table';
?>
<div class="site-index">
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>classes</h2>

                <ul class="list-group">
                    <li class="list-group-item"><b>id</b></li>
                    <li class="list-group-item"><b>letter</b> - class letter</li>
                    <li class="list-group-item"><b>number</b> - class number</li>
                </ul>

                <p><?= Html::a('Управление учебнными классами', ['/class'], ['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Tutors</h2>

                <ul class="list-group">
                    <li class="list-group-item"><b>id</b></li>
                    <li class="list-group-item"><b>firstname</b></li>
                    <li class="list-group-item"><b>lastname</b></li>
                    <li class="list-group-item"><b>fathername</b></li>
                </ul>

                <p><?= Html::a('Управление преподавателями', ['/teacher'], ['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>objects</h2>

                <ul class="list-group">
                    <li class="list-group-item"><b>id</b></li>
                    <li class="list-group-item"><b>name</b> - discipline name</li>
                    <li class="list-group-item"><b>name_short</b> - abbreviated name of the discipline</li>
                </ul>

                <p><?= Html::a('Управление дисциплинами', ['/discipline'], ['class' => 'btn btn-default']) ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Days of the week</h2>

                <ul class="list-group">
                    <li class="list-group-item"><b>id</b></li>
                    <li class="list-group-item"><b>name</b> - the name of the day of the week (Tue., Mon., etc.</li>
                </ul>

                <p><?= Html::a('View the day of the week', ['/days-week'], ['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>calls</h2>

                <ul class="list-group">
                    <li class="list-group-item"><b>id</b></li>
                    <li class="list-group-item"><b>time_start</b> - start time for the lesson</li>
                    <li class="list-group-item"><b>time_end</b> - end time for the lesson</li>
                </ul>

                <p><?= Html::a('Call Management', ['/bell'], ['class' => 'btn btn-default']) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Academic clock</h2>

                <ul class="list-group">
                    <li class="list-group-item"><b>id</b></li>
                    <li class="list-group-item"><b>class_id</b> - communication with the table of educational classes</li>
                    <li class="list-group-item"><b>subject_id</b> - connection with a table of disciplines</li>
                    <li class="list-group-item"><b>num_of_hours</b> - number of hours</li>
                </ul>

                <p><?= Html::a('Load management', ['/academic-hour'], ['class' => 'btn btn-default']) ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h2>Communication discipline with teachers</h2>

                <ul class="list-group">
                    <li class="list-group-item"><b>id</b></li>
                    <li class="list-group-item"><b>discipline_id</b></li>
                    <li class="list-group-item"><b>teacher_id</b></li>
                </ul>

                <p><?= Html::a('Managing the connections between disciplines and teachers', ['/discipline-teacher'], ['class' => 'btn btn-default']) ?></p>
            </div>
        </div>
    </div>
</div>
