<?php
/*
 * ShapingRain HTML Template Setup
 * (c) Copyright 2012 ShapingRain
 * http://www.shapingrain.com
 * support@shapingrain.com
 */
require_once 'classes/Templates.php';
require_once 'classes/Translations.php';

function get_settings($in)
{
    if (is_file($in))
        return include $in;
    return false;
}

function get_value($id)
{
    global $current_settings;
    return @$current_settings[$id];
}

// initialize global settings
global $current_settings, $t;
$current_settings = Array();


// set language to display UI in
$lang = 'en';
$t = new Translate($lang);

// load default settings
require_once 'settings/settings.defaults.php';

// load current settings, if exist
$current_settings = get_settings("../site.settings.php");

// check if interface lock prevents access
@$is_locked = $current_settings['interface_locked'];


if ($is_locked == 1) {
    $page = new Template("app/templates/locked.tpl.php");
} else {
    $page = new Template("app/templates/main.tpl.php");
}

$page->title = $product['name'];
$page->groups = $groups;
$page->settings = $t->t('Settings');
$page->product = $product;
$page->presets = $presets;
$page->is_writable_settings = is_writable("../site.settings.php");
$page->is_writable_css = is_writable("../css/styles.css");
$page->is_writable_html = is_writable("../index.html");
$page->is_locked = $is_locked;

$page->t = new Translate();

if (isset($_POST['internal_type'])) {

    if (!$is_locked == 1) {
        // save settings to settings file
        if ($_POST['internal_type'] == "settings") {
            $fh = fopen("../site.settings.php", "w") or die("can't open file");
            fwrite($fh, "<?php\n return array(\n");
            foreach ($_POST as $key => $value) {
                fwrite($fh, '   "' . addslashes($key) . '" => "' . addslashes($value) . '",' . "\n");
            }
            fwrite($fh, ");\n?>\n");
            fclose($fh);
        }

        // reload settings, then replace variables with settings in product files
        $current_settings = get_settings("../site.settings.php");

        $stylesheet = file_get_contents("product/css/styles.css");
        $stylesheet_fh = fopen("../css/styles.css", "w") or die("can't open file");
        foreach ($current_settings as $setting => $value) {
            $stylesheet = str_replace("##" . trim($setting) . "##", $value, $stylesheet);
        }
        fwrite($stylesheet_fh, $stylesheet);
        fclose($stylesheet_fh);

        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode(array("status" => "200"));
        exit();
    } else {
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo json_encode(array("status" => "500"));
        exit();
    }
} else {
    $page->render();
}
