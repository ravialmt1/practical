<div class="form-group" id="add-students-academic">
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
    'formName' => 'StudentsAcademic',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'class10_marks' => ['type' => TabularForm::INPUT_TEXT],
        'class10_board' => ['type' => TabularForm::INPUT_TEXT],
        'class12_marks' => ['type' => TabularForm::INPUT_TEXT],
        'class12_board' => ['type' => TabularForm::INPUT_TEXT],
        'class12_stream' => ['type' => TabularForm::INPUT_TEXT],
        'ug_perc' => ['type' => TabularForm::INPUT_TEXT],
        'ug_stream' => ['type' => TabularForm::INPUT_TEXT],
        'ug_university' => ['type' => TabularForm::INPUT_TEXT],
        'sem1_perc' => ['type' => TabularForm::INPUT_TEXT],
        'sem2_perc' => ['type' => TabularForm::INPUT_TEXT],
        'sem3_perc' => ['type' => TabularForm::INPUT_TEXT],
        'sem4_perc' => ['type' => TabularForm::INPUT_TEXT],
        'sem5_perc' => ['type' => TabularForm::INPUT_TEXT],
        'sem6_perc' => ['type' => TabularForm::INPUT_TEXT],
        'sem7_perc' => ['type' => TabularForm::INPUT_TEXT],
        'sem8_perc' => ['type' => TabularForm::INPUT_TEXT],
        'sem9_perc' => ['type' => TabularForm::INPUT_TEXT],
        'sem10_perc' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowStudentsAcademic(' . $key . '); return false;', 'id' => 'students-academic-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Students Academic', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowStudentsAcademic()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

