<?php

$patches = [
    'vendor/laravel/framework/src/Illuminate/Foundation/Bootstrap/HandleExceptions.php' => [
        ['error_reporting(-1);', 'error_reporting(E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED);'],
        ['if (error_reporting() & $level) {', 'if ($level & (E_DEPRECATED | E_USER_DEPRECATED)) { return; } if (error_reporting() & $level) {']
    ],
    'vendor/nesbot/carbon/src/Carbon/Traits/Creator.php' => [
        ['private static function setLastErrors(array $lastErrors)', 'private static function setLastErrors($lastErrors)'],
        ['static::$lastErrors = $lastErrors;', 'static::$lastErrors = is_array($lastErrors) ? $lastErrors : [];']
    ],
    'vendor/symfony/http-foundation/FileBag.php' => [
        ['$file = $this->fixPhpFilesArray($file);', 'unset($file["full_path"]); $file = $this->fixPhpFilesArray($file);']
    ]
];

foreach ($patches as $file => $replacements) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        foreach ($replacements as $pair) {
            $content = str_replace($pair[0], $pair[1], $content);
        }
        file_put_contents($file, $content);
    }
}
echo "PHP 8.2+ compatibility patches applied successfully.\n";
