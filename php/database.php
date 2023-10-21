<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'ya';

// Create a database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    die("Database connection failed: " . mysqli_connect_error());
}
