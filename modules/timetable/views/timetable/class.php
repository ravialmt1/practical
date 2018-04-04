<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Class schedule';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="timetable-model-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?php $form = ActiveForm::begin(['method' => 'get']); ?>

            <?= $form->field($model, 'class')->dropDownList($classes, [
                'prompt' => 'Choose a class to search ...'
            ]) ?>

            <div class="form-group">
                <?= Html::submitButton('Get schedule', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

        <hr>

        <div class="col-lg-12">
            <table class="table table-bordered table-responsive text-center">
                <tr>
                    <td rowspan="2" class="vertical-middle h4" style="vertical-align: middle"><b>Time</b></td>
                    <td colspan="<?= count($days) ?>"><b>Day</b></td>
                </tr>
                <tr>
                    <?php foreach ($days as $day) { ?>
                        <td class="text-center"><b><?= $day['name'] ?></b></td>
                    <?php } ?>
                </tr>
                <?php foreach ($bells as $bell) { ?>
                    <tr>
                        <td><b><?= $bell['time_start'] ?> - <?= $bell['time_end'] ?></b></td>
                        <?php for ($i = 0; $i < count($days); $i++) { ?>
                            <?php $rowTimetable = isset($timetables[$bell['id']][$days[$i]['id']]) ? $timetables[$bell['id']][$days[$i]['id']][0] : [] ?>
                            <td class="text-center">
                                <?php if (!empty($rowTimetable)) { ?>
                                    <b><?= $rowTimetable->getSubject()->one()->name ?></b> <br>
                                    <?= $rowTimetable->getTeacher()->one()->lastname ?> <?= $rowTimetable->getTeacher()->one()->firstname ?> <?= $rowTimetable->getTeacher()->one()->fathername ?>
                                <?php } ?>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

</div>
