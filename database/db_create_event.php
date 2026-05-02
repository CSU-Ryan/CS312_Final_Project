<?php

function get_next_event_id($conn, $user_id) {
    $fetchMaxId = $conn->query("SELECT MAX(event_id) FROM events WHERE user_id = ?");
    $fetchMaxId->bind_param('i', $user_id);
    $fetchMaxId->execute();
    $fetchMaxId->store_result();

    if ($fetchMaxId->num_rows > 0) {
        return intval($fetchMaxId->fetch()) + 1;
    } else {
        return 1;
    }
}

session_start();

if (!isset($_SESSION['user_id'])) return;
include 'db_connect.php';

$user_id = $_SESSION['user_id'];
$event_id = get_next_event_id($conn, $user_id);
$name = $_POST['name'];
$date = $_POST['date'];
$start = $_POST['start-time'];
$end = $_POST['end-time'];
$location = $_POST['location'] ?? null;
$description = $_POST['description'] ?? null;


/** @noinspection PhpUndefinedVariableInspection */
$new_entry = $conn->prepare("INSERT INTO events (user_id, event_id, name, date, start, end, location, description) 
                                   VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$new_entry->bind_param("issssss",
    $user_id, $event_id, $name, $date, $start, $end, $location, $description);

if ($new_entry->execute()) {
    header('Location: ..');
} else {
    $message = 'Error creating new event: ' . $conn->error;
};
$new_entry->close();
$conn->close();
