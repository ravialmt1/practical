<?php
use yii\helpers\Html;
use yii\app\models\Course;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
$this->title = 'Verticals';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$verticals = \yii\helpers\ArrayHelper::map(\app\models\Course::find()->select(['vertical'])->distinct()->all(),'vertical', 'vertical');
//var_dump($verticals);

	//echo $vertical."<br />";

 ?>
<div class="site-vertical">
<div class="col-lg-12">
                        <div class="card-box">
                            <div class="card-block">
                                <h4 class="card-title">Verticals</h4>
                                <table class="table table-hover">
								
	
                                    <thead>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Vertical</th>
                                        </tr>    
                                        
                                    </thead>
									<?php 
									$id = 0;
									foreach($verticals as $vertical )
								
								{
									 
									$id++; ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $id ?></td>
                                            <td><?= $vertical ?></td>
                                            
                                        </tr>
                                        
                                    </tbody>
								<?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
    
	
   
</div>