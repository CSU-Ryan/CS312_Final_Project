<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'db_connect.php';

$message = '';

if (isset($_SESSION['user_id']) && isset($_GET['d'])) {
    $user_id = $_SESSION['user_id'];
    $date = $_GET['d'];
    $month = explode('-', $date)[1];

    /** @noinspection PhpUndefinedVariableInspection */
    $fetchEvent = $conn->prepare("SELECT event_id name, date, start, end FROM events WHERE user_id = ? AND MONTH(date) = ?");
    $fetchEvent->bind_param('ii', $user_id, $month);
    $fetchEvent->execute();
    $eventList = $fetchEvent->get_result();

    if ($eventList) {
        $rows['success'] = true;
        while ($row = $eventList->fetch_assoc()) {
            $rows[] = $row;
        }
    } else {
        $rows['success'] = false;
    }
    echo json_encode($rows);
    $fetchEvent->close();

} else {
    $rows['success'] = false;
    echo json_encode($rows);
}
$conn->close();
