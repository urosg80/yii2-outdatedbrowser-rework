<?php
/**
 * @project     Yii2 Outdated Browser Rework Widget
 * @filename    OutdatedBrowserReworkWidgetAsset.php
 * @author      Uros Gaber <uros@gaber.in>
 * @copyright   copyright (c) 2018, Uros Gaber
 * @license     BSD-3 Clause
 */

namespace urosg\widgets\OutdatedBrowserRework;

use Yii;
use yii\web\AssetBundle;
use yii\web\View;

class OutdatedBrowserReworkWidgetAsset extends AssetBundle {
    public $js = [
        'dist/outdated-browser-rework.min.js'
    ];

    public $css = [
        'dist/style.css'
    ];

    public $sourcePath = '@npm/outdated-browser-rework';

    public $jsOptions = [
        'position' => View::POS_HEAD
    ];
}