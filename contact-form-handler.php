<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $registration_number = htmlspecialchars(trim($_POST['registration_number']));
    $year_of_passing = htmlspecialchars(trim($_POST['year_of_passing']));

    // Validate fields
    if (empty($name) || empty($registration_number) || empty($year_of_passing)) {
        echo "All fields are required.";
        exit;
    }

    // Generate certificate (for demo purposes, we will assume it's a PDF or similar)
    $certificate = "Certificate for $name (Reg. No: $registration_number) Year: $year_of_passing";
    
    // Send certificate via email
    $to = "student_email@example.com"; // Replace with dynamic student email if available
    $subject = "Your Certificate from University";
    $message = "Dear $name,\n\nPlease find your certificate attached for the year $year_of_passing.\n\nBest Regards,\nUniversity Admin";
    
    // Email headers
    $headers = "From: admin@university.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Simulating attachment of certificate (you can generate and attach a real PDF)
    if (mail($to, $subject, $message, $headers)) {
        echo "Certificate has been sent to your email.";
    } else {
        echo "There was an issue sending the certificate.";
    }
    
    // Redirect back to the form page
    header("Location: contact.html");
    exit;
}
?>
