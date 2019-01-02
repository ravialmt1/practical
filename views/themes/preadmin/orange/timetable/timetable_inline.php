<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use app\models\Classes;
use app\models\Subjects;
use app\models\Course;
use app\models\Timetable;
use app\models\AttendanceBell;
use app\models\DaysWeek;
$this->title = 'Timetable';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="timetable-index">

    
    
<?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'uni_id',
                'label' => 'Uni',
                'value' => function($model){                   
                    return $model->uni->uni_id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\University::find()->asArray()->all(), 'uni_id', 'uni_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'University', 'id' => 'grid--uni_id']
            ],
        [
                'attribute' => 'course_id',
                'label' => 'Course',
                'value' => function($model){                   
                    return $model->course->course_id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->asArray()->all(), 'course_id', 'course_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Course', 'id' => 'grid--course_id']
            ],
        'sem',
        'section_id',
        [
                'attribute' => 'bell_id',
                'label' => 'Bell',
                'value' => function($model){                   
                    return $model->bell->id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\AttendanceBell::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Attendance bell', 'id' => 'grid--bell_id']
            ],
        [
                'attribute' => 'day_id',
                'label' => 'Day',
                'value' => function($model){                   
                    return $model->day->id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\DaysWeek::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Days week', 'id' => 'grid--day_id']
            ],
        [
                'attribute' => 'subject_id',
                'label' => 'Subject',
                'value' => function($model){                   
                    return $model->subject->id;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Subjects::find()->asArray()->all(), 'id', 'id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Subjects', 'id' => 'grid--subject_id']
            ],
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ]; 
    ?>
     <?php /* GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-timetable']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]) ,
        ],
    ]); */ ?> 
	<?php
	$class = Classes::findOne($id);
$id = $class->id;

$course_id = $class->course_id;
$course = Course::findOne($course_id);
$sem = $class->sem;
$section_id = $class->section;
$index = 1;
$uni_id = $course->uni_id;
$uni_name = $course->uni->university_name;
$subject_id = Timetable::findAll([
    'uni_id' => $uni_id,
	'course_id' =>$course_id,
	'sem' => $sem,
	]);
$attendancebell = AttendanceBell::findAll([
    'university_id' => $uni_id,
	'course_id' =>$course_id,
	]);
$days = DaysWeek::find()
    ->indexBy('id')
    ->all();
	?>
<div class="col-xs-12">
                
                
                <div class="row">
                    <div class="col-xs-12">
                        <div class="table table-bordered">
                            <table class="table table-bordered">
                                <thead>
                                    <tr> <th>Time / Day </th>
									<?php foreach($attendancebell as $bell){ ?>
	
                                       
                                        <th class ="alert alert-info fade in"><?= $bell['time_start']." To ".$bell['time_end']; ?></th>
                                        <?php } ?>
                                    </tr>
									
                                </thead>
                                <tbody>
								<?php foreach ($days as $day) 
		{ $flag=0;?>
								
		
                                    <tr>
									<th class ="alert alert-info fade in"><?= $day["name"]; 
									 ?></th>
									<?php 
									
										
									foreach($attendancebell as $bell){ 
$subject_id = Timetable::findOne([
    'uni_id' => $uni_id,
	'course_id' =>$course_id,
	'sem' => $sem,
	'bell_id' =>$bell['id'],
	'day_id' => $day['id'],
	]);									?>
                                        <td style="height:70px">
<?php 
	if(empty($subject_id))
	{
		echo "<h4 style='color:red'>Not Set</h3>";
	}
	else
	{
		$subject = Subjects::findOne($subject_id['subject_id']);
$subject_name = $subject->sub_name;
		
echo "<h4 style='color:green'>$subject_name</h3>";
	}
//echo $bell['id'];
//echo "--".$index."--";
//echo "--bell".$bell['day_id']."--";
//echo "--".$subject_id[$index]['day_id']."--";


// echo "--".$index."--";
//echo "--".$subject_id[$index]['day_id']."--";

 $flag=1;
									
 ?>
										 </td>
									<?php  }if($flag==1) continue; ?>
                                    </tr>
									
		<?php  } ?>
                                 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
				
				 

</div>
