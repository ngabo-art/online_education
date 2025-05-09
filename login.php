<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);

    $lines = file("users.txt", FILE_IGNORE_NEW_LINES);
    foreach ($lines as $line) {
        list($saved_email, $saved_hash, $saved_name) = explode('|', $line);
        if ($email == $saved_email && password_verify($password, $saved_hash)) {
            // Login successful
            header("Location: index.html");
            exit;
        }
    }

    echo "Invalid email or password.";
}
?>
