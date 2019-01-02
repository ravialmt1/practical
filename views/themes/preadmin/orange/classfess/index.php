<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Class fees Collection Report';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="classfees-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php 
function my_money_format($num) 
{ 
$explrestunits = "";
$convertnum = "";
    if(strlen($num)>3){ 
            $lastthree = substr($num, strlen($num)-3, strlen($num)); 
            $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits 
            $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping. 

            $expunit = str_split($restunits, 2); 
            for($i=0; $i<sizeof($expunit); $i++){ 
                $explrestunits .= (string)$expunit[$i].","; // creates each of the 2's group and adds a comma to the end 
            }    

            $thecash = $explrestunits.$lastthree; 
    } else { 
           $thecash = $convertnum; 
    } 
    
    return $thecash; // writes the final format where $currency is the currency symbol. 
} 
?> 

    <p>
        <?= Html::a('Create Classfees', ['create?id='.$classid], ['class' => 'btn btn-success']) ?>
    </p>
	 <p>
        <?= Html::a('Back to Class', ['classes/index?id='.$course_id], ['class' => 'btn btn-success']) ?>
    </p>
	<p>
	<blockquote> No of Students: <?php echo $students; 
	$total_fees = $students*150000 ;
	$c = 101022;
	?>&nbsp&nbsp&nbsp||&nbsp&nbsp&nbsp
	 Fees per Student : 1,50,000/- &nbsp&nbsp&nbsp||&nbsp&nbsp&nbsp
	Total Fees : <?php echo my_money_format($total_fees); ?> &nbsp&nbsp&nbsp||&nbsp&nbsp&nbsp
	Total Fees Recieved : <?php echo my_money_format($classfees);
	$balance = $total_fees - $classfees ;
	?>&nbsp&nbsp&nbsp||&nbsp&nbsp&nbsp 
	Fees Pending : <?php echo my_money_format($balance); ?> </blockquote> </p>
<?php 
$index = 0;
$already_exists = array();
//var_dump($data);
//$result= array_count_values (array_count_values($data));
echo "<table border = '1' class ='table table-hover'><tr class ='success'><th>Student Name</th><th>Installment-1</th><th>Particulars</th><th>Installment -2</th><th>Particulars</th><th>Installment-3</th><th>Particulars</th><th>Installment-4</th><th>Particulars</th><th>Installment-5</th><th>Particulars</th>";
foreach($data as $data){
	array_push($already_exists,$data['student_name']);
	//while($result['student_name'])
		//var_dump($already_exists['0']);
//var_dump($result);
	
	$exists_test = array_count_values($already_exists);
	if($exists_test[$data['student_name']]==1){
		//echo $exists_test[$data['student_name']] . $data['student_name'];
		echo "</tr><tr class ='success'>";
		
	echo "<td>".$data['student_name']."</td>";
	}
	
	echo "<td>".$data['amount']."</td>";
	echo "<td>".$data['particulars']."</td>";
		
  // var_dump($classfees);
  
  }
	   
   

    ?>
    

</div>
