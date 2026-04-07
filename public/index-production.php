<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// ── Secure cPanel layout: app lives OUTSIDE public_html ──
// /home/peekaboodaycarec/public_html/index.php → /home/peekaboodaycarec/peekaboo/
$appBase = dirname(__DIR__).'/peekaboo';

// Fallback: if app is still inside public_html (migration period)
if (!is_dir($appBase.'/vendor')) {
    $appBase = __DIR__.'/peekaboo';
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



