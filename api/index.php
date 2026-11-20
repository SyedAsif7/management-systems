<?php

/**
 * Vercel Serverless Function Entry Point for Laravel
 */

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
