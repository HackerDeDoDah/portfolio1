

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "form_data";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES | ENT_HTML5);
    $company = htmlspecialchars(trim($_POST['company'] ?? ''), ENT_QUOTES | ENT_HTML5);
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message'] ?? ''), ENT_QUOTES | ENT_HTML5);

    $errors = [];

    if (!$name) $errors['name'] = "Name is required.";
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL) || $email === 'test@test.com') {
        $errors['email'] = "Valid email is required.";
    }
    
    if (!$message) $errors['message'] = "Message is required.";

    if (!empty($errors)) {
        // Append errors and form data to URL for refilling
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

    $sql = "INSERT INTO contacts (name, company, email, message) 
        VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $company, $email, $message);

    $stmt->execute();

    // Process form successfully
    header("Location: index.php?success=1#form");
} else {
    header("Location: index.php#form");
    exit;
}
if (empty($errors)) {
    // Redirect with success message
    header("Location: index.php?success=1#form");
    exit;
}

?>
