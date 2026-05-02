<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db_connect.php';

$message = '';

if (isset($_SESSION['user_id']) && isset($_GET['event_id'])) {
    $user_id = $_SESSION['user_id'];
    $event_id = $_GET['event_id'];

    $fetchEvent = $conn->prepare("SELECT (name, date, start, end, location, description) FROM events WHERE user_id = ? AND event_id = ?");
    $fetchEvent->bind_param('ii', $user_id, $event_id);
    $fetchEvent->execute();
    $fetchEvent->store_result();

    if ($fetchEvent->num_rows > 0) {
        $success = true;
        $fetchEvent->bind_result($name, $date, $start, $end, $location, $description);
    } else {
        $success = false;
        $message = "Event not found";
    }
} else {
    $success = false;
    $message = "Error: No event id provided";
}