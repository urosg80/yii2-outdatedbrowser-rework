<?php
/**
 * @project     Yii2 Outdated Browser Rework Widget
 * @filename    OutdatedBrowserReworkMessages.php
 * @author      Uros Gaber <uros@gaber.in>
 * @copyright   copyright (c) 2018, Uros Gaber
 * @license     BSD-3 Clause
 */

namespace urosg\widgets\OutdatedBrowserRework;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * @property $outOfDate string Message that shows when browser is detected as outdated
 * @property $updateWeb string Message that shows on outdated browser in desktop browser
 * @property $updateGooglePlay string Message that shows on outdated browser in android browser
 * @property $updateAppStore string Message that shows on outdated browser in iOS browser
 * @property $webUpdateUrl string Url to direct the user to update their desktop browser
 * @property $callToAction string String for call to action to user
 * @property $close string Button caption to close the message
 */
class OutdatedBrowserReworkMessages
{
    public $outOfDate = 'Your browser is out of date!';
    public $updateWeb = 'Update your browser to view this website correctly.';
    public $updateGooglePlay = 'Please install Chrome from Google Play';
    public $updateAppStore = 'Please update iOS from the Settings';
    public $webUpdateUrl = 'http://outdatedbrowser.com';
    public $callToAction = 'Update my browser now';
    public $close = 'Close';

    public function getJSObject()
    {
        $obj = [
            'outOfDate' => $this->outOfDate,
            'update' => [
                'web' => $this->updateWeb,
                'googlePlay' => $this->updateGooglePlay,
                'appStore' => $this->updateAppStore,
            ],
            'url' => $this->webUpdateUrl,
            'callToAction' => $this->callToAction,
            'close' => $this->close,
        ];
        return json_encode($obj, JSON_FORCE_OBJECT);
    }
}
