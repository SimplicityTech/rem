<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recipient email
    $to = "omfo@homemarket.africa";
    $subject = "New Buyer Wishlist Submission";

    // Sanitize and collect form data
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $location = htmlspecialchars($_POST["location"]);
    $budget = htmlspecialchars($_POST["budget"]);
    $features = htmlspecialchars($_POST["features"]);

    // Build the email body
    $body = "Buyer Wishlist Submission:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Preferred Location: $location\n";
    $body .= "Budget: R$budget\n";
    $body .= "Desired Features:\n$features\n";

    // Email headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you! Your wishlist has been submitted. We'll be in touch soon.";
    } else {
        echo "Sorry, there was an error submitting your wishlist. Please try again.";
    }
}
?>
