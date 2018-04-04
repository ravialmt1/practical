<?php
use kartik\grid\GridView;
use yii\helpers\Html;
//use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ClasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Class';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clas-index">
<?php $id=Yii::$app->user->id;
echo $id; ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);

	?>

    <p>
        <?= Html::a('Create Clas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
	  'id' => 'kv-grid-demo',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'containerOptions'=>['style'=>'overflow: auto'], // only set when $responsive = false
    'headerRowOptions'=>['class'=>'kartik-sheet-style'],
    'filterRowOptions'=>['class'=>'kartik-sheet-style'],
    'pjax'=>true, // pjax is set to always true for this demo
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'clas_id',
            'teacher_id',
            'clas_name',

			//['class' => 'yii\grid\ActionColumn'],
			['class' => 'kartik\grid\CheckboxColumn'],
			
        ],
		'toolbar'=> [
       
        '{export}',
        '{toggleData}',
    ],
    // set export properties
    'export'=>[
        'fontAwesome'=>true
    ],
	 
    'panel' => [
        'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> Enter Attendence</h3>',
        'type'=>'success',
        
        'footer'=>false
    ],
    'persistResize'=>false,
    
    ]); ?>
	<button type="button" id="MyButton" class="btn btn-primary" onclick="var keys = $(&quot;#kv-grid-demo&quot;).yiiGridView(&quot;getSelectedRows&quot;).length; krajeeDialog.alert(keys > 0 ? &quot;Downloaded &quot; + keys + &quot; selected &quot; + (keys === 1 ? &quot;book&quot; : &quot;books&quot;) + &quot; to your account.&quot; : &quot;No books selected for download.&quot;);"><i class="glyphicon glyphicon-download-alt"></i> Download Selected</button>
	
	<button type="button" id="MyButton" class="btn btn-primary" onclick="var keys = $(&quot;#kv-grid-demo&quot;).yiiGridView(&quot;getSelectedRows&quot;); 
		krajeeDialog.alert(keys.length > 0 ? &quot;Downloaded &quot; + keys + &quot; selected &quot; + (keys === 1 ? &quot;book&quot; : &quot;books&quot;) + &quot; to your account.&quot; : &quot;No books selected for download.&quot;);" ><i class="glyphicon glyphicon-download-alt"></i> Try</button>
</div>
<script>
  $(document).ready(function(){
    $('#MyButton').click(function(){

       var keys = $('#kv-grid-demo').yiiGridView('getSelectedRows');
        $.post({
           url: 'myController/myAction', 
           dataType: 'json',
           data: {keylist: keys}

        });
    });
  });
</script>