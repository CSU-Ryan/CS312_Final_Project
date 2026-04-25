<?php
include 'db_connect.php';

$message = '';

if ($_POST['email'] && $_POST['username'] && $_POST['password']) {
    // Checks if form data has already been submitted

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    /** @noinspection PhpUndefinedVariableInspection */
    $doesEmailExist = $conn->prepare("SELECT email FROM users WHERE email=?");
    $doesEmailExist->bind_param("s", $email);
    $doesEmailExist->execute();
    $doesEmailExist->store_result();

    if ($doesEmailExist->num_rows > 0) {
        $message = 'Email already exists';
    } else {
        $newEntry = $conn->prepare("INSERT INTO users (email, username, password) VALUES (?, ?, ?)");
        $newEntry->bind_param("sss", $email, $username, $hashed_password);

        if ($newEntry->execute()) {
            $message = 'Account created';
            header('Location: ./sign-in.php');
            exit();
        } else {
            $message = 'Failed to create account: ' . $conn->error;
        }
        $newEntry->close();
    }
    $doesEmailExist->close();
}
$conn->close();
