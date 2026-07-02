<?php
/**
 * admin/auth.php
 * ---------------------------------------------------------------------------
 * Shared authentication layer for the admin panel.
 *
 * HOW TO CHANGE THE PASSWORD
 * --------------------------
 * The login password is stored as a secure hash in  data/admin-auth.json
 * (created automatically on first run from the DEFAULT_PASSWORD below).
 *
 *   • Default username : admin
 *   • Default password : changeme123
 *
 * The SAFEST way to change it is to log in and use the "Change password"
 * box on the dashboard. Alternatively, delete data/admin-auth.json and edit
 * the DEFAULT_USER / DEFAULT_PASSWORD constants below, then reload the login
 * page — a fresh credential file will be regenerated from these values.
 * ---------------------------------------------------------------------------
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

const DEFAULT_USER     = 'admin';
const DEFAULT_PASSWORD = 'changeme123';

/** Absolute path to the credential file. */
function auth_file() {
    return __DIR__ . '/../data/admin-auth.json';
}

/** Load stored credentials, seeding the file on first run. */
function auth_load() {
    $file = auth_file();
    if (!file_exists($file)) {
        $seed = [
            'user' => DEFAULT_USER,
            'hash' => password_hash(DEFAULT_PASSWORD, PASSWORD_DEFAULT),
        ];
        @file_put_contents($file, json_encode($seed, JSON_PRETTY_PRINT));
        return $seed;
    }
    $data = json_decode(file_get_contents($file), true);
    if (!is_array($data) || empty($data['hash'])) {
        return [
            'user' => DEFAULT_USER,
            'hash' => password_hash(DEFAULT_PASSWORD, PASSWORD_DEFAULT),
        ];
    }
    return $data;
}

/** Persist new credentials. */
function auth_save($user, $plainPassword) {
    $data = [
        'user' => $user,
        'hash' => password_hash($plainPassword, PASSWORD_DEFAULT),
    ];
    return @file_put_contents(auth_file(), json_encode($data, JSON_PRETTY_PRINT)) !== false;
}

/** Verify a username/password pair. */
function auth_check($user, $pass) {
    $creds = auth_load();
    return hash_equals($creds['user'], (string) $user)
        && password_verify((string) $pass, $creds['hash']);
}

/** Are we logged in right now? */
function auth_is_logged_in() {
    return !empty($_SESSION['admin_logged_in']);
}

/** Guard a page — redirect to the login screen if not authenticated. */
function auth_require() {
    if (!auth_is_logged_in()) {
        header('Location: index.php');
        exit;
    }
}

/** Small CSRF helper. */
function csrf_token() {
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(16));
    }
    return $_SESSION['csrf'];
}
function csrf_valid($token) {
    return !empty($_SESSION['csrf']) && hash_equals($_SESSION['csrf'], (string) $token);
}
