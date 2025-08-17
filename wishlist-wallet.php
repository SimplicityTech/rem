<?php
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(403);
    echo "Access denied.";
    exit;
}

function sanitize($data) {
    return htmlspecialchars(trim($data));
}

$location      = sanitize($_POST["Preferred Location(s)"] ?? '');
$budget        = sanitize($_POST["Budget Range"] ?? '');
$features      = sanitize($_POST["Must-Haves"] ?? '');
$dealbreakers  = sanitize($_POST["Deal-Breakers"] ?? '');

$errors = [];
if (!$location) $errors[] = "Preferred location is required.";
if (!$budget)   $errors[] = "Budget range is required.";

if (!empty($errors)) {
    echo "<h2>Submission Error</h2><ul>";
    foreach ($errors as $error) {
        echo "<li>" . $error . "</li>";
    }
    echo "</ul><a href='javascript:history.back()'>Go Back</a>";
    exit;
}

// Send email (or replace with DB/API logic)
$to = "support@homemarket.africa";
$subject = "New Wishlist Wallet Submission";
$message = "
Preferred Location(s): $location
Budget Range: $budget
Must-Haves: $features
Deal-Breakers: $dealbreakers
";
$headers = "From: no-reply@homemarket.africa\r\n";

if (mail($to, $subject, $message, $headers)) {
    // Redirect with success flag
    header("Location: wishlist.html?success");
    exit;
} else {
    echo "<h2>Oops!</h2><p>Something went wrong. Please try again later or contact support directly.</p>";
}
?>