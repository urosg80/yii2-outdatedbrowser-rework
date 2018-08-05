# yii2-outdatedbrowser-rework
YII2 Widget implementing outdated-browser-rework package for browser better detection

## About
This widget was inspired by the mdscomp/yii2-outdated-browser-widget which uses the Outdated Browser script by Bürocratik.

This widget on the other hand uses the Outdated Browser Rework script made by the Mike MacCana.

## Installation
The preferred way to install this extension is through composer. Check the composer.json for this extension's requirements and dependencies. Read this web tip /wiki on setting the minimum-stability settings for your application's composer.json.

To install, either run
```
$ php composer.phar require urosg/yii2-outdated-browser-rework "~1.0"
```
or add
```
"urosg/yii2-outdated-browser-rework": "~1.0"
```
to the require section of your composer.json file.

Refer to the CHANGELOG for details of release changes.

## Usage
```php
use urosg\widget\OutdatedBrowserRework;

// To use default configuration
OutdatedBrowserRework::widget();

// To specify custom configuration - listed are default settings
OutdatedBrowserReword::widget([
    'requiredCssProperty' => '',
    'language' => 'en',
    'isUnknownBrowserOK' => false,
    'requireChromeOnAndroid' => false,
    'messages' => [
        'outOfDate' => 'Your browser is out of date!',
        'updateWeb' => 'Update your browser to view this website correctly.',
        'updateGooglePlay' => 'Please install Chrome from Google Play',
        'updateAppStore' => 'Please update iOS from the Settings',
        'webUpdateUrl' => 'http://outdatedbrowser.com',
        'callToAction' => 'Update my browser now',
        'close' => 'Close'
    ],
    'browserSupport' => [
        'Chrome' => 57,
        'Edge' => 39,
        'Safari' => 10,
        'MobileSafari' => 10,
        'Firefox' => 50,
        'Opera' => 50,
        'Vivaldi' => 1,
        'IE' => false
    ]
]);
```
# License
yii2-outdated-browser-rework is released under the BSD-3 Clause license. See the bundled LICENSE file for details.