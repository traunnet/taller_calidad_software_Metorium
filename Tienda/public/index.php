<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));
$maintenanceFile = __DIR__ . '/../storage/framework/maintenance.php';
if (file_exists($maintenanceFile)) {
    include_once $maintenanceFile;
}


require_once __DIR__ . '/../vendor/autoload.php';


/** @var Application $app */
$app = include_once __DIR__ . '/../bootstrap/app.php';

$app->handleRequest(Request::capture());
