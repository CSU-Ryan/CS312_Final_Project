<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Event Creator</title>
    <meta name="author" content="Ryan Grimm">
    <meta name="description" content="Event creator for personal calendar.">

    <meta charset="UTF-8">
    <base href="/~enderbro/CS312_Final_Project/">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>

<?php
    include "../statics/navigation.php";

    include 'form.php';
?>

</body>
</html>
