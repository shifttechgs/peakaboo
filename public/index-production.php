<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// ── Secure cPanel layout: app lives OUTSIDE public_html ──
$appBase = dirname(__DIR__).'/peekaboo';

// Debug: if something is missing, show what
if (!is_dir($appBase)) {
    die('App directory not found: '.$appBase);
}
if (!file_exists($appBase.'/vendor/autoload.php')) {
    die('Vendor missing at: '.$appBase.'/vendor/autoload.php — Upload vendor/ to '.$appBase);
}
if (!file_exists($appBase.'/.env')) {
    die('.env missing at: '.$appBase.'/.env — Copy your .env file to '.$appBase);
}

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





