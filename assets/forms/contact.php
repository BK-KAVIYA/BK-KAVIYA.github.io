<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect input from the form
    $name = strip_tags(trim($_POST["w3lName"]));
    $email = filter_var(trim($_POST["w3lSender"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["w3lSubject"]));
    $website = strip_tags(trim($_POST["w3lWebsite"]));
    $message = trim($_POST["w3lMessage"]);

    // Specify your email and subject
    $to = 'your_email@example.com';  // <-- Your email address here
    $email_subject = "New contact from $name: $subject";
    $email_body = "You have received a new message from the user $name.\n".
                  "Here are the details:\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Website: $website\n".
                  "Message: $message";

    // Headers
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Send the email
    mail($to, $email_subject, $email_body, $headers);

    // Redirect to a new page or display a success message
    echo "Thank you for your message. We will get back to you soon.";
} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>
