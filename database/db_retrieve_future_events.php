<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db_connect.php';

$message = '';

if (isset($_SESSION['user_id']) && isset($_GET['d'])) {
    $user_id = $_SESSION['user_id'];
    $date = $_GET['d'];

    /** @noinspection PhpUndefinedVariableInspection */
    $fetchEvent = $conn->prepare(
        "SELECT event_id, name, date, start, end FROM events WHERE user_id = ? AND date > ? ORDER BY date"
    );
    $fetchEvent->bind_param('ii', $user_id, $date);
    $fetchEvent->execute();
    $eventList = $fetchEvent->get_result();

    if ($eventList) {
        while ($row = $eventList->fetch_assoc()) {
            $rows[] = $row;
        }
        $json['success'] = true;
        $json['events'] = $rows;
    } else {
        $json['success'] = false;
    }
    $fetchEvent->close();
} else {
    $json['success'] = false;
}
echo json_encode($json);
$conn->close();
