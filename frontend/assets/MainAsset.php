<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/red.css',
        'css/jquery-ui.min.css',
        'css/dashicons.min.css',
        'css/forms.css',
        'css/colorbox.css'
    ];
    public $js = [

       '//ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js?ver=1.12.3',
        '//code.jquery.com/ui/1.12.1/jquery-ui.js',
       'js/jcarousellite.min.js?ver=1.9.2',

        'js/easing.min.js?ver=1.3',
        'js/theme-scripts.min.js?ver=3.3.3',
        'js/autocomplete.min.js?ver=1.11.4',
        'js/menu.min.js?ver=1.11.4',

        'js/position.min.js?ver=1.11.4',
        'js/core.min.js?ver=1.11.4',
        'js/slider.min.js?ver=1.11.4',
        'js/widget.min.js?ver=1.11.4',


        'js/jquery.colorbox.min.js?ver=1.6.1'





    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD, 'type'=>'text/javascript'];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',

    ];
}
