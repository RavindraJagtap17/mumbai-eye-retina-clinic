<?php
/**
 * admin/index.php — Admin login screen
 */
require __DIR__ . '/auth.php';

// Already logged in? Go straight to the dashboard.
if (auth_is_logged_in()) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_valid($_POST['csrf'] ?? '')) {
        $error = 'Your session expired. Please try again.';
    } elseif (auth_check($_POST['username'] ?? '', $_POST['password'] ?? '')) {
        session_regenerate_id(true);
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = $_POST['username'];
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Incorrect username or password.';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex, nofollow">
<title>Admin Login · Mumbai Eye Retina Clinic</title>
<?php include __DIR__ . '/admin-style.php'; ?>
</head>
<body class="admin-login">
  <div class="login-card">
    <div class="login-brand">
      <span class="brand-mark" aria-hidden="true">
        <svg viewBox="0 0 48 48" width="40" height="40"><circle cx="24" cy="24" r="22" fill="none" stroke="#e0a33b" stroke-width="2.5"/><circle cx="24" cy="24" r="9" fill="#0e6b6f"/><circle cx="24" cy="24" r="3.4" fill="#fff"/></svg>
      </span>
      <h1>Clinic Admin</h1>
      <p>Mumbai Eye Retina Clinic</p>
    </div>

    <?php if ($error): ?>
      <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post" autocomplete="off">
      <input type="hidden" name="csrf" value="<?= csrf_token() ?>">
      <label>Username
        <input type="text" name="username" required autofocus>
      </label>
      <label>Password
        <input type="password" name="password" required>
      </label>
      <button type="submit" class="btn-primary">Log in</button>
    </form>

    <p class="hint">Default login: <strong>admin</strong> / <strong>changeme123</strong> — change it after your first sign-in.</p>
  </div>
</body>
</html>
