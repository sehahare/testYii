<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.css',
        'css/landing-page.css',
        'css/bootstrap.min.css',
        'css/font-awesome.css',
        'css/font-awesome.min.css'
        
    ];
    
    public $fonts = [
        'fonts/glyphicons-halflings-regular.svg',
        'fonts/glyphicons-halflings-regular.ttf',
        'fonts/glyphicons-halflings-regular.eot',
        'fonts/glyphicons-halflings-regular.woff',
        'fonts/glyphicons-halflings-regular.woff',
        'fonts/FontAwesome.otf',
        'fonts/fontawesome-webfont.ttf',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
