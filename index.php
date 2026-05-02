<?php
// Directory: Forwards user to appropriate page based on variables.

session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: ./calendar/index.php');
} else {
    header('Location: ./account/sign-in.php');
}
exit();