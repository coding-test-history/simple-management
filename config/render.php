<?php
function render($view, $section, $data = [])
{
    extract($data);
    ob_start();
    include "views/panel/{$view}/index.php";
    $content = ob_get_clean();
    $section == 'web' ? include 'views/themes/panel-theme.php' : include 'views/themes/auth-theme.php';
}
