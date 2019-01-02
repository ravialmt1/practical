<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = 'Create Students';
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php


/* @var $this yii\web\View */
/* @var $students app\modules\yii2extensions\models\Customer */
/* @var $modelsAddress app\modules\yii2extensions\models\Address */

$js = '
jQuery(".dynamicform_wrapper").on("afterInsert", function(e, item) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});

jQuery(".dynamicform_wrapper").on("afterDelete", function(e) {
    jQuery(".dynamicform_wrapper .panel-title-address").each(function(index) {
        jQuery(this).html("Address: " + (index + 1))
    });
});
';

$this->registerJs($js);
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>
    
    <?php DynamicFormWidget::begin([
        'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
        'widgetBody' => '.container-items', // required: css class selector
        'widgetItem' => '.item', // required: css class
        'limit' => 4, // the maximum times, an element can be cloned (default 999)
        'min' => 0, // 0 or 1 (default 1)
        'insertButton' => '.add-item', // css class
        'deleteButton' => '.remove-item', // css class
        'model' => $students[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'first_name',
            'last_name',
            'student_clas',
            'section',
            'email',
            
        ],
    ]); ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="fa fa-envelope"></i> Student Details
            <button type="button" class="pull-right add-item btn btn-success btn-xs"><i class="fa fa-plus"></i> Add Student</button>
            <div class="clearfix"></div>
        </div>
        <div class="panel-body container-items"><!-- widgetContainer -->
            <?php foreach ($students as $index => $students): ?>
                <div class="item panel panel-success"><!-- widgetBody -->
                    <div class="panel-heading">
                        <span class="panel-title-students"> Student : <?= ($index + 1) ?></span>
                        <button type="button" class="pull-right remove-item btn btn-danger btn-xs"><i class="fa fa-minus"></i></button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <?php
                            // necessary for update action.
                            if (!$students->isNewRecord) {
                                echo Html::activeHiddenInput($students, "[{$index}]id");
                            }
                        ?>
					<div class="row">
						<div class="col-sm-3">
                        <?= $form->field($students, "[{$index}]first_name")->textInput(['maxlength' => true]) ?>
						</div>
						<div class="col-sm-3">
                                <?= $form->field($students, "[{$index}]last_name")->textInput(['maxlength' => true]) ?>
                         </div>
						<div class="col-sm-6">
                                <?= $form->field($students, "[{$index}]email")->textInput(['maxlength' => true]) ?>
                        </div>
					</div>	
					
							
                        
                                   

                        
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php DynamicFormWidget::end(); ?>

    <div class="form-group">
        <?= Html::submitButton($students->isNewRecord ? 'Create' : 'Update', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
