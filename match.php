<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(403);
    echo "Access denied.";
    exit;
}

function sanitize($data) {
    return htmlspecialchars(trim($data));
}

$name     = sanitize($_POST["name"] ?? '');
$email    = sanitize($_POST["email"] ?? '');
$phone    = sanitize($_POST["phone"] ?? '');
$property = sanitize($_POST["property"] ?? '');

$errors = [];
if (!$name) $errors[] = "Name is required.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
if (!$property) $errors[] = "Property description is required.";

if (!empty($errors)) {
    echo "<h2>Submission Error</h2><ul>";
    foreach ($errors as $error) {
        echo "<li>" . $error . "</li>";
    }
    echo "</ul><a href='javascript:history.back()'>Go Back</a>";
    exit;
}

// Send email (or replace with database/API logic)
$to = "match@homemarket.africa";
$subject = "New Seller Match Request";
$message = "
Name: $name
Email: $email
Phone: $phone
Property Details:
$property
";
$headers = "From: no-reply@homemarket.africa\r\n";

if (mail($to, $subject, $message, $headers)) {
    echo "<h2>Thank you, $name!</h2><p>Your match request has been received. Our team will reach out shortly with buyer options.</p>";
} else {
    echo "<h2>Oops!</h2><p>Something went wrong. Please try again later or contact us directly.</p>";
}
?>