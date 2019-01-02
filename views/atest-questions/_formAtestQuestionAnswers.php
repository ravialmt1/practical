<div class="form-group" id="add-atest-question-answers">
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
    'formName' => 'AtestQuestionAnswers',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'atest_question_answer_id' => ['type' => TabularForm::INPUT_HIDDEN],
        'atest_question_answer' => ['type' => TabularForm::INPUT_TEXT],
        'atest_question_answer_correct' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowAtestQuestionAnswers(' . $key . '); return false;', 'id' => 'atest-question-answers-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Atest Question Answers', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowAtestQuestionAnswers()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

