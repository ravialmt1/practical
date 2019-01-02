<?php

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
use yii\bootstrap\ActiveForm;
use kartik\depdrop\DepDrop;

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="students-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Students', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<div class="form-students-search">

   
    <?php /* echo $form->field($model, 'emai_id')->textInput(['maxlength' => true, 'placeholder' => 'Emai']) */ ?>

    <?php /* echo $form->field($model, 'mobile_no')->textInput(['maxlength' => true, 'placeholder' => 'Mobile No']) */ ?>

    <?php /* echo $form->field($model, 'laptop')->textInput(['maxlength' => true, 'placeholder' => 'Laptop']) */ ?>

    <?php /* echo $form->field($model, 'smart_phone')->textInput(['maxlength' => true, 'placeholder' => 'Smart Phone']) */ ?>

    <?php /* echo $form->field($model, 'address')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'dob')->textInput(['maxlength' => true, 'placeholder' => 'Dob']) */ ?>

    <?php /* echo $form->field($model, 'father_name')->textInput(['maxlength' => true, 'placeholder' => 'Father Name']) */ ?>

    <?php /* echo $form->field($model, 'mother_name')->textInput(['maxlength' => true, 'placeholder' => 'Mother Name']) */ ?>

    <?php /* echo $form->field($model, 'parent_contact')->textInput(['maxlength' => true, 'placeholder' => 'Parent Contact']) */ ?>

    <?php /* echo $form->field($model, 'caste')->textInput(['maxlength' => true, 'placeholder' => 'Caste']) */ ?>

    <?php /* echo $form->field($model, 'religion')->textInput(['maxlength' => true, 'placeholder' => 'Religion']) */ ?>

    <?php /* echo $form->field($model, 'nationality')->textInput(['maxlength' => true, 'placeholder' => 'Nationality']) */ ?>

    
	<?php

    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'uni_id',
                'label' => 'Uni',
                'value' => function($model){                   
                    return $model->uni->university_name;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\University::find()->asArray()->all(), 'uni_id', 'uni_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'University', 'id' => 'grid--uni_id']
            ],
        [
                'attribute' => 'course_id',
                'label' => 'Course',
                'value' => function($model){                   
                    return $model->course->course_name;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Course::find()->asArray()->all(), 'course_id', 'course_id'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Course', 'id' => 'grid--course_id']
            ],
        'stu_name',
        'reg_no',
        'semester',
        'section',
        'emai_id',
        'mobile_no',
        'laptop',
        'smart_phone',
        'address:ntext',
        'dob',
        'father_name',
        'mother_name',
        'parent_contact',
        'caste',
        'religion',
        'nationality',
        [
            'class' => 'yii\grid\ActionColumn',
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumn,
		
       // 'pjax' => true,
		
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-students']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        'export' => false,
        // your toolbar can include the additional full export menu
        'toolbar' => [
            '{export}',
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
				
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
                'exportConfig' => [
                    ExportMenu::FORMAT_PDF => false
                ]
            ]) ,
        ],
    ]); ?>

</div>
