<?php

session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "meetece";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "successfull connexion";
// username and password sent from form


$myusername = $_POST['email'];
$mypassword = $_POST['password'];


$sql = "SELECT IDuser FROM user WHERE email = '$myusername' AND password = '$mypassword'";

echo $sql;

$result = $conn->query($sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active'];
$ID = $row["IDuser"];

$count = mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1) {
    $_SESSION['login_user'] = $myusername;
    $_SESSION['id'] = $ID;
    echo "success";

    header('Location: profile.php');
}

else
{
    echo "Your Login Name or Password is invalid";
}

?>