<?php
/**
 * admin/dashboard.php — Admin control panel
 *  • Edit custom <head> / body-top / body-bottom code injected into EVERY page
 *  • View inquiry-form submissions
 *  • Change the admin password
 */
require __DIR__ . '/auth.php';
auth_require();

$CODE_FILE      = __DIR__ . '/../data/custom-code.json';
$INQUIRY_FILE   = __DIR__ . '/../data/inquiries.json';
$notice = '';
$notice_type = 'ok';

/* ---- Handle saves ---- */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_valid($_POST['csrf'] ?? '')) {
        $notice = 'Session expired — please try again.';
        $notice_type = 'error';
    } elseif (($_POST['action'] ?? '') === 'save_code') {
        $payload = [
            'header'      => (string) ($_POST['header'] ?? ''),
            'body_top'    => (string) ($_POST['body_top'] ?? ''),
            'body_bottom' => (string) ($_POST['body_bottom'] ?? ''),
        ];
        if (@file_put_contents($CODE_FILE, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)) !== false) {
            $notice = 'Custom code saved. It is now live on every page.';
        } else {
            $notice = 'Could not write data/custom-code.json — check folder permissions (chmod 775 data).';
            $notice_type = 'error';
        }
    } elseif (($_POST['action'] ?? '') === 'change_pw') {
        $cur = $_POST['current_pw'] ?? '';
        $new = $_POST['new_pw'] ?? '';
        $cf  = $_POST['confirm_pw'] ?? '';
        if (!auth_check($_SESSION['admin_user'] ?? 'admin', $cur)) {
            $notice = 'Current password is incorrect.'; $notice_type = 'error';
        } elseif (strlen($new) < 8) {
            $notice = 'New password must be at least 8 characters.'; $notice_type = 'error';
        } elseif ($new !== $cf) {
            $notice = 'New passwords do not match.'; $notice_type = 'error';
        } elseif (auth_save($_SESSION['admin_user'] ?? 'admin', $new)) {
            $notice = 'Password updated successfully.';
        } else {
            $notice = 'Could not save the new password (check data/ permissions).'; $notice_type = 'error';
        }
    }
}

/* ---- Load current values ---- */
$code = ['header' => '', 'body_top' => '', 'body_bottom' => ''];
if (file_exists($CODE_FILE)) {
    $tmp = json_decode(file_get_contents($CODE_FILE), true);
    if (is_array($tmp)) $code = array_merge($code, $tmp);
}

