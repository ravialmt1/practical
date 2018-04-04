<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wrapper">
    <?php

$mysqli = new mysqli("localhost", "root", "", "inurture");

/* check connection */
if ($mysqli->connect_errno) {
    echo "Connect failed";
    exit();
}

$query = "SELECT question FROM feedback_questions";
$i=0;
echo "<table border = '1'><form action='process.php' method='get'><input type='text' name='reg'>";
echo "<th>Question</th><th>Subject1</th><th>Subject2</th><th>Subject3</th><th>Subject4</th><th>Subject5</th><th>Subject6</th><th>Subject7</th>";
if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		
		$i++;
		$j=0;
		echo "<td width='60%'>".$row["question"]."</td>";
		while($j<7)
			
		{
			$j++;
        echo "<td><input type='radio' name='fb".$i.$j."'"."value='1'> 1<br />
		<input type='radio' name='fb".$i.$j."'"."value='2'> 2<br />
  <input type='radio' name='fb".$i.$j."'"."value='3'> 3<br />
  <input type='radio' name='fb".$i.$j."'"."value='4'> 4 </td>";
  
}
echo "</tr>";
}
}
echo "</table>";
echo "<input type='submit' value='Submit'>";
echo "</form>";

    /* free result set */
    $result->free();


/* close connection */
$mysqli->close();
?>

    <code><?= __FILE__ ?></code>
</div>