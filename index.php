<head>
    <title>Redirect Page</title>
    <base href="/~enderbro/CS312_Final_Project/">
</head>

<?php
// Directory: Forwards user to appropriate page based on variables.

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_id'])) {
    header('Location: /calendar/index.php');
} else {
    header('Location: /account/sign-in.php');
}
exit();