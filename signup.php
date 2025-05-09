<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    if (empty($name) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Simulating DB by saving to file
    $user_data = "$email|$password|$name\n";
    file_put_contents("users.txt", $user_data, FILE_APPEND);

    // Redirect to login page
    header("Location: login.html");
    exit;
}
?>
