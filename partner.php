<?php
// Basic security: only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(403);
    echo "Forbidden access.";
    exit;
}

// Sanitize input
function sanitize($data) {
    return htmlspecialchars(trim($data));
}

$org   = sanitize($_POST["org"] ?? '');
$name  = sanitize($_POST["name"] ?? '');
$email = sanitize($_POST["email"] ?? '');
$phone = sanitize($_POST["phone"] ?? '');
$role  = sanitize($_POST["role"] ?? '');

// Basic validation
$errors = [];
if (!$org)   $errors[] = "Organization name is required.";
if (!$name)  $errors[] = "Your name is required.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
if (!$role)  $errors[] = "Role description is required.";

if (!empty($errors)) {
    echo "<h2>Submission Error</h2><ul>";
    foreach ($errors as $error) {
        echo "<li>" . $error . "</li>";
    }
    echo "</ul><a href='javascript:history.back()'>Go Back</a>";
    exit;
}

// Example: Send email (replace with actual logic or DB insert)
$to = "partnership@homemarket.africa"; // Replace with your actual email
$subject = "New REM Partnership Application";
$message = "
Organization: $org
Name: $name
Email: $email
Phone: $phone
Role Description:
$role
";
$headers = "From: no-reply@homemarket.africa\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "<h2>Thank you, $name!</h2><p>Your application has been received. We'll be in touch soon.</p>";
} else {
    echo "<h2>Oops!</h2><p>Something went wrong. Please try again later.</p>";
}
?>