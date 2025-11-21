<?php

$host = "localhost";       // Database host
$user = "root";            // MySQL username (default: root in XAMPP/Laragon)
$pass = "";                // MySQL password (keep empty if none set)
$dbname = "maju_db"; // Database name

//  $host = "sql205.infintyfree.com";       // Database host
//  $user = "if0_39470013";            // MySQL username (default: root in XAMPP/Laragon)
//  $pass = "Jithin5163";                // MySQL password (keep empty if none set)
//  $dbname = "if0_39470013_maju_db"; // Database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: set charset to utf8
$conn->set_charset("utf8");
