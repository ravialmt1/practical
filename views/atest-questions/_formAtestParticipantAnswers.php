<div class="form-group" id="add-atest-participant-answers">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'AtestParticipantAnswers',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'atest_participant_answers_id' => ['type' => TabularForm::INPUT_HIDDEN],
        'atest_id' => [
            'label' => 'Atest',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Atest::find()->orderBy('atest_id')->asArray()->all(), 'atest_id', 'atest_id'),
                'options' => ['placeholder' => 'Choose Atest'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'atest_participants_id' => [
            'label' => 'Atest participants',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\AtestParticipants::find()->orderBy('atest_participant_id')->asArray()->all(), 'atest_participant_id', 'atest_participant_id'),
                'options' => ['placeholder' => 'Choose Atest participants'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'atest_question_answer_id' => [
            'label' => 'Atest question answers',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\AtestQuestionAnswers::find()->orderBy('atest_question_answer_id')->asArray()->all(), 'atest_question_answer_id', 'atest_question_answer_id'),
                'options' => ['placeholder' => 'Choose Atest question answers'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'atest_question_time_start' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Atest Question Time Start',
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'atest_question_time_end' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\datecontrol\DateControl::classname(),
            'options' => [
                'type' => \kartik\datecontrol\DateControl::FORMAT_DATETIME,
                'saveFormat' => 'php:Y-m-d H:i:s',
                'ajaxConversion' => true,
                'options' => [
                    'pluginOptions' => [
                        'placeholder' => 'Choose Atest Question Time End',
                        'autoclose' => true,
                    ]
                ],
            ]
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowAtestParticipantAnswers(' . $key . '); return false;', 'id' => 'atest-participant-answers-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Atest Participant Answers', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowAtestParticipantAnswers()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

