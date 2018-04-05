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
    public $baseUrl = '@web/assets_b';
    public $css = [
	'@app\vendor\AdminLTE\dist\css\alt\AdminLTE-bootstrap-social.css',
	'@app\vendor\AdminLTE\dist\css\alt\AdminLTE-bootstrap-social.min.css',
	'@app\vendor\AdminLTE\dist\css\alt\AdminLTE-fullcalendar.css',
	'@app\vendor\AdminLTE\dist\css\alt\AdminLTE-fullcalendar.min.css',
	'@app\vendor\AdminLTE\dist\css\alt\AdminLTE-select2.css',
	'@app\vendor\AdminLTE\dist\css\alt\AdminLTE-select2.min.css',
	'@app\vendor\AdminLTE\dist\css\alt\AdminLTE-without-plugins.css',
	'@app\vendor\AdminLTE\dist\css\alt\AdminLTE-without-plugins.min.css',
	'@app\vendor\AdminLTE\dist\css\AdminLTE',
	'@app\vendor\AdminLTE\dist\css\AdminLTE.min',
	
        'css/site.css',
    ];
    public $js = [
	'@app\vendor\AdminLTE\dist\js\adminlte.js',
	'@app\vendor\AdminLTE\dist\js\adminlte.min.js',
	'@app\js\modal-cal.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}