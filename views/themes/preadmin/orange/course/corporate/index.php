<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\widgets\pjax;

$this->title = 'Course';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?> @ corporate</h1>

    <p>
	<?= Html::button('Create Course', ['value' => Url::to(['course/create']), 'title' => 'Creating New Course', 'class' => 'showModalButton btn btn-success']); ?>

        
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
            'expandOneOnly' => true
        ],
        ['attribute' => 'course_id', 'visible' => false],
        /* [
                'attribute' => 'uni_id',
                'label' => 'University',
				
                'value' => function($model){                   
                    return $model->uni->university_name;                   
                },
                /* 'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\University::find()->asArray()->all(), 'uni_id', 'university_name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => false],
                ], 
                'filterInputOptions' => ['placeholder' => 'University', 'id' => 'grid--uni_id']
            ], */
       
        [
			'attribute'=>'course_name',
			'label' => 'Course Name',
			'value' => function($model){  
$str_arr = explode ("-", $model->course_batch); 
$course_duration = $str_arr['1']-$str_arr['0'];	
$curYear = date('Y'); 
if ($curYear-$str_arr['0'] == 0){
	$year = " |  First Year";
}	
elseif ($curYear-$str_arr['0'] == 1){
	$year = "  | Second Year";
}	
elseif ($curYear-$str_arr['0'] == 2){
	$year = "  | Third Year";
}	
else
$year = "will be set";	
                    return $model->course_name."        ".$year;   
			}					
			
			],
			[
			'attribute'=>'course_batch',
			'label' => 'Course Batch',
			'value' => function($model){  
$str_arr = explode ("-", $model->course_batch); 
$course_duration = $str_arr['1']-$str_arr['0'];	
$curYear = date('Y'); 
if ($curYear-$str_arr['0'] == 0){
	$year = " First Year";
}	
elseif ($curYear-$str_arr['0'] == 1){
	$year = " Second Year";
}	
elseif ($curYear-$str_arr['0'] == 2){
	$year = " Third Year";
}	
else
$year = "will be set";	
                    return $year; 
			}					
			
			],
        
        /* [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{Classes}{Coursematrix}{Event}{FeeStructure}{Examination}{Infrastructure}',  // the default buttons + your custom button
            'buttons' => [
                'Classes' => function($url, $model, $key) {     // render your custom button
               return Html::a('Classes ', ['./classes?id='.$model->course_id], ['class' => 'btn btn-success btn-sm', 'data-pjax' => 0]);
                } ,
				'Coursematrix' => function($url, $model, $key) {     // render your custom button
               return Html::a('Course Matrix', ['site/index'], ['class' => 'btn btn-info btn-sm', 'data-pjax' => 0]);
                },
				'Event' => function($url, $model, $key) {     // render your custom button
               return Html::a('Events', ['site/index'], ['class' => 'btn btn-warning btn-sm', 'data-pjax' => 0]);
                },
				'FeeStructure' => function($url, $model, $key) {     // render your custom button
               return Html::a('Fees Structure', ['site/index'], ['class' => 'btn btn-default btn-sm', 'data-pjax' => 0]);
                },
				'Infrastructure' => function($url, $model, $key) {     // render your custom button
               return Html::a('Infrastructure', ['site/index'], ['class' => 'btn btn-info btn-sm', 'data-pjax' => 0]);
                },
				'Examination' => function($url, $model, $key) {     // render your custom button
               return Html::a('Examination', ['site/index'], ['class' => 'btn btn-danger btn-sm', 'data-pjax' => 0]);
                },
            ]
        ], */
    ]; 
    ?>
	 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
		//'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => false,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-course']],
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
