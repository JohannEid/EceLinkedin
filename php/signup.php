<?php
/**
 * Created by PhpStorm.
 * User: clementdebailliencourt
 * Date: 5/1/18
 * Time: 11:28 AM
 */

$fname = isset($_POST["fname"])? $_POST["fname"] : "";
$lname = isset($_POST["lname"])? $_POST["lname"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$username = isset($_POST["username"])? $_POST["username"] : "";
$password = isset($_POST["password"])? $_POST["password"] : "";


$database = "meetece";
$host = '127.0.0.1:8889';
$login = 'root';
$passwordDTB = 'root';

$conn = new mysqli($host,$login,$passwordDTB,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO user (firstname, name, email, pseudo, password)
VALUES ($fname, $lname, $email, $username, $password)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
