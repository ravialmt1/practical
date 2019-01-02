<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

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

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form','layout' => 'horizontal',]); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'atest_question_id')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'atest_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Atest::find()->orderBy('atest_id')->asArray()->all(), 'atest_id', 'atest_name'),
        'options' => ['placeholder' => 'Choose a Test'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'atest_question')->textInput(['maxlength' => true, 'placeholder' => 'Question']) ?>

    <?= $form->field($model, 'atest_question_difficulty')->textInput(['maxlength' => true, 'placeholder' => 'Question Difficulty']) ?>

    <?= $form->field($model, 'atest_question_multianswer')->checkbox() ?>

   
	   
	   <div class ="row">
	   <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be added (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $modelsAnswers[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'atest_question_answer',
            'atest_question_answer_correct',
           
        ],
    ]); ?>
<div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <i class="glyphicon glyphicon-envelope"></i> Answers
                <button type="button" class="add-item btn btn-success btn-sm pull-right"><i class="glyphicon glyphicon-plus"></i> Add</button>
            </h4>
        </div>
        <div class="panel-body">
            <div class="container-items"><!-- widgetBody -->
            <?php foreach ($modelsAnswers as $i => $modelsAnswers): ?>
                <div class="item panel panel-default"><!-- widgetItem -->
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Answer</h3>
                        <div class="pull-right">
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (! $modelsAnswers->isNewRecord) {
								
                                echo Html::activeHiddenInput($modelsAnswers, "[{$i}]atest_question_id");
                            }
                        ?>
                       
                        <div class="row">
						
                            <div class="col-sm-6">
							 <?= $form->field($modelsAnswers, "[{$i}]atest_question_answer_id")->hiddenInput()->label(false) ?>
                                <?= $form->field($modelsAnswers, "[{$i}]atest_question_answer")->textInput(['maxlength' => true]) ?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($modelsAnswers, "[{$i}]atest_question_answer_correct")->checkbox() ?>
                            </div>
                        </div><!-- .row -->
                        
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
			<?php DynamicFormWidget::end(); ?>
        </div>
    </div><!-- .panel -->	  
	  
	   
	   
	   
    <div class="form-group">
        <?= Html::submitButton($modelsAnswers->isNewRecord ? 'Create' : 'Update', ['class' => $modelsAnswers->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
