<?php

/* @var $this yii\web\View */


    global $form;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

/* @var $this yii\web\View /
/ @var $model app\models\OrdenDeCompra /
/ @var $form yii\widgets\ActiveForm */
?>


<?php
$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Let me know more about you',
            'icon' => 'glyphicon glyphicon-cloud-download',
            'content' => $this->render('_login', ['form' => $form, 'model' => $model]),
            'buttons' => [
                'next' => [
                    'title' => 'Forward', 
                    'options' => [
                        'class' => 'disabled'
                    ],
                 ],
             ],
        ],
        2 => [
            'title' => 'Let me know about your school/College',                                      
            'icon' => 'glyphicon glyphicon-cloud-upload',
            'content' => $this->render('/Classes/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]),
            'skippable' => true,
        ],
        3 => [
            'title' => 'Let us know what classes you are handling',
            'icon' => 'glyphicon glyphicon-transfer',
            'content' => '<h3>Step 3</h3>This is step 3',
        ],
    ],
    
    'start_step' => 1, // Optional, start with a specific step
];
?>

<?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>

    <code><?= __FILE__ ?></code>
</div>
