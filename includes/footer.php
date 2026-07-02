<?php
/**
 * footer.php — footer, floating call widget, scripts.
 */
$custom = $custom ?? get_custom_code();
?>
<footer class="site-footer">
  <div class="wrap footer-grid">
    <div class="footer-col footer-about">
      <div class="footer-logo" aria-hidden="true">
        <svg viewBox="0 0 48 48" width="40" height="40"><circle cx="24" cy="24" r="22" fill="none" stroke="#fff" stroke-width="2.5"/><ellipse cx="24" cy="24" rx="20" ry="11" fill="none" stroke="#fff" stroke-width="2.5"/><circle cx="24" cy="24" r="6.5" fill="var(--gold)"/></svg>
        <span>Mumbai Eye Retina Clinic</span>
      </div>
      <p>A super speciality retina care centre dedicated exclusively to the management of posterior segment eye disorders — uveitis, medical &amp; surgical retinal diseases and ocular imaging.</p>
      <div class="footer-social">
        <a href="<?= site('social')['facebook'] ?>" target="_blank" rel="noopener" aria-label="Facebook">f</a>
        <a href="<?= site('social')['twitter'] ?>" target="_blank" rel="noopener" aria-label="Twitter">𝕏</a>
        <a href="<?= site('social')['linkedin'] ?>" target="_blank" rel="noopener" aria-label="LinkedIn">in</a>
        <a href="<?= site('social')['youtube'] ?>" target="_blank" rel="noopener" aria-label="YouTube">▶</a>
      </div>
    </div>

    <div class="footer-col">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="<?= base_url('/') ?>">Home</a></li>
        <li><a href="<?= base_url('/retina-surgery-cost/') ?>">Retina Surgery Cost</a></li>
        <li><a href="<?= base_url('/retinal-diseases/') ?>">Retinal Diseases</a></li>
        <li><a href="<?= base_url('/blog/') ?>">Blog</a></li>
        <li><a href="<?= base_url('/is-retina-surgery-covered-by-health-insurance/') ?>">Insurance Policy</a></li>
        <li><a href="<?= base_url('/contacts/') ?>">Contact Us</a></li>
      </ul>
    </div>

    <div class="footer-col">
      <h4>Our Services</h4>
      <ul>
        <li><a href="<?= base_url('/retinal-services/retinal-imaging/') ?>">Retinal Imaging</a></li>
        <li><a href="<?= base_url('/retinal-services/surgical-retina/') ?>">Surgical Retina</a></li>
        <li><a href="<?= base_url('/retinal-services/medical-retina/') ?>">Medical Retina</a></li>
        <li><a href="<?= base_url('/retinal-services/retinal-injections/') ?>">Retinal Injections</a></li>
        <li><a href="<?= base_url('/retinal-services/uveitis-treatment/') ?>">Uveitis Treatment</a></li>
        <li><a href="<?= base_url('/retinal-services/retina-laser-treatment/') ?>">Retina Laser Treatment</a></li>
      </ul>
    </div>

    <div class="footer-col footer-contact">
      <h4>Reach Us</h4>
      <p class="fc-line"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg> <?= htmlspecialchars(site('address')) ?></p>
      <p class="fc-line"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0122 16.92z"/></svg> <a href="tel:<?= site('phone_intl') ?>"><?= htmlspecialchars(site('phone_display')) ?></a></p>
      <p class="fc-line"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 6-10 7L2 6"/></svg> <a href="mailto:<?= site('email') ?>"><?= htmlspecialchars(site('email')) ?></a></p>
      <p class="fc-line fc-hours"><?= htmlspecialchars(site('hours')) ?><br><em><?= htmlspecialchars(site('hours_note')) ?></em></p>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="wrap">
      <span>Copyright © <?= date('Y') ?> Mumbai Eye &amp; Retina Clinic. All Rights Reserved.</span>
      <span class="footer-legal">
        <a href="<?= base_url('/sitemap/') ?>">Sitemap</a> ·
        <a href="<?= base_url('/privacy-policy/') ?>">Privacy Policy</a> ·
        <a href="<?= base_url('/terms-and-conditions/') ?>">Terms &amp; Conditions</a>
      </span>
    </div>
  </div>
</footer>

<!-- Floating Call Widget -->
<div class="call-widget" id="callWidget">
  <a class="call-fab" href="tel:<?= site('phone_intl') ?>" aria-label="Call <?= htmlspecialchars(site('phone_display')) ?>">
    <span class="call-pulse"></span>
    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.13.96.36 1.9.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0122 16.92z"/></svg>
  </a>
  <a class="call-label" href="tel:<?= site('phone_intl') ?>">Call Now · <?= htmlspecialchars(site('phone_display')) ?></a>
</div>

<!-- ===== Custom body-bottom code (managed from Admin panel) ===== -->
<?= $custom['body_bottom'] ?>
<!-- ===== End custom body-bottom code ===== -->

<script src="<?= base_url('/assets/js/main.js') ?>" defer></script>
</body>
</html>
