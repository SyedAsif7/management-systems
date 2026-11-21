<?php

namespace App\Bootstrap;

use Illuminate\Foundation\Bootstrap\HandleExceptions as BaseHandleExceptions;

class HandleExceptions extends BaseHandleExceptions
{
    /**
     * Convert PHP errors to ErrorException instances, suppressing deprecations on PHP 8.1+.
     *
     * @param  int  $level
     * @param  string  $message
     * @param  string  $file
     * @param  int  $line
     * @param  array  $context
     * @return void
     *
     * @throws \ErrorException
     */
    public function handleError($level, $message, $file = '', $line = 0, $context = [])
    {
        // Suppress PHP 8.1 - 8.5+ deprecation notices from being converted to fatal ErrorException
        if ($level === E_DEPRECATED || $level === E_USER_DEPRECATED || ($level & (E_DEPRECATED | E_USER_DEPRECATED))) {
            return;
        }

        parent::handleError($level, $message, $file, $line, $context);
    }
}
