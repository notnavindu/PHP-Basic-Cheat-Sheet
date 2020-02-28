<!DOCTYPE html>
<html>
<body>



<?php

//Get data from the form
$id = $_GET["id"];
$name = $_GET["name"];
$email = $_GET["email"];

$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "testdb"; 

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


//Check connection
if ($conn->connect_error) {
    die("Connection failed: " .  $conn->connect_error);
}

$sql = "INSERT INTO testtable(id,name,email) VALUES ('$id', '$name', '$email')";

//run the SQL Query and check if it was successful
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>


</body>
</html>
