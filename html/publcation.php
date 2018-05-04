<?php

session_start();
$id =   $_SESSION['id'];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "meetece";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}


$pub =  $_GET['publish'];


$sql = "INSERT INTO publication (IDuser, text, photo, video, lieu, etat) 
VALUES ('$id','$pub' , 'NULL'  , 'NULL' , ' ' , '0');";


if ($conn->query($sql) === TRUE)
{
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



