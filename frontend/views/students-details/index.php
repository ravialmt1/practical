<?php
use  yii\web\Session;

use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;
use frontend\models\StudentsDetails;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StudentsDetailsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students Details';
$this->params['breadcrumbs'][] = $this->title;
$session = Yii::$app->session;
	
?>
<div class="students-details-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       <div class="students-details-form">

    <?php 
	$model= new StudentsDetails();
	$form = ActiveForm::begin(
	['action' =>['students-details/create','clas'=>$session->get('clas'),'section'=>$session->get('section'),],
	 
    'layout' => 'inline',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-sm-4',
            'offset' => 'col-sm-offset-4',
            'wrapper' => 'col-sm-8',
            'error' => '',
            'hint' => '',
        ],
    ],
]); ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_clas')->textInput()->hiddenInput(['value'=> $session->get('clas')])->label(false); ?>

    <?= $form->field($model, 'section')->textInput(['maxlength' => true])->hiddenInput(['value'=> $session->get('section')])->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end() ?>
	

</div>

    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'first_name',
            'last_name',
            //'student_clas',
            //'section',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	<?php Pjax::end(); ?>
</div>
