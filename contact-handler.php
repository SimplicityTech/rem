<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "info@homemarket.africa";
    $subject = "New Contact Form Submission";

    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Build HTML email body
    $body = "
      <html>
      <head>
        <title>New Contact Form Submission</title>
      </head>
      <body>
        <h2>New Contact Form Submission</h2>
        <p><strong>Name:</strong> $name</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Message:</strong><br>$message</p>
      </body>
      </html>
    ";

    // Set headers properly
    $headers  = "From: Home Market <no-reply@homemarket.africa>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting REM. We'll be in touch soon.";
    } else {
        echo "Sorry, there was an error sending your message.";
    }
}
?>


































































































































