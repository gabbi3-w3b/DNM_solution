<?php
$emailTo = 'QPGHost@gmail.com'; 
$emailSubject = 'Reported Issue on Quadratic Website';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input
    $issueDescription = filter_var(trim($_POST['issue_description']), FILTER_SANITIZE_STRING);

    // Check if the issue description is empty after sanitization
    if (!empty($issueDescription)) {
        $headers = 'From: QPGHost@gmail.com' . "\r\n" .
                   'Reply-To: QPGHost@gmail.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        // Attempt to send the email
        if (mail($emailTo, $emailSubject, $issueDescription, $headers)) {
            // Redirect to a success page or display a success message
            header('Location: success.html');
            exit(); // Stop further execution
        } else {
            // Handle mail sending error
            echo '<script>alert("There was an error sending your message. Please try again later.")</script>';
            exit();
        }
    } else {
        // Handle empty issue description
        echo '<script>alert("Please provide a description of the issue.")</script>';
    }
}
?>
