<?php
// Calyx AI contact form handler — runs on Hostinger PHP hosting.
// Sends the inquiry to tdoane@calyx-ai.net and redirects to thanks.html.

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: /'); exit; }

// Honeypot: bots fill the hidden "website" field; humans never see it.
if (!empty($_POST['website'])) { header('Location: /thanks.html'); exit; }

$name     = substr(trim(strip_tags($_POST['name'] ?? '')), 0, 100);
$email    = substr(trim($_POST['email'] ?? ''), 0, 150);
$business = substr(trim(strip_tags($_POST['business'] ?? '')), 0, 200);
$message  = substr(trim(strip_tags($_POST['message'] ?? '')), 0, 2000);

if ($name === '' || $message === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo 'Please go back and fill in your name, a valid email, and a message.';
    exit;
}

$to      = 'tdoane@calyx-ai.net';
$subject = 'New audit request from ' . $name . ' (calyx-ai.net)';
$body    = "New lead from calyx-ai.net contact form\n\n"
         . "Name: $name\nEmail: $email\nBusiness: $business\n\nMessage:\n$message\n\n"
         . "IP: " . ($_SERVER['REMOTE_ADDR'] ?? 'unknown') . "\n"
         . "Time: " . date('c') . "\n";

// From must be a domain address for Hostinger to deliver reliably; visitor goes in Reply-To.
$headers = "From: Calyx AI Website <noreply@calyx-ai.net>\r\n"
         . "Reply-To: $name <$email>\r\n"
         . "X-Mailer: PHP/" . phpversion();

@mail($to, $subject, $body, $headers);
header('Location: /thanks.html');
exit;
