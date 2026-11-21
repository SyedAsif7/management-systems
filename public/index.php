<?php

// Suppress PHP 8.2+ / 8.4+ deprecation notices from polluting HTTP output
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '0');

set_error_handler(function ($errno, $errstr, $errfile = '', $errline = 0) {
    if ($errno === E_DEPRECATED || $errno === E_USER_DEPRECATED) {
        return true;
    }
    return false;
});

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

// Intercept and load PHP 8.2+ / 8.5+ compatible overrides before vendor packages load
spl_autoload_register(function ($class) {
    if ($class === 'Carbon\Traits\Creator') {
        require_once __DIR__ . '/../app/Overrides/Carbon/Traits/Creator.php';
        return true;
    }
    if ($class === 'Symfony\Component\HttpFoundation\FileBag') {
        require_once __DIR__ . '/../app/Overrides/Symfony/Component/HttpFoundation/FileBag.php';
        return true;
    }
}, true, true);

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
