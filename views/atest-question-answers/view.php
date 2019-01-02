<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\AtestQuestionAnswers */

$this->title = $model->atest_question_answer_id;
$this->params['breadcrumbs'][] = ['label' => 'Atest Question Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atest-question-answers-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Atest Question Answers'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->atest_question_answer_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->atest_question_answer_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'atest_question_answer_id',
        [
            'attribute' => 'atestQuestion.atest_question_id',
            'label' => 'Atest Question',
        ],
        'atest_question_answer',
        'atest_question_answer_correct',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerAtestParticipantAnswers->totalCount){
    $gridColumnAtestParticipantAnswers = [
        ['class' => 'yii\grid\SerialColumn'],
            'atest_participant_answers_id',
            [
                'attribute' => 'atest.atest_id',
                'label' => 'Atest'
            ],
            [
                'attribute' => 'atestQuestion.atest_question_id',
                'label' => 'Atest Question'
            ],
            [
                'attribute' => 'atestParticipants.atest_participant_id',
                'label' => 'Atest Participants'
            ],
                        'atest_question_time_start',
            'atest_question_time_end',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerAtestParticipantAnswers,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-atest-participant-answers']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Atest Participant Answers'),
        ],
        'export' => false,
        'columns' => $gridColumnAtestParticipantAnswers
    ]);
}
?>

    </div>
    <div class="row">
        <h4>AtestQuestions<?= ' '. Html::encode($this->title) ?></h4>
    </div>
    <?php 
    $gridColumnAtestQuestions = [
        'atest_id',
        'atest_question',
        'atest_question_difficulty',
        'atest_question_multianswer',
    ];
    echo DetailView::widget([
        'model' => $model->atestQuestion,
        'attributes' => $gridColumnAtestQuestions    ]);
    ?>
</div>
