<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Students */
/* @var $form yii\widgets\ActiveForm */
?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Saved!</h4>
  <?= Yii::$app->session->getFlash('success') ?>
  </div>
<?php endif; ?>

<div class="students-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="row">
						<div class="col-sm-3">
                        <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
						</div>
						<div class="col-sm-3">
                                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                         </div>
						<div class="col-sm-6">
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                        </div>
					</div>	

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	
	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'first_name',
            'last_name',
            'student_clas',
            'email:email',
            // 'uni_id',
            // 'course_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
