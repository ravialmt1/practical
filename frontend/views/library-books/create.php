<style>
ul#menu li {
    display:inline;
}
</style>
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\LibraryBooks */

$this->title = 'Create Library Books';
$this->params['breadcrumbs'][] = ['label' => 'Library Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div><ul id="menu">
<li><?= Html::a('Create Book Category', ['/library-book-catogary/create'], ['class'=>'btn btn-primary']) ?></li>
<li><?= Html::a('Create Book Cupboard', ['/library-book-cupboard/create'], ['class'=>'btn btn-primary']) ?></li>
<li><?= Html::a('Create Library Book Cupboard Shelf', ['/library-cupboard-shelf/create'], ['class'=>'btn btn-primary']) ?></li>
</li></ul>
</div>


    
    <?= $this->render('_form', [
        'model' => $model,
		'lib_category1' => $lib_category1,
		'lib_cupboard1' => $lib_cupboard1,
		'lib_shelf1' => $lib_shelf1,
    ]) ?>


