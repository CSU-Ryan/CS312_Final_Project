<?php
$message = '';

function validTimeRange($startTime, $endTime): bool
{
    $startTime = strtotime($startTime);
    $endTime = strtotime($endTime);
    return $endTime > $startTime;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!validTimeRange($_POST['start-time'], $_POST['end-time'])) {
        $message = 'Error: Event must start before it ends.';
    } else {
        include '../database/db_create_event.php';
    }
}