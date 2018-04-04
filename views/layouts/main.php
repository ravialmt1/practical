<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets_b\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php require Yii::$app->basePath . '\ao_def.php'; ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Ravichandra',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
	if(Yii::$app->user->isGuest)
		
	$menu_items = [
	['label' => 'Login', 'url' => ['/user/security/login']],
	];
	
	elseif((Yii::$app->user->identity->username) == 'sup_user')
		
	$menu_items = [
		[ 'label' => 'Reports',
            'items' => [
                 ['label' => 'Subject Wise Report', 'url' => ['/reports/report']],
                 '<li class="divider"></li>',
                 //'<li class="dropdown-header">Dropdown Header</li>',
                 ['label' => 'Overall Report', 'url' => ['/reports/report2']],
            ],
			],
            ['label' => 'Home', 'url' => ['/site/index']],
			['label' => 'Mail', 'url' => ['/site/mail']],
			
			['label' => 'Course', 'url' => ['/course/index?CourseSearch[uni_id]='.$ao_list[Yii::$app->user->identity->username]]],
			['label' => 'Faculty', 'url' => ['/faculty/create?CourseSearch[uni_id]='.$ao_list[Yii::$app->user->identity->username]]],
            ['label' => 'Subjects', 'url' => ['/subjects/index?SubjectsSearch[university_id]='.$ao_list[Yii::$app->user->identity->username]]],
			['label' => 'Feedback', 'url' => ['/feedback/create']],
			['label' => 'Feedback Report', 'url' => ['/mpdf2/report']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/user/security/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ];
		
		else
			
		$menu_items = [
		
			['label' => 'Course', 'url' => ['/course/index?CourseSearch[uni_id]='.$ao_list[Yii::$app->user->identity->username]]],
			['label' => 'Faculty', 'url' => ['/faculty/create?CourseSearch[uni_id]='.$ao_list[Yii::$app->user->identity->username]]],
            
            ['label' => 'Subjects', 'url' => ['/subjects/index?SubjectsSearch[uni_id]='.$ao_list[Yii::$app->user->identity->username]]],
			
			 Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/user/security/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ];
			
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menu_items,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
