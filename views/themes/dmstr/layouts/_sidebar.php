<style>
.main-sidebar,sidebar,sidebar-menu {
width : 230px;
}
</style>
<?php
use app\models\Course;
use app\models\CourseSearch;
use app\models\University;
use yii\data\ActiveDataProvider;

$user_id = Yii::$app->user->id;
//$user_id = 1;
$uni_id = (new \yii\db\Query())
	->select('user_university')
    ->from('user_university')
    ->where(['user_name' => $user_id])
    ->one();
/* $university = (new \yii\db\Query())
    ->from('university')
    ->where(['like', 'uni_id', $uni_id])
    ->one(); */
$query = Course::find('course_id')->distinct()->where(['uni_id' => $uni_id]);
$provider = new ActiveDataProvider([
    'query' => $query,
	]);
	
						 Yii::$app->user->isGuest ? (
                $username = "username"
            ) : (
                $username = Yii::$app->user->identity->username 
                
                )
                
			
//$searchModel = new CourseSearch();
//$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
?>

<!-- Sidebar user panel -->
<div class="user-panel">
    <div class="pull-left image">
        <?php echo \cebe\gravatar\Gravatar::widget(
            [
                'email' => 'username@example.com',
                'options' => [
                    'alt' => $username,
                ],
                'size' => 64,
            ]
        ); ?>
    </div>
    <div class="pull-left info">
        <p><?= $username ?></p>

        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
</div>


<!-- search form -->
<form action="#" method="get" class="sidebar-form">
    <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
            <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i
                        class="fa fa-search"></i></button>
        </span>
    </div>
</form>
<!-- /.search form -->


<?php

// prepare menu items, get all modules
$menuItems = [];

$favouriteMenuItems[] = ['label' => 'MAIN NAVIGATION', 'options' => ['class' => 'header']];


$developerMenuItems = [];
$subitems = []; 

foreach ($provider->models as $model)
{
    $subitems[] = [
        'url' => ['/course/sectionview?id='.$model->course_id],
        'icon' => 'th-list',
        'label' => $model->course_short_name."(".$model->course_batch.")",
    ];
} 

$menuItems[] = [
    'icon' => 'map-o',
    'label' => 'Courses',
    'items' => $subitems,
	];
$menuItems[] = [
    'icon' => 'th',
    'label' => 'Feedback Reports',
    'items' => [
	           
        [
            'url' => ['/reports/report'],
            'icon' => 'th-list',
            'label' => 'Subject Wise Report',
        ],
		    [
            'url' => ['/reports/report2'],
            'icon' => 'th-list',
            'label' => 'Overall Report',
        ],
    ],
];

	
$developerMenuItems[] = [
    'url' => ['/sub/action/param', 'id' => 'b'],
    'icon' => 'th-list',
    'label' => 'Param B',
];


/* $menuItems[] = [
    'url' => ['/test'],
    'icon' => 'cog',
    'label' => 'Test',
]; */

/* $menuItems[] = [
    #'url' => '#',
    'icon' => 'cog',
    'label' => 'Test with items',
    'items' => $developerMenuItems,
]; */



echo dmstr\widgets\Menu::widget([
    'items' => \yii\helpers\ArrayHelper::merge($favouriteMenuItems, $menuItems),
]);
?>
