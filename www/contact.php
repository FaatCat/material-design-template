<?php

if (isset($_POST['email'])) {

    $email_to = "deeppalmproject@gmail.com";

    $email_subject = "DeepPalm Contact";


    function died($error)
    {

        // your error code can go here

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";

        echo $error . "<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        echo "If the error persists, send an email to DeepPalmProject@gmail.com<br /><br />";

        die();
    }

    try {
        // validation expected data exists

        if (!isset($_POST['name']) ||
            !isset($_POST['email'])
        ) {
            died('Please include your name or email in the form.');
        }


        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $problem = $_POST['problem'];
        $additional_info = $_POST['additional_info'];

        $email_message = "Form details:\n\n";
        $email_message .= "Name: " . $name . "\n";
        $email_message .= "Role: " . $role . "\n";
        $email_message .= "Email: " . $email . "\n";
        $email_message .= "Problem: " . $problem . "\n";
        $email_message .= "Additional Info: " . $additional_info . "\n";


        // create email headers

        $headers = 'From: ' . $email . "\r\n" .
            'Reply-To: ' . $email . "\r\n" .
//        'cc: ' . $email . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $email_message = wordwrap($email_message,70);
        mail($email_to, $email_subject, $email_message, $headers);
    } catch (Exception $e) {
        echo "An unexpected error occurred. Please send an email to DeepPalmProject@gmail.com instead.<br /><br />";
        echo "Sorry for the inconvenience!";
        error_log($e->getMessage(),0,"DeepPalmProject@gmail.com");
    }

    ?>


    <!-- include your own success html here -->


    Thank you for contacting us. We will be in touch as soon as possible.


    <?php

}

?>