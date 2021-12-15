<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendors/bootstrap4-toggle/css/bootstrap4-toggle.min.css',
        'css/site.css',
        'vendors/slick/slick.css',
        'vendors/slick/slick-theme.css',
    ];
    public $js = [
     // "vendors/jquery/jquery.min.js",
     'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',
     'vendors/bootstrap4-toggle/js/bootstrap4-toggle.min.js', 
     'vendors/slick/slick.min.js',
     "vendors/jquery/dynamic-form.js",
     
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
    public $jsOptions = [ 'position' => \yii\web\View::POS_HEAD ];
}
