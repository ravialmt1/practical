<head>

              <link href="../rotating_card/css/rotating-card.css" rel="stylesheet" />
              <link href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
        
</head>
<style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" type="text/javascript"></script>


<script type="text/javascript">
    $().ready(function(){
        $('[rel="tooltip"]').tooltip();

    });

    function rotateCard(btn){
        var $card = $(btn).closest('.card-container');
        console.log($card);
        if($card.hasClass('hover')){
            $card.removeClass('hover');
        } else {
            $card.addClass('hover');
        }
    }
</script>
table, th, td {
    border: 1px solid black;
}

th, td {
    padding: 10px;
}

<?php
include "print_card.php";
use kartik\detail\DetailView;
use yii\helpers\Html;
use yii\grid\GridView;
//use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Course */

//$this->title = $model->course_id;
//$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>
<?php

//var_dump ($dataProvider);
//echo "<table border ='10'>";
     foreach ($dataProvider->models as $model)
{
	print_card($model['semester'],$model['section'],10);
	/* echo "<table cellpadding='100'><tr>";
	echo "<td><img src='..\images\house-icon.png' height='42' width='42'></td>";
	echo "<td>Semester : ".$model['semester']. "</td></tr><tr>";
	echo "<td>Total Number of Students</td>";
	echo "<td>$studentsCount</td>";
	echo "</tr></table>";
	echo "<br />"; */
} 
?>

</div>
</div>
