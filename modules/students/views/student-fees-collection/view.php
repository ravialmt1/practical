<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\students\models\StudentFeesCollection */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Student Fees Collections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-fees-collection-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'student_id',
            'amount',
            'payment_type',
            'cheque_no',
            'bank_name',
            'bank_branch',
            'created_at',
            'updated_at',
            'description',
        ],
    ]) ?>

</div>
