<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Clas */

$this->title = 'Teacher, Subject, Student Mapping to Class';
$this->params['breadcrumbs'][] = ['label' => 'Clas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clas-create">

    
	
	<?php foreach( $dataProvider->models as $myModel): ?>

                <div class="col-md-6">
			<div class="jumbotron well">
				<h2>
					<h2>Class:<?php echo strtoupper($myModel->clas_name)."</h2>"; ?>
					<h2>Section : <?php echo strtoupper($myModel->section)."</h2>";?>
				</h2>
				 <div id="separator"></div>
			
			<div class="btn-group btn-group-md">
			
			<button type="button" class="btn btn-default">
				<?= Html::a('Students <em class="glyphicon glyphicon-plus"></em> ', ['students-details/index'], ['data' =>['method'=>'post','params'=>['section' => $myModel->section,'clas' => $myModel->id ]]]) ?>
				</button>	
				 <button type="button" class="btn btn-default">
				<?= Html::a('Tests <em class="glyphicon glyphicon-question-sign"></em> ', ['tests/index'], ['data' =>['method'=>'post','params'=>['section' => $myModel->section,'clas' => $myModel->id ]]]) ?>
					</button>
					
				<button type="button" class="btn btn-default">
				<?= Html::a('Subjects <em class="glyphicon glyphicon-book"></em> ', ['subject/index'], ['data' =>['method'=>'post','params'=>['section' => $myModel->section,'clas' => $myModel->id ]]]) ?>
				</button>
				
				<button type="button" class="btn btn-default">
				<?= Html::a('Feedback <em class="glyphicon glyphicon-comment"></em> ', ['subject/index'], ['data' =>['method'=>'post','params'=>['section' => $myModel->section,'clas' => $myModel->id ]]]) ?>
				</button>
			</div>
				          <div id="separator"></div></div></div>

<?php endforeach; ?>
    

</div>
</div>
</div>
