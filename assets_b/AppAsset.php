<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets_b;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
	public $sourcePath = '@web/views/themes/preadmin/orange';
    public $baseUrl = '@web/assets';
    public $css = [
	"https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700",
	
    ];
    public $js = [
	'practical\js\modal-cal.js',
	'js\ajax-modal-popup.js',
	
	
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}