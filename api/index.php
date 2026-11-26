<?php

/**
 * Vercel Serverless Function Entry Point for Laravel
 */

// Ensure REMOTE_ADDR is set for serverless environments
if (empty($_SERVER['REMOTE_ADDR'])) {
    $_SERVER['REMOTE_ADDR'] = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0] : '127.0.0.1';
}

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
static $storageInitialized = false;
if (!$storageInitialized) {
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

    // Copy bundled production SQLite database if needed
    $targetDb = getenv('DB_DATABASE') ?: '/tmp/database.sqlite';
    $sourceDb = __DIR__ . '/../database/production.sqlite';
    if ((!file_exists($targetDb) || filesize($targetDb) === 0) && file_exists($sourceDb)) {
        @copy($sourceDb, $targetDb);
        @chmod($targetDb, 0666);
    }

    $storageInitialized = true;
}

// Forward to standard Laravel public entry point
try {
    require __DIR__ . '/../public/index.php';
} catch (\Throwable $e) {
    http_response_code(500);
    echo '<div style="font-family:sans-serif;padding:30px;max-width:800px;margin:auto;">';
    echo '<h2 style="color:#e11d48;">Laravel Serverless Error</h2>';
    echo '<p><strong>Message:</strong> ' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<p><strong>File:</strong> ' . htmlspecialchars($e->getFile()) . ':' . $e->getLine() . '</p>';
    echo '</div>';
}
