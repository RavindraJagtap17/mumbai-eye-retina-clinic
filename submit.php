<?php
/**
 * submit.php — handles the enquiry form.
 */
session_start();
require __DIR__ . '/config.php';

function back_with_error($msg, $old) {
    $_SESSION['form_error'] = $msg;
    $_SESSION['form_old']   = $old;
    header('Location: ' . base_url('/contacts/'));
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ' . base_url('/contacts/')); exit;
}

$old = [
    'name'    => trim($_POST['name'] ?? ''),
    'email'   => trim($_POST['email'] ?? ''),
    'phone'   => trim($_POST['phone'] ?? ''),
    'service' => trim($_POST['service'] ?? ''),
    'message' => trim($_POST['message'] ?? ''),
];

// 1) Honeypot
if (!empty($_POST['website'])) {
    header('Location: ' . base_url('/thank-you/')); exit;
}

// 2) Captcha
$expected = $_SESSION['captcha_sum'] ?? null;
$given    = trim($_POST['captcha'] ?? '');
if ($expected === null || $given === '' || (int)$given !== (int)$expected) {
    back_with_error('Incorrect answer to the spam check. Please try again.', $old);
}
unset($_SESSION['captcha_sum']);

// 3) Required fields
foreach (['name', 'email', 'phone', 'service', 'message'] as $f) {
    if ($old[$f] === '') back_with_error('Please fill in all required fields.', $old);
}
if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
    back_with_error('Please enter a valid email address.', $old);
}

// 4) Store the enquiry
$record = $old + [
    'time' => date('Y-m-d H:i:s'),
    'ip'   => $_SERVER['REMOTE_ADDR'] ?? '',
];
$file = __DIR__ . '/data/inquiries.json';
$all  = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
if (!is_array($all)) $all = [];
$all[] = $record;
@file_put_contents($file, json_encode($all, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE), LOCK_EX);

// 5) Notify by email
$to      = site('email');
$subject = 'New enquiry from website — ' . $old['service'];
$body    = "Name: {$old['name']}\nEmail: {$old['email']}\nPhone: {$old['phone']}\nService: {$old['service']}\n\nMessage:\n{$old['message']}\n\nReceived: {$record['time']}";
$headers = "From: website@mumbaieyeretinaclinic.com\r\nReply-To: {$old['email']}\r\n";
@mail($to, $subject, $body, $headers);

// 6) Success
header('Location: ' . base_url('/thank-you/'));
exit;
