<div class="form-group" id="add-students-personal">
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
    'formName' => 'StudentsPersonal',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'laptop' => ['type' => TabularForm::INPUT_TEXT],
        'smart_phone' => ['type' => TabularForm::INPUT_TEXT],
        'Address' => ['type' => TabularForm::INPUT_TEXTAREA],
        'city' => ['type' => TabularForm::INPUT_TEXT],
        'dob' => ['type' => TabularForm::INPUT_TEXT],
        'father_name' => ['type' => TabularForm::INPUT_TEXT],
        'mother_name' => ['type' => TabularForm::INPUT_TEXT],
        'parent_contact' => ['type' => TabularForm::INPUT_TEXT],
        'caste' => ['type' => TabularForm::INPUT_TEXT],
        'religion' => ['type' => TabularForm::INPUT_TEXT],
        'nationality' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowStudentsPersonal(' . $key . '); return false;', 'id' => 'students-personal-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Students Personal', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowStudentsPersonal()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

