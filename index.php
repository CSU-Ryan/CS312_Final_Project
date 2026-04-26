<?php
// Directory: Forwards user to appropriate page based on variables.

session_start();
if (isset($_SESSION['id'])) {
    header('Location: ./calendar/index.php');
} else {
    header('Location: ./account/sign-in.php');
}
exit();