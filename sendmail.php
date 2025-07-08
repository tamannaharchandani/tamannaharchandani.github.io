<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form inputs
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));


    if (!empty($name) && !empty($email) && !empty($message)) {

        $to = "tamannaharchandani77@gmail.com";  
        $subject = "New Contact Message from $name";
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Failed to send email. Please try again.";
        }

    } else {
        echo "Please fill in all fields.";
    }
} else {
    echo "Invalid request.";
}
?>