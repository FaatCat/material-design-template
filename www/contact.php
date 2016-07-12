<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-80639342-1', 'auto');
    ga('send', 'pageview');

</script>
<?php
$admin_email = "agritix@gmail.com";
if (isset($_POST['email'])) {

    $email_to = $admin_email;

    $email_subject = "Agritix Contact";


    function died($error, $admin_email)
    {

        // your error code can go here

        echo "We are very sorry, but there were error(s) found with the form you submitted. ";

        echo $error . "<br /><br />";

        echo "Please go back and fix these errors.<br /><br />";

        echo "If the error persists, send an email to " . $admin_email . "<br /><br />";

        die();
    }

    try {
        // validation expected data exists

        if (!isset($_POST['name']) ||
            !isset($_POST['email'])
        ) {
            died('Please include your name or email in the form.', $admin_email);
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
        echo "An unexpected error occurred. Please send an email to $admin_email instead.<br /><br />";
        echo "Sorry for the inconvenience!";
        error_log($e->getMessage(),0,"$admin_email");
    }

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <meta name="theme-color" content="#009999">
        <title>Agriculture Analytics | Agritix</title>

        <!-- CSS  -->
        <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
        <link href="min/custom-min.css" type="text/css" rel="stylesheet">
    </head>
    <body id="top" class="scrollspy">
    <p>Thank you for contacting us. We will be in touch as soon as possible.</p>
    <p>You will be redirected to the main page in 5 seconds.</p>

    <script>window.setTimeout(function(){
    window.location.href = "https://www.google.co.in";

    }, 5000);
    </script>
    </body>
    </html>
    <?php

} else {
    header('location: /');
}

?>