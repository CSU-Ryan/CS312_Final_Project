<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$message = '';

$delete_event = $_POST['delete_event'] ?? false;
if ($delete_event) {

    include 'db_connect.php';

    if (isset($_SESSION['user_id']) && isset($_GET['event_id'])) {
        $user_id = $_SESSION['user_id'];
        $event_id = $_GET['event_id'];

        /** @noinspection PhpUndefinedVariableInspection */
        $deleteEvent = $conn->prepare("DELETE FROM events WHERE user_id = ? AND event_id = ?");
        $deleteEvent->bind_param('ii', $user_id, $event_id);
        $deleteEvent->execute();

        if ($deleteEvent->num_rows > 0) {
            $message = "Event successfully deleted";
            header("location: ../index.php");
        } else {
            $message = "Error: Event does not exist";
        }
        $deleteEvent->close();

    } else {
        $message = "Error: No event id provided";
    }
    $conn->close();
}
