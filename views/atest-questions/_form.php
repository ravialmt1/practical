<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AtestQuestions */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'AtestParticipantAnswers', 
        'relID' => 'atest-participant-answers', 
        'value' => \yii\helpers\Json::encode($model->atestParticipantAnswers),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'AtestQuestionAnswers', 
        'relID' => 'atest-question-answers', 
        'value' => \yii\helpers\Json::encode($model->atestQuestionAnswers),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="atest-questions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'atest_question_id')->textInput(['placeholder' => 'Atest Question']) ?>

    <?= $form->field($model, 'atest_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Atest::find()->orderBy('atest_id')->asArray()->all(), 'atest_id', 'atest_id'),
        'options' => ['placeholder' => 'Choose Atest'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'atest_question')->textInput(['maxlength' => true, 'placeholder' => 'Atest Question']) ?>

    <?= $form->field($model, 'atest_question_difficulty')->textInput(['maxlength' => true, 'placeholder' => 'Atest Question Difficulty']) ?>

    <?= $form->field($model, 'atest_question_multianswer')->checkbox() ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('AtestParticipantAnswers'),
            'content' => $this->render('_formAtestParticipantAnswers', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->atestParticipantAnswers),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('AtestQuestionAnswers'),
            'content' => $this->render('_formAtestQuestionAnswers', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->atestQuestionAnswers),
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
