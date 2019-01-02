<html>

  <head>
 
  <script type="text/javascript">
var tableToExcel = (function() {
	-->Use this CDN for final version https://cdnjs.cloudflare.com/ajax/libs/TableExport/3.3.13/css/tableexport.css'
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name, filename) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    var link = document.createElement("a");
                    link.download = filename;
                    link.href = uri + base64(format(template, ctx));
                    link.click();
  }
})()
</script>
    <script>
      function printContent(el)
      {
         var restorepage = document.body.innerHTML;
         var printcontent = document.getElementById(el).innerHTML;
         document.body.innerHTML = printcontent;
         printcontent.print().print();
         document.body.innerHTML = restorepage;
     }
	

 </script>
	
  <?php
  /*
   <style>
   
   table {
        display: block;
        overflow-x: auto;
        white-space: wrap;
		width: 100%;
		cell-padding : 0px;
		table-layout:fixed;
		font-size: 10px;
    };
   th {
	max-width: 20px;
  text-align: center;
  font-size: 5px;
  cell-padding : 1px;
  vertical-align: middle;
}
 td {
	max-width: 20px;
  text-align: center;
  //font-size: 10px;
  cell-padding : 1px;
  vertical-align: middle;
}
</style>
*/
?>
  </head> 
<?php


  
  $script2 = "var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:x='urn:schemas-microsoft-com:office:excel' xmlns='http://www.w3.org/TR/REC-html40'><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri +  base64(format(template, ctx))
  }
})()";    
  $this->registerJs($script2, \yii\web\View::POS_END, 'my-options2');
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;
use yii\filters\AccessControl;


$this->title = "Class Result";
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="classresult-index">

    <h1><?= Html::encode($this->title) ?></h1>

 
