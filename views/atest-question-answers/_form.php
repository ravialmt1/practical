<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AtestQuestionAnswers */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'AtestParticipantAnswers', 
        'relID' => 'atest-participant-answers', 
        'value' => \yii\helpers\Json::encode($model->atestParticipantAnswers),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="atest-question-answers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'atest_question_answer_id')->textInput(['placeholder' => 'Atest Question Answer']) ?>

    <?= $form->field($model, 'atest_question_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\AtestQuestions::find()->orderBy('atest_question_id')->asArray()->all(), 'atest_question_id', 'atest_question_id'),
        'options' => ['placeholder' => 'Choose Atest questions'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'atest_question_answer')->textInput(['maxlength' => true, 'placeholder' => 'Atest Question Answer']) ?>

    <?= $form->field($model, 'atest_question_answer_correct')->textInput(['maxlength' => true, 'placeholder' => 'Atest Question Answer Correct']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('AtestParticipantAnswers'),
            'content' => $this->render('_formAtestParticipantAnswers', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->atestParticipantAnswers),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
