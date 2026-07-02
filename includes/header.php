<?php
/**
 * header.php — top utility bar + sticky navigation.
 */
$custom = $custom ?? get_custom_code();
$current = $_SERVER['REQUEST_URI'] ?? '/';
function nav_active($url, $current) {
    $base = rtrim(site('base_url'), '/');
    $c = strtok($current, '?');
    // strip base_url prefix for comparison
    if ($base && strpos($c, $base) === 0) {
        $c = substr($c, strlen($base));
    }
    if ($c === '') $c = '/';
    return ($url !== '#' && $url !== '/' && strpos($c, $url) === 0) || ($url === '/' && $c === '/') ? ' active' : '';
}
?>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?= htmlspecialchars(site('gtm_id')) ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<!-- ===== Custom body-top code (managed from Admin panel) ===== -->
<?= $custom['body_top'] ?>
<!-- ===== End custom body-top code ===== -->

<a class="skip-link" href="#main">Skip to content</a>

<div class="topbar">
  <div class="wrap topbar-inner">
    <span class="topbar-hours"><svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg> <?= htmlspecialchars(site('hours')) ?></span>
    <span class="topbar-social">
      <a href="<?= site('social')['facebook'] ?>" aria-label="Facebook" target="_blank" rel="noopener">f</a>
      <a href="<?= site('social')['twitter'] ?>" aria-label="Twitter" target="_blank" rel="noopener">𝕏</a>
      <a href="<?= site('social')['linkedin'] ?>" aria-label="LinkedIn" target="_blank" rel="noopener">in</a>
      <a href="<?= site('social')['youtube'] ?>" aria-label="YouTube" target="_blank" rel="noopener">▶</a>
    </span>
  </div>
</div>

<header class="site-header" id="siteHeader">
  <div class="wrap header-inner">
    <a class="brand" href="<?= base_url('/') ?>">
      <span class="brand-mark" aria-hidden="true">
        <svg viewBox="0 0 48 48" width="44" height="44"><circle cx="24" cy="24" r="22" fill="none" stroke="var(--teal)" stroke-width="2.5"/><ellipse cx="24" cy="24" rx="20" ry="11" fill="none" stroke="var(--teal)" stroke-width="2.5"/><circle cx="24" cy="24" r="6.5" fill="var(--gold)"/><circle cx="24" cy="24" r="2.4" fill="var(--teal-900)"/></svg>
      </span>
      <span class="brand-text">
        <strong>Mumbai Eye Retina Clinic</strong>
        <small>Dr. Madhusudan Davda · Retina Specialist</small>
      </span>
    </a>

    <button class="nav-toggle" id="navToggle" aria-label="Open menu" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

    <nav class="main-nav" id="mainNav" aria-label="Primary">
      <ul class="nav-list">
        <?php foreach ($NAV as $item): ?>
          <li class="<?= !empty($item['children']) ? 'has-children' : '' ?>">
            <a href="<?= htmlspecialchars(base_url($item['url'])) ?>" class="<?= trim(nav_active($item['url'], $current)) ?>">
              <?= htmlspecialchars($item['label']) ?>
              <?php if (!empty($item['children'])): ?><i class="caret">▾</i><?php endif; ?>
            </a>
            <?php if (!empty($item['children'])): ?>
              <ul class="submenu">
                <?php foreach ($item['children'] as $c): ?>
                  <li><a href="<?= htmlspecialchars(base_url($c['url'])) ?>"><?= htmlspecialchars($c['label']) ?></a></li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
      <a class="btn btn-accent nav-cta" href="tel:<?= site('phone_intl') ?>">Call Now</a>
    </nav>
  </div>
</header>
