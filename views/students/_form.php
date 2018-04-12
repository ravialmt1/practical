<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Attendance', 
        'relID' => 'attendance', 
        'value' => \yii\helpers\Json::encode($model->attendances),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Section', 
        'relID' => 'section', 
        'value' => \yii\helpers\Json::encode($model->sections),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'StudentsAcademic', 
        'relID' => 'students-academic', 
        'value' => \yii\helpers\Json::encode($model->studentsAcademics),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'StudentsPersonal', 
        'relID' => 'students-personal', 
        'value' => \yii\helpers\Json::encode($model->studentsPersonals),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'uni_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\University::find()->orderBy('uni_id')->asArray()->all(), 'uni_id', 'uni_id'),
        'options' => ['placeholder' => 'Choose University'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'course_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->orderBy('course_id')->asArray()->all(), 'course_id', 'course_id'),
        'options' => ['placeholder' => 'Choose Course'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'stu_name')->textInput(['maxlength' => true, 'placeholder' => 'Stu Name']) ?>

    <?= $form->field($model, 'reg_no')->textInput(['maxlength' => true, 'placeholder' => 'Reg No']) ?>

    <?= $form->field($model, 'semester')->textInput(['placeholder' => 'Semester']) ?>

    <?= $form->field($model, 'section')->textInput(['maxlength' => true, 'placeholder' => 'Section']) ?>

    <?= $form->field($model, 'emai_id')->textInput(['maxlength' => true, 'placeholder' => 'Emai']) ?>

    <?= $form->field($model, 'mobile_no')->textInput(['maxlength' => true, 'placeholder' => 'Mobile No']) ?>

    <?= $form->field($model, 'laptop')->textInput(['maxlength' => true, 'placeholder' => 'Laptop']) ?>

    <?= $form->field($model, 'smart_phone')->textInput(['maxlength' => true, 'placeholder' => 'Smart Phone']) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dob')->textInput(['maxlength' => true, 'placeholder' => 'Dob']) ?>

    <?= $form->field($model, 'father_name')->textInput(['maxlength' => true, 'placeholder' => 'Father Name']) ?>

    <?= $form->field($model, 'mother_name')->textInput(['maxlength' => true, 'placeholder' => 'Mother Name']) ?>

    <?= $form->field($model, 'parent_contact')->textInput(['maxlength' => true, 'placeholder' => 'Parent Contact']) ?>

    <?= $form->field($model, 'caste')->textInput(['maxlength' => true, 'placeholder' => 'Caste']) ?>

    <?= $form->field($model, 'religion')->textInput(['maxlength' => true, 'placeholder' => 'Religion']) ?>

    <?= $form->field($model, 'nationality')->textInput(['maxlength' => true, 'placeholder' => 'Nationality']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Attendance'),
            'content' => $this->render('_formAttendance', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->attendances),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Section'),
            'content' => $this->render('_formSection', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->sections),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('StudentsAcademic'),
            'content' => $this->render('_formStudentsAcademic', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->studentsAcademics),
            ]),
        ],
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('StudentsPersonal'),
            'content' => $this->render('_formStudentsPersonal', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->studentsPersonals),
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
