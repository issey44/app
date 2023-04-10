<?php
// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  // Collect form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];
  
  // Validate form data
  if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
    // Set recipient email address
    $to = 'your_email_address@example.com';
    
    // Set email subject
    $email_subject = "New Contact Form Submission: $subject";
    
    // Build email body
    $email_body = "Name: $name\n";
    $email_body .= "Email: $email\n";
    $email_body .= "Message:\n$message";
    
    // Set email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
      // Email sent successfully
      echo 'Thank you for contacting us. We will get back to you soon.';
    } else {
      // Email not sent
      echo 'There was an error sending your message. Please try again later.';
    }
    
  } else {
    // Form data missing or invalid
    echo 'Please fill out all fields.';
  }
  
} else {
  // Form not submitted
  echo 'Please submit the contact form.';
}
?>
