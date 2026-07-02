<?php
/**
 * custom-code.php
 * Loads the custom <head> and <body> snippets saved from the Admin panel.
 * These are injected into EVERY page on the site automatically.
 */
function get_custom_code() {
    $file = __DIR__ . '/../data/custom-code.json';
    $defaults = ['header' => '', 'body_top' => '', 'body_bottom' => ''];
    if (!file_exists($file)) return $defaults;
    $data = json_decode(file_get_contents($file), true);
    if (!is_array($data)) return $defaults;
    return array_merge($defaults, $data);
}
