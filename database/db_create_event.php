<?php
session_start();

if (!isset($_SESSION['id'])) return;
$id = $_SESSION['id'];

$name = $_POST['name'];
$date = $_POST['date'];
$start = $_POST['start-time'];
$end = $_POST['end-time'];
$location = $_POST['location'] ?? null;
$description = $_POST['description'] ?? null;

include 'db_connect.php';

/** @noinspection PhpUndefinedVariableInspection */
$new_entry = $conn->prepare("INSERT INTO events (id, name, date, start, end, location, description) 
                                   VALUES (?, ?, ?, ?, ?, ?, ?)");
$new_entry->bind_param("issssss",
    $id, $name, $date, $start, $end, $location, $description);

if ($new_entry->execute()) {
    header('Location: ..');
} else {
    $message = 'Error creating new event: ' . $conn->error;
};
$new_entry->close();
$conn->close();
