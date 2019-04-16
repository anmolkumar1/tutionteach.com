<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "abcd2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT Firstname, Lastname,fees structure, batches time, contantno FROM detail ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["Firstname"]. " - Name: ". $row["Lastname"]. " " . $row["fees structure"] . $row["batches time"]. $row["contact no"] "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?> 
