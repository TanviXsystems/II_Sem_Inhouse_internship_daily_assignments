<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "student_auth";

$link = mysqli_connect($host, $user, $password, $database);

if (!$link) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

?>