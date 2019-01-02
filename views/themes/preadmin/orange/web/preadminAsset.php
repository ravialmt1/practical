<?php
namespace app\views\themes\preadmin\orange\web;

use yii\base\Exception;
use yii\web\AssetBundle as AssetBundle;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class preadminAsset extends AssetBundle
{
    public $sourcePath = '@app/views/themes/preadmin/orange';
	
    public $css = [
        //'assets/css/bootstrap.min.css',
		'assets/css/bootstrap-datetimepicker.min.css',
		'assets/css/bootstrap-tagsinput.css',
		'assets/css/dataTables.bootstrap.min.css',
		'assets/css/font-awesome.min.css',
		'assets/css/fullcalendar.min.css',
		'assets/css/jquery.dataTables.min.css',
		'assets/css/select2.min.css',
		'assets/css/style.css',
		'https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700',
		'https://fonts.googleapis.com/icon?family=Material+Icons',
		
    ];
	/* <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="assets/js/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/moment.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script type="text/javascript" src="assets/plugins/morris/morris.min.js"></script>
    <script type="text/javascript" src="assets/plugins/raphael/raphael-min.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>

*/
    public $js = [
	//'assets/js/bootstrap.min.js',
	'assets/js/jquery.dataTables.min.js',
	//'assets/js/jquery-3.2.1.min.js',
	'assets/js/jquery.slimscroll.js',
	'assets/js/moment.min.js',
	
        'assets/js/app.js',
		
		//'assets/js/bootstrap-datetimepicker.min.js',
		//'assets/js/bootstrap-tagsinput.js',
		
		//'assets/js/fullcalendar.min.js',
		'assets/js/html5shiv.min.js',
		
		'assets/js/dataTables.bootstrap.min.js',
		//'assets/js/jquery.fullcalendar.js',
		'assets/plugins/morris/morris.min.js',
		
		'assets/plugins/raphael/raphael-min.js',
		
		//'assets/js/modernizr.min.js',
		
		'assets/js/respond.min.js',
		'assets/js/select2.min.js',
    ];
	
    public $depends = [
	 'yii\web\YiiAsset',
	'yii\bootstrap\BootstrapAsset',
	'yii\bootstrap\BootstrapPluginAsset'
	//'yii\web\JqueryAsset',
        
    ];

    /**
     * @var string|bool Choose skin color, eg. `'skin-blue'` or set `false` to disable skin loading
     * @see https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html#layout
     */
    public $skin = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        // Append skin color file if specified
        if ($this->skin) {
            if (('_all-skins' !== $this->skin) && (strpos($this->skin, 'skin-') !== 0)) {
                throw new Exception('Invalid skin specified');
            }

            $this->css[] = sprintf('css/skins/%s.min.css', $this->skin);
        }

        parent::init();
    }
}
