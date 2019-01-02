<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\helpers\Url;

$this->title = 'Students';
$this->params['breadcrumbs'][] = ['label' => 'Classes', 'url' => ['/classes?id='.$course_id]];;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>

<div class="classstudents-index">

    <h1><?= $course_name; ?></h1>

    <p>
        <?= Html::a('Create Students', ['create?id='.$classid], ['class' => 'btn btn-success']) ?>
		<?= Html::a('Import Students', ['importstudents?id='.$classid], ['class' => 'btn btn-success']) ?>
		<?= Html::a('Back to Classes', ['/classes?id='.$course_id], ['class' => 'btn btn-success']) ?>
    </p>
<?php 

    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        //'id',
        
        'student_name',
        'regno',
        
[
          'class' => 'yii\grid\CheckboxColumn', 'checkboxOptions' => function($model) {
                return ['value' => $model->id];
            },
      ],
    ]; 
    ?>
	
	<?=Html::beginForm(['subjects/stusubassign?sub_id='.$sub_id.'&class_id='.$classid],'post');?>
	
<?=Html::submitButton('Send', ['class' => 'btn btn-info','title' => 'Assigning Subject', 'class' => 'showModalButton btn btn-info']);?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-classstudents']],
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
    ]); 
	 
	
	?>
	
	<?= Html::endForm();?> 
	<?= Html::button('Assign Subjects to Students', ['value' => Url::to(['subjects/stusubassign?sub_id='.$sub_id.'&class_id=>'.$classid]), 'title' => 'Assigning Subject', 'class' => 'showModalButton btn btn-success']); ?>

</div>
