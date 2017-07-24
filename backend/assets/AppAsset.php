<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      //  'css/site.css',
        'css/bootstrap.min.css',
        'css/inspire.css',
        'css/demo.css',
        'css/font-awesome.min.css',
        'css/font-muli.css',
        'css/themify-icons.css',
        'http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css'

    ];
    public $js = [
       // 'vendors/jquery-3.1.1.min.js',
        'vendors/jquery-ui.min.js',
        'vendors/tether.min.js',
        'vendors/bootstrap.min.js',
        'vendors/material.min.js',
        'vendors/perfect-scrollbar.jquery.min.js',
        'vendors/jquery.validate.min.js',
        'vendors/moment.min.js',
        'vendors/charts/flot/jquery.flot.js',
        'vendors/charts/flot/jquery.flot.resize.js',
        'vendors/charts/flot/jquery.flot.pie.js',
        'vendors/charts/flot/jquery.flot.stack.js',
        'vendors/charts/flot/jquery.flot.categories.js',
        'vendors/charts/chartjs/Chart.min.js',
        'vendors/jquery.sparkline.min.js',
        'vendors/jquery.bootstrap-wizard.js',
        'vendors/bootstrap-notify.js',
        'vendors/bootstrap-datepicker.min.js',
        'vendors/jquery-jvectormap.js',
        'vendors/nouislider.min.js',
        'vendors/jquery.select-bootstrap.js',
        'js/bootstrap-checkbox-radio-switch-tags.js',
        'js/jquery.easypiechart.min.js',
        'vendors/sweetalert/js/sweetalert2.min.js',
        'vendors/jasny-bootstrap.min.js',
        'vendors/fullcalendar.min.js',
        'vendors/jquery.tagsinput.js',
        'js/inspire.js',
        'js/demo.js',
        'js/charts/flot-charts.js',
        'js/charts/chartjs-charts.js',
        'js/charts/sparkline-charts.js',



    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
