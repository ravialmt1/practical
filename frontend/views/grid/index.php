<?php
/* @var $this yii\web\View */
?>
<h1>grid/index</h1>

<p>
<?php
use kartik\grid\GridView;
 
// Generate a bootstrap responsive striped table with row highlighted on hover
echo GridView::widget([
    'dataProvider'=> $dataProvider,
    'filterModel' => $searchModel,
    'columns' => $gridColumns,
    'responsive'=>true,
    'hover'=>true
]);?>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>
