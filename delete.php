<?php


$servername = "localhost";
$username = "root";
$password = "";
$db = "erp";
// Create connection
$connn = new mysqli($servername, $username, $password,$db);
$id = $_GET['id'];


$sql = "DELETE FROM user WHERE id='$id'";
if ($connn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $connn->error;
}

  ?>