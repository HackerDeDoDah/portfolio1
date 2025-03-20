<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // PHPMailer autoload

$servername = "localhost";
$username = "root";
$password = "";
$database = "form_data";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture and sanitize form data
    $name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES | ENT_HTML5);
    $company = htmlspecialchars(trim($_POST['company'] ?? ''), ENT_QUOTES | ENT_HTML5);
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message'] ?? ''), ENT_QUOTES | ENT_HTML5);

    // Array to hold error messages
    $errors = [];

    // Validate form data
    if (!$name) $errors['name'] = "Name is required.";
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL) || $email === 'test@test.com') {
        $errors['email'] = "Valid email is required.";
    }
    if (!$message) $errors['message'] = "Message is required.";

    // If there are validation errors, redirect back to the form with error messages
    if (!empty($errors)) {
        $queryParams = http_build_query([
            'errors' => $errors,
            'name' => $name,
            'company' => $company,
            'email' => $email,
            'message' => $message,
        ]);
        header("Location: contact.php?$queryParams#form");
        exit;
    }

    // Insert form data into the database
    $sql = "INSERT INTO contacts (name, company, email, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $company, $email, $message);
    $stmt->execute();

    // Send email using PHPMailer if data insertion is successful
    try {
        $mail = new PHPMailer(true);
        
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth   = true;
        $mail->Username   = '7ce8264711db54';  // Mailtrap username
        $mail->Password   = 'a3e9e03dfd9968';  // Mailtrap password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 2525;

        //Recipients
        $mail->setFrom('chrisdaypro@protonmail.com', 'Job Queries from Portfolio');
        $mail->addAddress('monkey0679@gmail.com', 'Christopher Day');

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "<h1>New Contact Form Submission</h1>
                        <p><strong>Name:</strong> $name</p>
                        <p><strong>Company:</strong> $company</p>
                        <p><strong>Email:</strong> $email</p>
                        <p><strong>Message:</strong> $message</p>";

        // Send email
        $mail->send();
        echo 'Message has been sent';
        
        // Redirect to success page after email is sent
        header("Location: index.php?success=1#form");
        exit;
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
