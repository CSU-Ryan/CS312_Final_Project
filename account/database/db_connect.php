<?php
$server = 'helmi.cs.colostate.edu';
$database = 'enderbro';
$username = 'enderbro';
$password = 'seltzer-estrogen-quickly';

$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
