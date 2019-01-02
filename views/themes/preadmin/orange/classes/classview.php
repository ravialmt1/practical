
<?php
use app\models\Events; 
?>
<div class="row">

                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-success"><i class="fa fa-money" aria-hidden="true">&#x20B9;</i></span>
                            <div class="dash-widget-info">
                                <h3>43</h3>
                                <span>Number of Students</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-info"><i class="fa fa-user-o" aria-hidden="true">&#x20B9;</i></span>
                            <div class="dash-widget-info">
                                <h3>12</h3>
                                <span>Fees Defaulters&#x20B9;</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-warning"><i class="fa fa-calendar-check-o"></i></span>
                            <div class="dash-widget-info">
                                <h3>8 </h3>
                                <span>Attendance Shortage Students</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-danger"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                            <div class="dash-widget-info">
                                <h3>2</h3>
                                <span>feedbacks</span>
                            </div>
                        </div>
                    </div>
                </div>
				
				
				<div class="row">

                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-primary"><i class="fa fa-braille" aria-hidden="true"></i></span>
                            <div class="dash-widget-info">
                                <h3>43</h3>
                                <span>Assignmnents</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-success"><i class="fa fa-mortar-board" aria-hidden="true"></i></span>
                            <div class="dash-widget-info">
                                <h3>2</h3>
                                <span>Examinations</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-info"><i class="fa fa-question-circle-o"></i></span>
                            <div class="dash-widget-info">
                                <h3>8</h3>
                                <span>Online Tests</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-3">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-warning"><i class="fa fa-thumbs-down" aria-hidden="true"></i></span>
                            <div class="dash-widget-info">
                                <h3>2</h3>
                                <span>Concerns</span>
                            </div>
                        </div>
                    </div>
					<div class="row">
					
					<div class="row">
                    <div class="col-sm-6">
                        <div class="timetable">
                            <div class="panel-heading">
                                <h6 class="panel-title">Timetable</h6>
                            </div>
                            <div class="panel-body">
                                
								<?php echo Yii::$app->view->render('//timetable/timetable_inline', ['id' => 33]); ?>
                                                                   
                            </div>
							</div>
                            
                        </div>
                    </div>
					<?php
					$times = Events :: find()->all();
		

    foreach ($times AS $time){
      //Testing
      $Event = new \yii2fullcalendar\models\Event();
      $Event->id = $time->id;
      $Event->title = $time->title;
      $Event->start = $time -> created_at;
      $events[] = $Event;
    }
	?>
                    <div class="col-sm-6">
                        <div class="timetable">
                            
                            <div class="panel-body">
                                <?php echo Yii::$app->view->renderAjax('//events/index.php',['events' => $events]); ?>
                            
                        </div>
                    </div>
                </div>
					
					
					
					
					
					
					
					
					
					

                </div>
				
				
<?php
/*
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Classes */
/*
$this->title = "";
//$this->params['breadcrumbs'][] = ['label' => 'Classes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Classes'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Back', ['./classes?id='.$model->course_id], ['class' => 'btn btn-primary']) ?>
			<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
     */       ?>
        </div>
    </div>

    <div class="row">
<?php 
    /* $gridColumn = [
        [
            'attribute' => 'course.course_name',
            'label' => 'Course',
        ],
        'sem',
        'section',
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
            'attribute' => 'uni.university_name',
            'label' => 'University',
        ],
        'vertical',
        'course_name',
        'course_short_name',
        'course_batch',
        
    ];
    echo DetailView::widget([
        'model' => $model->course,
        'attributes' => $gridColumnCourse    ]);
   */ ?>
</div>
