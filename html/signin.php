<?php

session_start();

define('DB_ADRESS', 'localhost:8889');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'meetece');

$db = mysqli_connect(DB_ADRESS,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// username and password sent from form

$myusername = mysqli_real_escape_string($db,$_POST['email']);
$mypassword = mysqli_real_escape_string($db,$_POST['password']);

$sql = "SELECT IDuser FROM user WHERE email = '$myusername' AND password = '$mypassword'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active'];
$ID = $row["IDuser"];

$count = mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1) {
    $_SESSION['login_user'] = $myusername;
    $_SESSION['id'] = $ID;


    header('Location: profile.php');
}

else
{
    $error = "Your Login Name or Password is invalid";
}

?>