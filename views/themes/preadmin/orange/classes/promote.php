<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Classes */

$this->title = "";
//$this->params['breadcrumbs'][] = ['label' => 'Classes', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="classes-view">

    <div class="row">
        <div class="col-sm-12">
            <h2><?= 'Promote Students'.' '. Html::encode($this->title) ?></h2>
        </div>
        
		
		<?php $course_id = $model->course_id; 
		$sem = $model -> sem; 
		$section = $model -> section;
		?>
		
            Create new class with course Id as  as the same course id <?= $course_id ?><br /> and sem as 
			Sem+1  like <?= $sem ?> +1 <br />
			and section as same section <?= $section ?> <br />
			<p> INSERT INTO `classes`(`id`, `course_id`, `sem`, `section`) VALUES ('',$course_id,$sem+1,$section) //id is autoincrement</p>
			view will be same as attendence view with only promote checkbox<br />
			option will be given to select all and then deselect one by one <br />
			<p><br />
			foreach($regnos as $regno)
			{
				INSERT INTO `class_students`(`id`, `class_id`, `student_name`, `regno`) VALUES ('',new class id,student_name,regno)<br />
			DELETE FROM `class_students` WHERE regno ='regno' && class_id = "";
			}
			</p><br />
				copy checked students to the new class<br /> and delete from the old class and the un checked students will stay in old class
            
        
    </div>
	
</div>

   
