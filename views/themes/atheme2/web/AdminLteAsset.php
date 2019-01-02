<?php
namespace app\views\themes\atheme\web;

use yii\base\Exception;
use yii\web\AssetBundle as BaseAdminLteAsset;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class adminLteAsset extends BaseAdminLteAsset
{
    public $sourcePath = '@app/views/themes/atheme/';
    public $css = [
        'css/creative.min.css',
		'vendor/magnific-popup/magnific-popup.css',
		//'vendor/bootstrap/css/bootstrap.min.css',
		'vendor/font-awesome/css/font-awesome.min.css',
		'assets/plugins/morris/morris.css',
		'https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800',
		'https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic',
    ];
    public $js = [
	
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
        'js/creative.min.js',
		'vendor/bootstrap/js/bootstrap.bundle.min.js',
		'vendor/jquery/jquery.min.js',
		'vendor/jquery-easing/jquery.easing.min.js',
		'vendor/scrollreveal/scrollreveal.min.js',
		'vendor/magnific-popup/jquery.magnific-popup.min.js',
    ];
    public $depends = [
        
    ];

    /**
     * @var string|bool Choose skin color, eg. `'skin-blue'` or set `false` to disable skin loading
     * @see https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html#layout
     */
    public $skin = '_all-skins';

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
