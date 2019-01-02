
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\views\themes\preadmin\orange\web\preadminAsset;
use app\assets\AppAsset;
AppAsset::register($this);
preadminAsset::register($this);
?>
<?php $this->beginPage() ?>

<head>
    
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php require Yii::$app->basePath . '\ao_def.php'; ?>
<div class="main-wrapper">
<div class="header">
            <div class="header-left">
                <a href="" class="logo">
                  <!--  <img src="  //Yii::getAlias('@web/views/themes/preadmin/orange/') assets/img/bagalatti_logo.png" width="200" height="60" alt="iNurture"> -->
		        </a>
            </div>
			<!-- <div class="header-left">
                <a href="" class="logo">
                   <img src=" <?= Yii::getAlias('@web/views/themes/preadmin/orange/') ?>assets/img/logo.png" width="200" height="60" alt="iNurture">
		        </a>
            </div> -->
			
            <div class="page-title-box pull-left">
                <h3><?= Html::encode($this->title) ?></h3>
            </div>
            <a id="mobile_btn" class="mobile_btn pull-left" href="#sidebar"><i class="fa fa-bars" aria-hidden="true"></i></a>
            <ul class="nav navbar-nav navbar-right user-menu pull-right">
                <li class="dropdown hidden-xs">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i> <span class="badge bg-primary pull-right">3</span></a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header">
                            <span>Notifications</span>
                        </div>
                        <div class="drop-scroll">
                            <ul class="media-list">
                                <li class="media notification-message">
                                    <a href="activities.html">
                                        <div class="media-left">
                                            <span class="avatar">
												<img alt="John Doe" src="/practical/views/themes/preadmin/orange/assets/img/user.jpg" class="img-responsive img-circle">
											</span>
                                        </div>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Ravichandra</span> added new task <span class="noti-title">iNurture Education solutions Pvt Ltd ERP Developmet</span></p>
                                            <p class="noti-time"><span class="notification-time">4 months ago</span></p>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-message">
                                    <a href="activities.html">
                                        <div class="media-left">
                                            <span class="avatar">V</span>
                                        </div>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Dayana</span> changed the task name <span class="noti-title">University Management System</span></p>
                                            <p class="noti-time"><span class="notification-time">3 months ago</span></p>
                                        </div>
                                    </a>
                                </li>
                                <li class="media notification-message">
                                    <a href="activities.html">
                                        <div class="media-left">
                                            <span class="avatar">L</span>
                                        </div>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Sujay N</span> added <span class="noti-title">Shivappa</span> and <span class="noti-title">Kavya</span> to project <span class="noti-title">ERP Implimentation</span></p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                        </div>
                                    </a>
                                </li>
                                
                                <li class="media notification-message">
                                    <a href="activities.html">
                                        <div class="media-left">
                                            <span class="avatar">V</span>
                                        </div>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Ravichandra</span> added new task <span class="noti-title">University Registration module</span></p>
                                            <p class="noti-time"><span class="notification-time">2 days ago</span></p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="topnav-dropdown-footer">
                            <a href="activities.html">View all Notifications</a>
                        </div>
                    </div>
                </li>
                <li class="dropdown hidden-xs">
                    <a href="javascript:;" id="open_msg_box" class="hasnotifications"><i class="fa fa-comment-o"></i> <span class="badge bg-primary pull-right">8</span></a>
                </li>
                <li class="dropdown">
                    <a href="profile.html" class="dropdown-toggle user-link" data-toggle="dropdown" title="Admin">
                        <span class="user-img"><img class="img-circle" src="/practical/views/themes/preadmin/orange/assets/img/user.jpg" width="40" alt="Admin">
							<span class="status online"></span></span>
                        <span>						<?php if(Yii::$app->user->isGuest) { 
                        echo "Login";
						}
				else 
						echo Yii::$app->user->identity->username;
					/* $getRolesByUser = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());

				$role = array_keys($getRolesByUser)[0];
					echo  $role; */
					?></span>
                        <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="profile.html">My Profile</a></li>
                        <li><a href="edit-profile.html">Edit Profile</a></li>
                        <li><a href="settings.html">Settings</a></li>
						<?php $login = Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['user/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm() 
                . '</li>'
            ) ;
			?>
						<?php if(Yii::$app->user->isGuest) { 
                        echo "<li> <a href='user/login'>Login</a></li>";
						}
				else 
                echo '<li>'. Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm() 
                . '</li>'
             ; ?>
                    </ul>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu pull-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="profile.html">My Profile</a></li>
                    <li><a href="edit-profile.html">Edit Profile</a></li>
                    <li><a href="settings.html">Settings</a></li>
                    <li><a href="login.html">Logout</a></li>
                </ul>
            </div>
        </div>
<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="active">
                            <a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        
                        <li class="submenu">
                            <a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> <span> Email</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled" style="display: none;">
                                <li><a href="compose.html">Compose Mail</a></li>
                                <li><a href="inbox.html">Inbox</a></li>
                                <li><a href="mail-view.html">Mail View</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="tickets.html"><i class="fa fa-ticket" aria-hidden="true"></i> Tickets</a>
                        </li>
                        <li>
                            <a href="settings.html"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
                        </li>                  
                                                       
                        <li class="submenu">
                                    <a href="#"><span> Payroll </span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled" style="display: none;">
                                        <li><a href="salary.html"> Employee Salary </a></li>
                                        <li><a href="salary-view.html"> Payslip </a></li>
                                    </ul>
                                </li>
                                
                                
                           
                        
                        
                       
                    </ul>
                </div>
            </div>
        </div>
    <?php
   /*  NavBar::begin([
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
    NavBar::end();*/
    ?>

    
	<div class="page-wrapper">
	<div class="content container-fluid">
	
	
         <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
	</div>

<?php
yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => '',
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => ['backdrop'=>TRUE,'keyboard' => TRUE]
]);
echo "<div id='modalContent'><div style='text-align:center'><img src='my/path/to/loader.gif'></div></div>";
yii\bootstrap\Modal::end();
?>


<?php $this->endBody() ?>

<?php $this->endPage() ?>
