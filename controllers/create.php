<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

$this->title =  'Give Your Valuable Feedback For';
$this->params['breadcrumbs'][] = ['label' => 'Feedbacks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form3', [
        'model' => $model,
		'subject' => $subject,
		'faculty' => $faculty,
		'university' => $university,
		//'key' => $key,
		//'subject_id' =>$subject_id,
		    ]) ?>

</div>