<?php 
$filename = $course_name['course_short_name'].$sem['sem'] ;
echo "<div align='right'><button class='btn btn-primary btn-lg' onclick=printContent('div1')>Print Result Sheet</button> &nbsp  &nbsp  &nbsp  &nbsp";
?>
<button class='btn btn-success btn-lg' onclick= tableToExcel('dnd','aa','<?php echo str_replace(" - ","",$filename) ?>') >Export Result Sht</button></div>";
    <?php echo "<div class='table-responsive' id='div1'>";
	 
	 ?>
	 <h3><?=  "Course : ".$course_name['course_short_name']." &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ". " Semester : ". $sem['sem'] ; ?></h3>
	 
	 <div class="row">
                    <div class="col-md-4 col-sm-4 col-lg-2">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-success"><h5><br /><br /> 26 <br />Students</h5></span>
                            <div class="dash-widget-info">
                                
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-2">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-info"><h5><br /><br /> 22 <br />Pass</h5></span>
                            <div class="dash-widget-info">
                                
                            </div>
                        </div>
                    </div>
					
                    <div class="col-md-4 col-sm-4 col-lg-2">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-warning"> <h5><br /><br />4 <br />Fail</h5></span>
                            <div class="dash-widget-info">
							
                               
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-2">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-danger" align="center"><h5><br /><br />13 <br /> Distinction</h5></span>
                            <div class="dash-widget-info">
                                
                                
                            </div>
                        </div>
                    </div>
					 <div class="col-md-4 col-sm-4 col-lg-2">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-info"><h5><br /><br />13 <br />First Class</h5></span>
                            <div class="dash-widget-info">
                                
                               
                            </div>
                        </div>
                    </div>
					<div class="col-md-4 col-sm-4 col-lg-2">
                        <div class="dash-widget dash-widget5">
                            <span class="dash-widget-icon bg-success"><h5><br /><br />1 <br />Second Class</h5></span>
                            <div class="dash-widget-info">
                                
                               
                            </div>
                        </div>
                    </div>
					
                </div>
	 <?php
	 $header = "<th>Registration Number</th><th>Name</th>";
	 ?>
	
	<?php
	 echo "<div class='table-responsive'><table class='table' id='dnd', <caption><h1>Course : ".$course_name['course_name']." &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ". "<br /></h1><h2> Semester : ". $sem['sem']."</h2></caption><tr>";
	 foreach($subjects as $sub)
	 { 
		 foreach($sub as $sub1)
	 {
		 $header.="<th colspan='6'>".$sub1."</th>";
	 }
	 
	 }
	 echo $header;
	// echo "</tr><th>Internal</th><th>External</th><th>Total</th><th>credits</th><th>grade</th><th>Internal</th><th>External</th><th>Total</th><th>credits</th><th>grade</th><th>Internal</th><th>External</th><th>Total</th><th>credits</th><th>grade</th><th>Internal</th><th>External</th><th>Total</th><th>credits</th><th>grade</th><th>Internal</th><th>External</th><th>Total</th><th>credits</th><th>grade</th><th>Internal</th><th>External</th><th>Total</th><th>credits</th><th>grade</th><th>Internal</th><th>External</th><th>Total</th><th>credits</th><th>grade</th><th>Internal</th><th>External</th><th>Total</th><th>credits</th><th>grade</th><th>Internal</th><th>External</th><th>Total</th><th>credits</th><th>grade</th><th>Internal</th><th>External</th><th>Total</th><th>credits</th><th>grade</th><tr>";
	  echo "</tr><tr>";
	 foreach($resultsheet as $result){
		 //var_dump($result);
	 foreach($result as $res)
	 {
	 echo "<td>$res</td>";
	 }
	 echo "</tr><tr>";
	 }
	 echo "</table>";
	  echo "</div>";
    ?>
	<br />
    <h1>Subject Wise Analysis</h1>
	<?php
	 
	 echo "<table class='table table-hover'><tr><th rowspan ='2'>Subject</th><th colspan ='2' width ='150' >Outstanding </th><th rowspan = '20'> &nbsp &nbsp &nbsp &nbsp &nbsp </th><th colspan = '3' width ='150'>Distinction </th><th rowspan = '20'> &nbsp &nbsp &nbsp &nbsp &nbsp </th><th colspan ='3' width ='150'>First Class </th><th rowspan = '20'> &nbsp &nbsp &nbsp &nbsp &nbsp </th><th width ='150' colspan = '2'> Second Class </th><th rowspan = '20'> &nbsp &nbsp &nbsp &nbsp &nbsp </th><th width ='150' colspan ='2'> Pass </th><th rowspan = '20'> &nbsp &nbsp &nbsp &nbsp &nbsp </th><th width ='100' rowspan = '2'>Fail F</th><th rowspan = '20'> &nbsp &nbsp &nbsp &nbsp &nbsp </th><th width ='100' rowspan='2'>Absent AB</th></tr>";
	 echo "<tr><th> S++ </th> <th> S+ </th>  <th> S </th><th> A++ </th><th> A+</th><th>A</th><th>B+</th><th>B</th><th>C+</th><th>C</th><th>D+</th><th>D</th>";
	 $subject_grades = (array_chunk($grade_catogary,15));
	 foreach ($subject_grades as $subject_grade)
		{
			//var_dump($subject_grade);
			//echo "<br /><br />";
			echo "</tr><tr>";
			echo "<td>".$subject_grade['0']."</td>";
			echo "<td align='center'>".$subject_grade['1']."</td>";
			echo "<td align='center'>".$subject_grade['2']."</td>";
			//echo "<td> &nbsp &nbsp &nbsp &nbsp &nbsp </td>";
			echo "<td align='center'>".$subject_grade['3']."</td>";
			echo "<td align='center'>".$subject_grade['4']."</td>";
			echo "<td align='center'>".$subject_grade['5']."</td>";
			//echo "<td> &nbsp &nbsp &nbsp &nbsp &nbsp </td>";
			echo "<td align='center'>".$subject_grade['6']."</td>";
			echo "<td align='center'>".$subject_grade['7']."</td>";
			echo "<td align='center'>".$subject_grade['8']."</td>";
			//echo "<td> &nbsp &nbsp &nbsp &nbsp &nbsp </td>";
			echo "<td align='center'>".$subject_grade['9']."</td>";
			echo "<td align='center'>".$subject_grade['10']."</td>";
			//echo "<td> &nbsp &nbsp &nbsp &nbsp &nbsp </td>";
			echo "<td align='center'>".$subject_grade['11']."</td>";
			echo "<td align='center'>".$subject_grade['12']."</td>";
			echo "<td align='center'>".$subject_grade['13']."</td>";
			echo "<td align='center'>".$subject_grade['14']."</td>";
			 
		//var_dump($grade_catogary);
		}
	 //var_dump($subject_grades);
	 
	echo "</div></table>"
	 ?>
	 
	 
	 </div>
</div>

