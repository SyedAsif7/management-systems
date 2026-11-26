<?php

$fontDir = sys_get_temp_dir() . '/fonts';
if (!is_dir($fontDir)) {
    @mkdir($fontDir, 0777, true);
}

return array(
    'show_warnings' => false,
    'orientation' => 'portrait',
    'defines' => array(
        "font_dir" => $fontDir,
        "font_cache" => $fontDir,
        "temp_dir" => sys_get_temp_dir(),
        "chroot" => realpath(base_path()),
        "enable_font_subsetting" => false,
        "pdf_backend" => "CPDF",
        "default_media_type" => "screen",
        "default_paper_size" => "a4",
        "default_font" => "serif",
        "dpi" => 96,
        "enable_php" => false,
        "enable_javascript" => true,
        "enable_remote" => true,
        "font_height_ratio" => 1.1,
        "enable_html5_parser" => false,
    ),
);
