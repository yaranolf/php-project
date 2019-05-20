<?php

    // Only process POST reqeusts.
    if (!empty($_POST)) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        if (empty($name) or empty($message) or empty($email)) {
            $error = 'Please try again';
            exit;
        }

        // Set the recipient email address.
        $recipient = 'r0583287@student.thomasmore.be';

        $subject = "New contact from $name";

        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Build the email headers.
        $email_headers = "From: $name <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
        } else {
            $error = 'something went wrong, try again!';
        }
    } else {
        $error = 'Please try again';
    }
