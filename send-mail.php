<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $to = "devsvijaydevsvijay@gmail.com"; // Your email address

    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail_subject = "New Contact Form Message: " . $subject;

    $mail_body = "
    You have received a new message.

    Name: $name
    Email: $email
    Subject: $subject

    Message:
    $message
    ";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    if (mail($to, $mail_subject, $mail_body, $headers)) {
        echo "<script>
                alert('Message sent successfully!');
                window.location.href='contact.html';
              </script>";
    } else {
        echo "<script>
                alert('Failed to send message.');
                window.history.back();
              </script>";
    }

} else {
    header("Location: contact.html");
    exit();
}
?>
</body>
</html>