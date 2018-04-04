<html>
<head>
  <style>
  #separator {
width:100%;
height:31px;
background-color:#ffffff;
margin-top:6px;
float:left;
}
 h1.elegantshadow {
  font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
  font-size: 20px;
  padding: 1px 1px;
  text-align: center;
  text-transform: uppercase;
  text-rendering: optimizeLegibility;
  
  
    color: #131313;
    background-color: #ffffff;
    letter-spacing: .15em;
    text-shadow: 
      1px -1px 0 #767676, 
      -1px 2px 1px #737272, 
      -2px 4px 1px #767474, 
      -3px 6px 1px #787777, 
      -4px 8px 1px #7b7a7a, 
      -5px 10px 1px #7f7d7d, 
      -6px 12px 1px #828181, 
      -7px 14px 1px #868585, 
      -8px 16px 1px #8b8a89, 
      -9px 18px 1px #8f8e8d, 
      -10px 20px 1px #949392, 
      -11px 22px 1px #999897, 
      -12px 24px 1px #9e9c9c, 
      -13px 26px 1px #a3a1a1, 
      -14px 28px 1px #a8a6a6, 
      -15px 30px 1px #adabab, 
      -16px 32px 1px #b2b1b0, 
      -17px 34px 1px #b7b6b5, 
      -18px 36px 1px #bcbbba, 
      -19px 38px 1px #c1bfbf, 
      -20px 40px 1px #c6c4c4, 
      -21px 42px 1px #cbc9c8, 
      -22px 44px 1px #cfcdcd, 
      -23px 46px 1px #d4d2d1, 
      -24px 48px 1px #d8d6d5, 
      -25px 50px 1px #dbdad9, 
      -26px 52px 1px #dfdddc, 
      -27px 54px 1px #e2e0df, 
      -28px 56px 1px #e4e3e2;
  }
  h1.deepshadow {
	  font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
  font-size: 20px;
  padding: 1px 1px;
  text-align: center;
  text-transform: uppercase;
  text-rendering: optimizeLegibility;
    color: #e0dfdc;
    background-color: #333;
    letter-spacing: .1em;
    text-shadow: 
      0 -1px 0 #fff, 
      0 1px 0 #2e2e2e, 
      0 2px 0 #2c2c2c, 
      0 3px 0 #2a2a2a, 
      0 4px 0 #282828, 
      0 5px 0 #262626, 
      0 6px 0 #242424, 
      0 7px 0 #222, 
      0 8px 0 #202020, 
      0 9px 0 #1e1e1e, 
      0 10px 0 #1c1c1c, 
      0 11px 0 #1a1a1a, 
      0 12px 0 #181818, 
      0 13px 0 #161616, 
      0 14px 0 #141414, 
      0 15px 0 #121212, 
      0 22px 30px rgba(0, 0, 0, 0.9);
  }
  h1.insetshadow {
	  font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
  font-size: 20px;
  padding: 1px 1px;
  text-align: center;
  text-transform: uppercase;
  text-rendering: optimizeLegibility;
    color: #202020;
    background-color: #2d2d2d;
    letter-spacing: .1em;
    text-shadow: 
      -1px -1px 1px #111, 
      2px 2px 1px #363636;
  }
  h1.retroshadow {
	  font-family: "Avant Garde", Avantgarde, "Century Gothic", CenturyGothic, "AppleGothic", sans-serif;
  font-size: 20px;
  padding: 1px 1px;
  text-align: center;
  text-transform: uppercase;
  text-rendering: optimizeLegibility;
    color: #2c2c2c;
    background-color: #d5d5d5;
    letter-spacing: .05em;
    text-shadow: 
      4px 4px 0px #d5d5d5, 
      7px 7px 0px rgba(0, 0, 0, 0.2);
  }
}
 

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
li {
    display: inline;
}


</style>  
  
  </head>
<?php
use  yii\web\Session;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\modal;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use frontend\models\Subject;
use frontend\models\SubjectSearch;
use yii\db\Query;
$connection = \Yii::$app->db;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ClasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Class';
$this->params['breadcrumbs'][] = $this->title;
$i=0;
$userId=Yii::$app->user->id;
$session = Yii::$app->session;
unset($session['clas']);
unset($session['section']);



?>
<div class="container-fluid">
<div class="row">

<div class="row">
<?php
/*
if(Yii::$app->user->can('create_class')){
echo Html::a('Create Class', ['create'], ['class' => 'btn btn-success']);
echo "<br /><br />";
}
*/
 ?>
