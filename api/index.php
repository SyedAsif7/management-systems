<?php

/**
 * Vercel Serverless Function Entry Point for Laravel
 */

// Suppress PHP 8.2+ / 8.4+ deprecation notices from polluting HTTP output
error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);
ini_set('display_errors', '0');

set_error_handler(function ($errno, $errstr, $errfile = '', $errline = 0) {
    if ($errno === E_DEPRECATED || $errno === E_USER_DEPRECATED) {
        return true;
    }
    return false;
});

// Initialize temporary writable storage directories for serverless runtime
$storageDirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Forward to standard Laravel public entry point
require __DIR__ . '/../public/index.php';
