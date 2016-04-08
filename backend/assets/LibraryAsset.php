<?php
namespace backend\assets;
use yii\web\AssetBundle;
class LibraryAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'library/css/bootstrap.min.css',
        'library/css/grayscale.css',
        'library/css/bootstrap.css',
    ];
    public $js = [
        'library/js/jquery.js',
        'library/js/grayscale.js',
        'library/js/bootstrap.js',
        'library/js/bootstrap.min.js',
        'library/js/jquery.easing.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}




