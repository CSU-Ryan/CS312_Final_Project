<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db_connect.php';

$message = '';

if (isset($_SESSION['user_id']) && isset($_GET['d'])) {
    $user_id = $_SESSION['user_id'];
    $date = $_GET['d'];
    $month = preg_split('-', $date)[1];

    /** @noinspection PhpUndefinedVariableInspection */
    $fetchEvent = $conn->prepare("SELECT name, date, start, end FROM events WHERE user_id = ? AND MONTH(date) = ?");
    $fetchEvent->bind_param('ii', $user_id, $month);
    $fetchEvent->execute();
    $eventList = $fetchEvent->get_result();

    if ($eventList->num_rows > 0) {
        $success = true;
    } else {
        $success = false;
        $message = "Event not found";
    }
    $eventList->close();

} else {
    $success = false;
    $message = "Error: No event id provided";
}
$conn->close();