<?php
//This is an exercise about how to connect to a database using php

$servername = "localhost";
$username = "username";
$password = "password";
$dbName = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";