$inquiries = [];
if (file_exists($INQUIRY_FILE)) {
    $tmp = json_decode(file_get_contents($INQUIRY_FILE), true);
    if (is_array($tmp)) $inquiries = array_reverse($tmp); // newest first
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Dashboard · Clinic Admin</title>
<?php include __DIR__ . '/admin-style.php'; ?>
</head>
<body>
  <header class="admin-top">
    <div class="admin-brand">
      <svg viewBox="0 0 48 48" width="26" height="26" aria-hidden="true"><circle cx="24" cy="24" r="22" fill="none" stroke="#e0a33b" stroke-width="3"/><circle cx="24" cy="24" r="9" fill="#fff"/><circle cx="24" cy="24" r="3.4" fill="#0e6b6f"/></svg>
      Clinic Admin
    </div>
    <div style="display:flex;align-items:center;gap:14px">
      <span class="who">Signed in as <strong><?= htmlspecialchars($_SESSION['admin_user'] ?? 'admin') ?></strong></span>
      <a class="logout" href="logout.php">Log out</a>
    </div>
  </header>

  <main class="wrap">

    <?php if ($notice): ?>
      <div class="alert alert-<?= $notice_type === 'error' ? 'error' : 'ok' ?>"><?= htmlspecialchars($notice) ?></div>
    <?php endif; ?>

    <!-- ============ Custom code ============ -->
    <section class="panel">
      <span class="tag">Site-wide injection</span>
      <h2 style="margin-top:10px">Custom Header &amp; Body Code</h2>
      <p class="sub">Whatever you paste below is automatically added to <strong>every page</strong> of the website. Use it for tracking tags, verification meta, extra schema, chat widgets, etc.</p>

      <div class="callout">
        Your existing <strong>Google Tag Manager</strong> container (<code>GTM-KZ9PBMQ</code>) is already hard-wired into the site and does <em>not</em> need to be re-added here. Most Google Analytics tags fire through that GTM container, so they are preserved automatically. Use the boxes below only for <em>additional</em> code.
      </div>

      <form method="post">
        <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
        <input type="hidden" name="action" value="save_code">

        <div class="field">
          <label for="header">Header code <span style="font-weight:600;color:var(--muted)">— injected before &lt;/head&gt;</span></label>
          <p class="desc">Meta tags, site-verification tags, &lt;link&gt; tags, extra &lt;script&gt; or JSON-LD schema.</p>
          <textarea id="header" name="header" spellcheck="false"><?= htmlspecialchars($code['header']) ?></textarea>
        </div>

        <div class="field">
          <label for="body_top">Body — top <span style="font-weight:600;color:var(--muted)">— injected right after &lt;body&gt;</span></label>
          <p class="desc">Code that must load first, e.g. &lt;noscript&gt; pixels or top-of-page banners.</p>
          <textarea id="body_top" name="body_top" spellcheck="false"><?= htmlspecialchars($code['body_top']) ?></textarea>
        </div>

        <div class="field">
          <label for="body_bottom">Body — bottom <span style="font-weight:600;color:var(--muted)">— injected before &lt;/body&gt;</span></label>
          <p class="desc">Chat widgets, deferred scripts, remarketing tags.</p>
          <textarea id="body_bottom" name="body_bottom" spellcheck="false"><?= htmlspecialchars($code['body_bottom']) ?></textarea>
        </div>

        <div class="row-actions">
          <button type="submit" class="btn-primary">Save changes</button>
          <span class="desc" style="margin:0">Saved to <code>data/custom-code.json</code></span>
        </div>
      </form>
    </section>

    <!-- ============ Inquiries ============ -->
    <section class="panel">
      <span class="tag">Leads</span>
      <h2 style="margin-top:10px">Inquiry Submissions <span style="font-size:.9rem;color:var(--muted);font-family:'Mulish'">(<?= count($inquiries) ?>)</span></h2>
      <p class="sub">Messages received through the website contact form.</p>
      <?php if (!$inquiries): ?>
        <p class="empty">No inquiries yet.</p>
      <?php else: ?>
        <div style="overflow-x:auto">
        <table>
          <thead><tr><th>Date</th><th>Name</th><th>Contact</th><th>Service</th><th>Message</th></tr></thead>
          <tbody>
          <?php foreach ($inquiries as $q): ?>
            <tr>
              <td><?= htmlspecialchars($q['time'] ?? $q['date'] ?? '') ?></td>
              <td><?= htmlspecialchars($q['name'] ?? '') ?></td>
              <td>
                <?= htmlspecialchars($q['email'] ?? '') ?><?php if (!empty($q['phone'])): ?><br><?= htmlspecialchars($q['phone']) ?><?php endif; ?>
              </td>
              <td><?= htmlspecialchars($q['service'] ?? '') ?></td>
              <td class="msg"><?= htmlspecialchars($q['message'] ?? '') ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        </div>
      <?php endif; ?>
    </section>

    <!-- ============ Password ============ -->
    <section class="panel">
      <span class="tag">Security</span>
      <h2 style="margin-top:10px">Change Password</h2>
      <p class="sub">Update the password used to access this admin area.</p>
      <form method="post">
        <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
        <input type="hidden" name="action" value="change_pw">
        <div class="split">
          <div class="field"><label>Current password</label><input type="password" name="current_pw" required></div>
          <div></div>
          <div class="field"><label>New password</label><input type="password" name="new_pw" required minlength="8"></div>
          <div class="field"><label>Confirm new password</label><input type="password" name="confirm_pw" required minlength="8"></div>
        </div>
        <div class="row-actions"><button type="submit" class="btn-primary">Update password</button></div>
      </form>
    </section>

  </main>
</body>
</html>
