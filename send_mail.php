<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = $_POST['name'] ?? '';
    $email   = $_POST['email'] ?? '';
    $phone   = $_POST['phone'] ?? '';
    $message = $_POST['message'] ?? '';

    $mail = new PHPMailer(true);

    try {
        // SMTP settings
        $mail->isSMTP();
        $mail->Host       = 't-erp.us';      // Replace with your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sales@t-erp.us'; // Your SMTP username
        $mail->Password   = '_8AB[i3~rsN+';          // Your SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Or PHPMailer::ENCRYPTION_SMTPS
        $mail->Port       = 465; // or 465 if using SMTPS

        // Recipients
        $mail->setFrom('sales@t-erp.us', 'Sales');
        $mail->addAddress('sales@t-erp.us', 'Sales'); // Where to send

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission on t-erp.us';
        $mail->Body    = "
            <h3>Contact Form Details</h3>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Phone:</strong> {$phone}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";

        $mail->send();
        echo "Thanks for submitting your inquiry. We'll get back to you promptly.";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
}
?>
