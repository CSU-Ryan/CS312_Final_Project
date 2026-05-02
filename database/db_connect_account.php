<?php
include 'db_connect.php';

$message = '';

if (isset($_POST['username']) && isset($_POST['password'])) {
    // Checks if form data has already been submitted

    $username = $_POST['username'];
    $password = $_POST['password'];

    /** @noinspection PhpUndefinedVariableInspection */
    $fetchAccount = $conn->prepare("SELECT id, password FROM users WHERE username=?");
    $fetchAccount->bind_param("s", $username);
    $fetchAccount->execute();
    $fetchAccount->store_result();

    if ($fetchAccount->num_rows > 0) {
        $fetchAccount->bind_result($db_id, $db_password);
        $fetchAccount->fetch();

        if (password_verify($password, $db_password)) {
            $message = 'Login successful';

            session_start();
            $_SESSION['user_id'] = $db_id;
            header('Location: ../index.php');
            exit();
        } else {
            $message = 'Wrong password';
        }
    } else {
        $message = 'Account does not exist';
    }
    $fetchAccount->close();
}
$conn->close();
