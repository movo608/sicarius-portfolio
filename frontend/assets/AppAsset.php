<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/site.css',
        //'css/main.css'
    ];

    public $js = [
        /*'js/jquery.poptrox.min.js',
        'js/jquery.scrolly.min.js',
        'js/jquery.scrollex.min.js',
        'js/skel.min.js',
        'js/util.js',
        'js/main.js'*/
    ];

    public $jsOptions = [
        'position' => View::POS_BEGIN
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
