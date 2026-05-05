<?php

function change_value($parameter, $new_value, $user_id, $conn) {
    $modify = $conn->prepare("UPDATE users SET $parameter = ? WHERE id = ?");
    $modify->bind_param('si', $new_value, $user_id);
    $modify->execute();

    if ($modify->affected_rows == 0) {
        $message = 'Error: No user with your ID.';
    } else {
        $message = "$parameter changed successfully.";
    }
    $modify->close();

    return $message;
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$change_email = $_POST["change_email"] ?? false;
$change_username = $_POST["change_username"] ?? false;
$change_password = $_POST["change_password"] ?? false;
$delete_account = $_POST["delete_account"] ?? false;


include 'db_connect.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    if ($change_email) {
        $email_message = change_value('email', $_POST['email'], $user_id, $conn);
    }

    if ($change_username) {
        $username_message = change_value('username', $_POST['username'], $user_id, $conn);
    }

    if ($change_password) {
        $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $password_message = change_value('password', $new_password, $user_id, $conn);
    }

    if ($delete_account) {
        $deleteAccount = $conn->prepare("DELETE FROM users WHERE id = ?");
        $deleteAccount->bind_param('i', $user_id);
        $deleteAccount->execute();

        if ($deleteAccount->affected_rows == 0) {
            $account_message = 'Error: No user with your ID.';
        } else {
            $account_message = 'Account deleted successfully.';

            $deleteEvents = $conn->prepare("DELETE FROM events WHERE user_id = ?");
            $deleteEvents->bind_param('i', $user_id);
            $deleteEvents->execute();
            $deleteEvents->close();
        }
        $deleteAccount->close();
    }
}
$conn->close();
