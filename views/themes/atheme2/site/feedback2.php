<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Feedback';
$this->params['breadcrumbs'][] = $this->title;
?>
<p>
<?php

$mysqli = new mysqli("localhost", "root", "", "inurture");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT question FROM feedback_questions";
$i=0;
echo "<table border = '0'>";
if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
		$i++;
        echo "<tr><td width='60%'>".$row["question"]."</td><td><input type='radio' name='fb".$i."'"."value='4'> Best</td>
  <td><input type='radio' name='fb".$i."'"."value='4'> Better</td>
  <td><input type='radio' name='fb".$i."'"."value='4'>Need Improvement </td> 
  </tr>";
    }

    /* free result set */
    $result->free();
}

/* close connection */
$mysqli->close();
?>
</p>