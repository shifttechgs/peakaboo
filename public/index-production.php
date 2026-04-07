<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// ── Secure cPanel layout: app lives OUTSIDE public_html ──
$appBase = dirname(__DIR__).'/peekaboo';

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = $appBase.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require $appBase.'/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once $appBase.'/bootstrap/app.php';

$app->handleRequest(Request::capture());






