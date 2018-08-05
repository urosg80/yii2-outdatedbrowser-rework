<?php
/**
 * @project     Yii2 Outdated Browser Rework Widget
 * @filename    OutdatedBrowserReworkBrowserSupport.php
 * @author      Uros Gaber <uros@gaber.in>
 * @copyright   copyright (c) 2018, Uros Gaber
 * @license     BSD-3 Clause
 */

namespace urosg\widgets\OutdatedBrowserRework;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * List of browser minimal versions to check agains to or false to report outdated for all versions
 * @property $Chrome integer default 57
 * @property $Edge integer default 39
 * @property $Safari integer default 10
 * @property $MobileSafari integer default 10
 * @property $Firefox default 50
 * @property $Opera default 50
 * @property $Vivaldi default 1
 * @property $IE default false
 */
class OutdatedBrowserReworkBrowserSupport
{
    public $Chrome = 57;
    public $Edge = 39;
    public $Safari = 10;
    public $MobileSafari = 10;
    public $Firefox = 50;
    public $Opera = 50;
    public $Vivaldi = 1;
    public $IE = false;

    public function getJSObject()
    {
        $obj = [
            'Chrome' => $this->Chrome,
            'Edge' => $this->Edge,
            'Safari' => $this->Safari,
            'Mobile Safari' => $this->MobileSafari,
            'Firefox' => $this->Firefox,
            'Opera' => $this->Opera,
            'Vivaldi' => $this->Vivaldi,
            'IE' => $this->IE,
        ];
        return json_encode($obj, JSON_FORCE_OBJECT);
    }    
}
