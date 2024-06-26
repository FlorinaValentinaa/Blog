<?php

$servername = "localhost:3307";
$dbUsername = "root";
$dbPassword = "";
$dbName = "blog";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}