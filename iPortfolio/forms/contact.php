<?php
// Replace contact@example.com with your real receiving email address
$receiving_email_address = 'irenepearl2001@gmail.com';

// Check if the library file exists
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);

    // Create an instance of the PHP_Email_Form class
    $contact = new PHP_Email_Form();
    $contact->ajax = true;

    // Set email parameters
    $contact->to = $receiving_email_address;
    $contact->from_name = $_POST['name'];
    $contact->from_email = $_POST['email'];
    $contact->subject = $_POST['subject'];

    // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
    /*
    $contact->smtp = array(
        'host' => 'example.com',
        'username' => 'example',
        'password' => 'pass',
        'port' => '587'
    );
    */

    // Add form data to the email message
    $contact->add_message($_POST['name'], 'From');
    $contact->add_message($_POST['email'], 'Email');
    $contact->add_message($_POST['message'], 'Message', 10);

    // Send the email and echo the result
    echo $contact->send();
} else {
    die('Unable to load the "PHP Email Form" Library!');
}
?>
