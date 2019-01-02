<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Class';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subjects-index">

    
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
	echo "<h2 align='center'>".$course_name.$sem."</h2>";
	//var_dump($dataProvider);
	?>

    

    <?= GridView::widget([
	
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'sub_name',
            //'university_id',
            
            'sem',
			'universityName',
			'facultyName',
			//'courseName',

            [
          'class' => 'yii\grid\ActionColumn',
          'header' => 'Actions',
          'headerOptions' => ['style' => 'color:#337ab7'],
          'template' => '{view}{update}',
          'buttons' => [
            'view' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                            'title' => Yii::t('app', 'lead-view'),
                ]);
            },

            'update' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'lead-update'),
                ]);
            },
            'delete' => function ($url, $model) {
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'lead-delete'),
                ]);
            }

          ],
          'urlCreator' => function ($action, $model, $key, $index) {
            if ($action === 'view') {
                $url ='view?id='.$model->sub_id;
                return $url;
            }

            if ($action === 'update') {
                $url ='update?id='.$model->sub_id.'&sem='.$model->sem.'&uni_id='.$model->university_id;
                return $url;
            }
            if ($action === 'delete') {
                $url ='delete?id='.$model->sub_id;
                return $url;
            }

          }
          ],
		
    ]]); 
	$session = Yii::$app->session;
	?>
	<?= Html::a("Add Subject $session[sem]", ['/subjects/create'], ['class'=>'btn btn-primary grid-button']) ?>
	<?= Html::a('Add Student', ['/students/create?uni_id='.$uni_id.'&student_clas='. $sem.'&course='. $course_id,], ['class'=>'btn btn-primary grid-button']) ?>
</div>