<?php foreach( $dataProvider->models as $myModel): ?>

                <div class="col-md-6">
			<div class="jumbotron well">
				<h2>
					<h1 class='retroshadow'>Class:<?php echo strtoupper($myModel->clas_name)."</h1>"; ?>
					<h1 class='retroshadow'>Section : <?php echo strtoupper($myModel->section)."</h1>";?>
				</h2>
				 <div id="separator"></div>
			
			<div class="btn-group btn-group-md">
			
			<button type="button" class="btn btn-default">
				<?= Html::a('Students <em class="glyphicon glyphicon-plus"></em> ', ['students-details/index'], ['data' =>['method'=>'post','params'=>['section' => $myModel->section,'clas' => $myModel->id ]]]) ?>
				</button>	
				 <button type="button" class="btn btn-default">
				<?= Html::a('Tests <em class="glyphicon glyphicon-question-sign"></em> ', ['test/index'], ['data' =>['method'=>'post','params'=>['section' => $myModel->section,'clas' => $myModel->id ]]]) ?>
					</button>
					
				<button type="button" class="btn btn-default">
				<?= Html::a('Subjects <em class="glyphicon glyphicon-book"></em> ', ['subject/index'], ['data' =>['method'=>'post','params'=>['section' => $myModel->section,'clas' => $myModel->id ]]]) ?>
				</button>
				
				<button type="button" class="btn btn-default">
				<?= Html::a('Feedback <em class="glyphicon glyphicon-comment"></em> ', ['subject/index'], ['data' =>['method'=>'post','params'=>['section' => $myModel->section,'clas' => $myModel->id ]]]) ?>
				</button>
			</div>
				          <div id="separator"></div>
						  

                                                              					
                                   
									
                        
						
						<?php
						$i++;
						$sql = "SELECT `id`,`subject_name` FROM `subject` WHERE `clas`='$myModel->id' and `section`='$myModel->section'";
						//echo $sql;
$sub = Subject::findBySql($sql)->all();
echo "<table class='table'>";
echo "<tr><td>Subjects</td><td colspan=3 align ='center'>Action</td></tr>";
foreach($sub as $subj)
{
echo "<td align = 'left'>";
echo strtoupper ($subj->subject_name)."</td>";
$url = ['attendance/create','section' => $myModel->section,'clas' =>$myModel->id, 'uid' => $userId, 'subc' => $subj->id];
//$value="Url::to(['attendance/create','section' => $myModel->section,'clas' => $myModel->id, 'uid' => $userId, 'subc' => $subj->id])";
echo "<td><a href=". Url::to(['attendance/create','section' => $myModel->section,'clas' => $myModel->id, 'uid' => $userId, 'subc' => $subj->id,]). 
 "><button type='button' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-edit'></span></button></a></td>";

?>

<?php 
/*=Html::button('<span class="glyphicon glyphicon-edit"></span>',['value' =>Url::to(['attendance/create','section' => $myModel->section,'clas' => $myModel->id, 'uid' => $userId, 'subc' => $subj->id]),'class' => 'btn btn-default','title'=>'Enter Attendance!','id'=>'modalButton'.$i]) 
*/
?>
<?php
echo "</td>";
echo "<td><a href='notes/create' title='NOTES!'><button type='button' class='btn btn-info btn-xs'><span class='glyphicon glyphicon-folder-open'></span>    </button></a></td>";
echo "<td><a href='assignment/index' title='HOMEWORK'><button type='button' class='btn btn-success btn-xs'><span class='glyphicon glyphicon-pencil'></span>    </button></a></td>";
echo "<td><a href='exam/index' title='Online Exam'><button type='button' class='btn btn-warning btn-xs'><span class='glyphicon glyphicon-list-alt'></span>    </button></a></td>";		
echo "<td><a href='questions/index' title='Question Bank'><button type='button' class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-camera'></span>    </button></a></td>";	
echo "<td><a href='report/index' title='Class Report'><button type='button' class='btn btn-default btn-xs'><span class='glyphicon glyphicon-print'></span>    </button></a></td>";	
echo "</tr>";
}
 echo "</table></div>";

?>
          
                        
						
						<?php 
						
						$model= new Subject();
						?>
						
<br />				
<span class="pull-left">					
<div class="subject-form">




<?php 

Modal::Begin(
['header'=>'Subject',
'id' => 'modal',
'size' => 'modal-sm',
]);
echo "<div id='modalContent'></div>";
Modal::End();
?>

    
	
	
						
						
						
				</div>
								
				</div>

				
				
				
				<?php endforeach; ?>

</div>

</div>
