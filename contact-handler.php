<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "info@homemarket.africa";
    $subject = "New Contact Form Submission";
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $body = "Name: $name\nEmail: $email\nMessage:\n$message";

    $headers = "From: $email";

    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting REM. We'll be in touch soon.";
    } else {
        echo "Sorry, there was an error sending your message.";
    }
}
?>




































































































































