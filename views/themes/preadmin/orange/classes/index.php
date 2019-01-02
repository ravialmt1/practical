<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Url;

$this->title = 'Select What you want to do in the Class';
$this->params['breadcrumbs'][] = 'Classes';
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>

<div class="classes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	<?= Html::button('Create Class', ['value' => Url::to(['classes/create?id='.$id]), 'title' => 'Creating New Class', 'class' => 'showModalButton btn btn-success']); ?>
       
		<?= Html::a('Back to Courses', ['/course'], ['class' => 'btn btn-success']) ?>
    </p>
<?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
		[
            'class' => 'kartik\grid\ExpandRowColumn',
            'width' => '50px',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'detail' => function ($model, $key, $index, $column) {
                return Yii::$app->controller->renderPartial('_expand', ['model' => $model]);
            },
            'headerOptions' => ['class' => 'kartik-sheet-style'],
            'expandOneOnly' => true,
			//'expandIcon' => "Admin",
			'enableRowClick' => TRUE,
        ],
        [
                'attribute' => 'course_id',
                'label' => 'Course',
                'value' => function($model){                   
                    return $model->course->course_name;                   
                },
                
            ],
        'sem',
        'section',
		
        [
            'class' => 'yii\grid\ActionColumn',
			//'header'=>"Attendance | Announcement | Question Bank | Placement Event | Student Fees | Internal | External | Feedback",
			'headerOptions' => ['class' => 'text-center'],
			'contentOptions' => ['class' => 'text-center'],
            
			'template' => '{Attendance}',
			'buttons' => [
				'Attendance' => function($url, $model, $key) {     // render your custom button
				return Html::a('<li class="dropdown" style="list-style: none;">
                    <a href="profile.html" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin">
                        
							
                        <span>Admin</span><span class="glyphicon glyphicon-plus">
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="classstudents">Students</a></li>
						<li><a href="profile.html">Events</a></li>
						<li><a href="profile.html">Assignments</a></li>
						<li><a href="profile.html">Online MCQ Test</a></li>
						<li><a href="profile.html">Fees Collection</a></li>
                        <li><a href="edit-profile.html">Timetable</a></li>
                        <li><a href="settings.html">Attendance</a></li>
                        <li><a href="login.html">Examination</a></li>
						<li><a href="login.html">Feedback</a></li>
						<li><a href="login.html">Send Message</a></li>
                    </ul>
                </li>');
               //return Html::a('<span class="glyphicon glyphicon-plus"> &nbsp &nbsp &nbsp &nbsp </span> ', ['./classes?id='.$model->course_id], ['class' => 'btn btn-info btn-lg', 'data-pjax' => 0]);
                } ,
				]
			
			/*'template' => '{Attendance}{Announcement}{QuestionBank}{PlacementEvent}{StudentFees}{Internal}{External}{Feedback}',  // the default buttons + your custom button
            
			 'buttons' => [
				'Attendance' => function($url, $model, $key) {     // render your custom button
               return Html::a('<span class="glyphicon glyphicon-check"> &nbsp &nbsp &nbsp &nbsp </span> ', ['./classes?id='.$model->course_id], ['class' => 'btn btn-info btn-sm', 'data-pjax' => 0]);
                } ,
                'Announcement' => function($url, $model, $key) {     // render your custom button
               return Html::a('<span class="glyphicon glyphicon-bullhorn">&nbsp &nbsp &nbsp &nbsp </span>', ['./classes?id='.$model->course_id], ['class' => 'btn btn-success btn-sm', 'data-pjax' => 0]);
                } ,
				'QuestionBank' => function($url, $model, $key) {     // render your custom button
               return Html::a('<span class="glyphicon glyphicon-briefcase">&nbsp &nbsp &nbsp &nbsp </span>', ['site/index'], ['class' => 'btn btn-info btn-sm', 'data-pjax' => 0]);
                },
				'PlacementEvent' => function($url, $model, $key) {     // render your custom button
               return Html::a('<span class="glyphicon glyphicon-road">&nbsp &nbsp &nbsp &nbsp &nbsp</span>', ['site/index'], ['class' => 'btn btn-warning btn-sm', 'data-pjax' => 0]);
                },
				'StudentFees' => function($url, $model, $key) {     // render your custom button
               return Html::a('<span class="glyphicon glyphicon-usd">&nbsp &nbsp &nbsp', ['site/index'], ['class' => 'btn btn-default btn-sm', 'data-pjax' => 0]);
                },
				'Internal' => function($url, $model, $key) {     // render your custom button
               return Html::a('<span class="glyphicon glyphicon-calendar">&nbsp &nbsp </span>', ['site/index'], ['class' => 'btn btn-danger btn-sm', 'data-pjax' => 0]);
                },
				'External' => function($url, $model, $key) {     // render your custom button
               return Html::a('<span class="glyphicon glyphicon-calendar">&nbsp &nbsp</span>', ['site/index'], ['class' => 'btn btn-Warning btn-sm', 'data-pjax' => 0]);
                },
				'Feedback' => function($url, $model, $key) {     // render your custom button
               return Html::a('<span class="glyphicon glyphicon-hand-up">&nbsp &nbsp &nbsp </span>', ['site/index'], ['class' => 'btn btn-info btn-sm', 'data-pjax' => 0]);
                },
            ] */
        ],
    
        
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumn,
        'pjax' => false,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-classes']],
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
    ]); ?>

</div>
<?php $classes = $dataProvider->getModels();
								foreach($classes as $class){ ?>
<div class="col-md-6 col-sm-6 col-lg-4">
                        <div class="profile-widget profile-widget4">
                            <div class="profile-bg">
							
                                <h3 class="user-name m-t-0 m-b-0 text-ellipsis"><?= Html::a('Semester : '.$class->sem. ' || Section :' . $class->section , ['classview?id='.$class->id]) ?>  </h3>
                                <h5 class="text-muted">
								
								</h5>
                            </div>
                            <div class="profile-avatar">
                                <img alt="" src="assets/img/user-02.jpg">
                            </div>
                            <div class="user-analytics">
                                <div class="row">
                                    <div class="col-xs-4 border-right">
                                        <div class="analytics-desc">
                                            <h5 class="analytics-count">3,200</h5>
                                            <span class="analytics-title">STUDENTS</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 border-right">
                                        <div class="analytics-desc">
                                            <h5 class="analytics-count">13,000</h5>
                                            <span class="analytics-title">FEES DUE</span>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="analytics-desc">
                                            <h5 class="analytics-count">35</h5>
                                            <span class="analytics-title">ATTENDANCE DEFAULTERS</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php }
								 ?>