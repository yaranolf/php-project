<?php

    // Only process POST reqeusts.
    if (!empty($_POST)) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Set the recipient email address.
        $recipient = 'r0583287@student.thomasmore.be';

        $subject = "New contact from $name";

        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n";
        $email_content .= "Message:\n$message\n";

        $email_headers = "From: $name <$email>";

        if (mail($recipient, $subject, $email_content, $email_headers)) {
            //send
            echo 'Thank You! Your message has been sent.';
            header('Location: ../ajax/contact.php');
        }
    } else {
        echo $error = 'Please try again';
    }
