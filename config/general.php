<?php
/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here. You can see a
 * list of the available settings in vendor/craftcms/cms/src/config/GeneralConfig.php.
 *
 * @see \craft\config\GeneralConfig
 */

use craft\helpers\App;

$isDev = App::env('ENVIRONMENT') === 'development';
$isProd = App::env('ENVIRONMENT') === 'production';

return [
    'omitScriptNameInUrls' => true,
    'securityKey' => App::env('SECURITY_KEY'),
    'devMode' => $isDev,
    'pathParam' => null,
    'baseCpUrl' => App::env('WEB'),
    'aliases' => [
        '@web' => App::env('WEB'),
        '@webroot' => App::env('WEBROOT')
    ]
];
