<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Sanitize and get form data
$name = trim(htmlspecialchars($_POST['name'] ?? ''));
$email = trim(htmlspecialchars($_POST['email'] ?? ''));
$message = trim(htmlspecialchars($_POST['message'] ?? ''));

// Validate form data
if (empty($name)) {
    $redirectUrl = 'index.php?error=empty';
    if (!empty($name) || !empty($email) || !empty($message)) {
        $redirectUrl .= '&name=' . urlencode($name) . '&email=' . urlencode($email) . '&message=' . urlencode($message);
    }
    header('Location: ' . $redirectUrl);
    exit;
}

if (empty($email)) {
    $redirectUrl = 'index.php?error=empty';
    if (!empty($name) || !empty($email) || !empty($message)) {
        $redirectUrl .= '&name=' . urlencode($name) . '&email=' . urlencode($email) . '&message=' . urlencode($message);
    }
    header('Location: ' . $redirectUrl);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $redirectUrl = 'index.php?error=email';
    if (!empty($name) || !empty($email) || !empty($message)) {
        $redirectUrl .= '&name=' . urlencode($name) . '&email=' . urlencode($email) . '&message=' . urlencode($message);
    }
    header('Location: ' . $redirectUrl);
    exit;
}

if (empty($message)) {
    $redirectUrl = 'index.php?error=empty';
    if (!empty($name) || !empty($email) || !empty($message)) {
        $redirectUrl .= '&name=' . urlencode($name) . '&email=' . urlencode($email) . '&message=' . urlencode($message);
    }
    header('Location: ' . $redirectUrl);
    exit;
}

// If all validations pass, redirect to thank you page
header('Location: thankyou.php');
exit;
?>
