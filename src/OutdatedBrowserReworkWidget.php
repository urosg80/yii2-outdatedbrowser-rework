<?php
/**
 * @project     Yii2 Outdated Browser Rework Widget
 * @filename    OutdatedBrowserReworkWidget.php
 * @author      Uros Gaber <uros@gaber.in>
 * @copyright   copyright (c) 2018, Uros Gaber
 * @license     BSD-3 Clause
 */

namespace urosg\widgets\OutdatedBrowserRework;

use Yii;
use yii\base\Widget;
use yii\web\View;
use yii\helpers\Html;
use urosg\widgets\OutdatedBrowserRework\OutdatedBrowserReworkWidgetAsset;
use urosg\widgets\OutdatedBrowserRework\OutdatedBrowserReworkMessages;
use urosg\widgets\OutdatedBrowserRework\OutdatedBrowserReworkBrowserSupport;

/**
 * @property $browserSupport OutdatedBrowserReworkBrowserSupport
 * @property $requiredCssProperty string
 * @property $messages OutdatedBrowserReworkMessages 
 * @property $language string Code of supported language
 * @property $requireChromeOnAndroid boolean Ask Android users to install Chrome. Default is false.
 * @property $isUnknownBrowserOK boolean Whether unknown browsers are considered to be out of date or not. The default is false, ie. unknown browsers are considered to be out of date. Consider setting true and using requiredCssProperty to catch missing features.
 */
class OutdatedBrowserReworkWidget extends Widget {
    public $browserSupport;
    public $requiredCssProperty = '';
    public $messages;
    public $language = 'en';
    public $requireChromeOnAndroid = false;
    public $isUnknownBrowserOK = false;

    public function __construct()
    {
        $this->browserSupport = new OutdatedBrowserReworkBrowserSupport();
        $this->messages = new OutdatedBrowserReworkMessages();
    }
    public function run() {
        OutdatedBrowserReworkWidgetAsset::register($this->getView());
        $js = 'outdatedBrowserRework({';
        $js.= 'requireChromeOnAndroid: '.($this->requireChromeOnAndroid ? 'true' : 'false');
        $js.= ', isUnknownBrowserOK: '.($this->isUnknownBrowserOK ? 'true' : 'false');
        $js.= ', language: \''.$this->language.'\'';
        $js.= ', requiredCssProperty: \''.$this->requiredCssProperty.'\'';
        $js.= ', browserSupport: '.$this->browserSupport->getJSObject();
        $js.= ', messages: {\''.$this->language.'\': '.$this->messages->getJSObject().'}';
        $js.= '});';
        $this->getView()->registerJs($js, View::POS_HEAD);
        echo Html::tag('div', '', ['id' => 'outdated']);
    }

    public static function widget($config = [])
    {
        ob_start();
        ob_implicit_flush(false);
        try {
            /* @var $widget Widget */
            $config['class'] = get_called_class();
            if (isset($config['messages']) && is_array($config['messages']))
            {
                $config['messages']['class'] = OutdatedBrowserReworkMessages::class;
                $messages = Yii::createObject($config['messages']);
                $config['messages'] = $messages;
            }
            if (isset($config['browserSupport']) && is_array($config['browserSupport']))
            {
                $config['browserSupport']['class'] = OutdatedBrowserReworkBrowserSupport::class;
                $browserSupport = Yii::createObject($config['browserSupport']);
                $config['browserSupport'] = $browserSupport;
            }
            $widget = Yii::createObject($config);
            $out = '';
            if ($widget->beforeRun()) {
                $result = $widget->run();
                $out = $widget->afterRun($result);
            }
        } catch (\Exception $e) {
            // close the output buffer opened above if it has not been closed already
            if (ob_get_level() > 0) {
                ob_end_clean();
            }
            throw $e;
        }
        return ob_get_clean() . $out;
    }
}