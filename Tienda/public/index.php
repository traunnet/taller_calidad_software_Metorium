<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

function loadMaintenanceFile(): void
{
    $maintenanceFile = __DIR__ . '/../storage/framework/maintenance.php';
    if (file_exists($maintenanceFile)) {
        include_once $maintenanceFile;
    }
}

function bootstrapLaravel(): \Illuminate\Foundation\Application
{
    require_once __DIR__ . '/../vendor/autoload.php';
    return include_once __DIR__ . '/../bootstrap/app.php';
}

loadMaintenanceFile();

/** @var Application $app */
$app = bootstrapLaravel();

$app->handleRequest(Request::capture());
