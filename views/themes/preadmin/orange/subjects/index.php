<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use app\models\Subjectelectivemap;


$this->title = 'Subjects';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="subjects-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
	<?= Html::button('Create Subjects', ['value' => Url::to(['subjects/create?id='.$id]), 'title' => 'Creating New Subject', 'class' => 'showModalButton btn btn-success']); ?>
      
		
    </p>
<?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        /* [
                'attribute' => 'university_id',
                'label' => 'University',
                'value' => function($model){                   
                    return $model->university->university_name;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\University::find()->asArray()->all(), 'uni_id', 'uni_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'University', 'id' => 'grid--university_id']
            ], */
       [
	   'attribute' => 'elective_group', 
            'width' => '310px',
            'value' => function ($model, $key, $index, $widget) { 
                return $model->elective->elective_group;
            },
            'filterType' => GridView::FILTER_SELECT2,
            'filter' => ArrayHelper::map(Subjectelectivemap::find()->orderBy('elective_group')->asArray()->all(), 'elective_group', 'elective_group'), 
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Any supplier'],
            'group' => true,  // enable grouping,
            'groupedRow' => true,                    // move grouped column to a single grouped row
            'groupOddCssClass' => 'kv-grouped-row',  // configure odd group cell css class
            'groupEvenCssClass' => 'kv-grouped-row', // configure even group cell css class
	   ],
	   
	   [
                'attribute' => 'course_id',
                'label' => 'Course',
                'value' => function($model){                   
                    return $model->course->course_name;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->asArray()->all(), 'course_id', 'course_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Course', 'id' => 'grid--course_id']
            ],
        'sem',
        'sub_name',
       [
            'header' => 'Assign Students',
            'content' => function($model) {
				
				// just remove the showModalButton to enable seelect all feature. The result will not be in modal instead it will be on seperate webpage
				
               return Html::button('Assign Subjects to Students', ['value' => Url::to(['subjects/stusubassign?sub_id='.$model->id.'&class_id='.$_GET['id']]), 'title' => 'Assigning Subject', 'class' => 'showModalButton btn btn-success']);
        
            }           
],
		        [
            'header' => 'Assign Faculty',
            'content' => function($model) {
				return Html::button('Assign Faculty', ['value' => Url::to(['subjects/assign?id='.$model->id]), 'title' => 'Assign faculty to the Subject', 'class' => 'showModalButton btn btn-success']); 
                 
        
            }           
],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-subjects']],
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
