<?php
/**
 * index.php — front controller.
 */
session_start();
require __DIR__ . '/config.php';
require __DIR__ . '/pages.php';
require __DIR__ . '/includes/custom-code.php';
require __DIR__ . '/includes/templates.php';

// Resolve the requested path
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$uri = rawurldecode($uri);

// Strip base_url prefix so page keys always start with /
$base = rtrim($SITE['base_url'], '/');
if ($base !== '' && strpos($uri, $base) === 0) {
    $uri = substr($uri, strlen($base));
}
if ($uri === '' || $uri === false) $uri = '/';

if ($uri !== '/' && substr($uri, -1) !== '/') {
    header('Location: ' . base_url($uri) . '/', true, 301);
    exit;
}

$page = $PAGES[$uri] ?? null;

if ($page === null) {
    http_response_code(404);
    $page = [
        'title'    => 'Page Not Found | Mumbai Eye Retina Clinic',
        'desc'     => 'The page you requested could not be found.',
        'canonical'=> $uri,
        'h1'       => 'Page Not Found',
        'crumb'    => '404',
        'noindex'  => true,
        'body'     => '<div class="prose"><p>Sorry, the page you were looking for could not be found. It may have moved. Please use the menu above, or <a href="/">return to the homepage</a>.</p></div>',
    ];
}

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';

echo '<main id="main">';

$tpl = $page['tpl'] ?? null;
switch ($tpl) {
    case 'home':            tpl_home(); break;
    case 'contact':         tpl_contact($page); break;
    case 'thankyou':        tpl_thankyou($page); break;
    case 'services_index':  tpl_services_index($page); break;
    case 'diseases_index':  tpl_diseases_index($page); break;
    case 'image_gallery':   tpl_image_gallery($page); break;
    case 'video_gallery':   tpl_video_gallery($page); break;
    case 'faq':             tpl_faq($page); break;
    case 'blog':            tpl_blog($page); break;
    default:
        page_hero($page);
        echo '<section class="section"><div class="wrap">';
        echo expand_placeholders($page['body'] ?? '');
        echo '</div></section>';
}

echo '</main>';
include __DIR__ . '/includes/footer.php';
