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

$usr =  $_GET['username'];
$msg =  $_GET['msg'];

$sql = "SELECT * FROM user WHERE pseudo = '$usr'";

$result =  $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
    {
        $IDFriend = $row["IDuser"];
        $email = $row["email"];
        $photo = $row["photo"];
        $statute = $row["statue"];
        $job = $row["job_search"];
        $type = $row["type"];
        $username = $row["pseudo"];
        $name = $row["name"];
        $fname = $row["firstname"];
        $password = $row["password"];
        $photoBack = $row["photo_background"];
        $age = $row["age"];

    }
}

$sqlMessage = "INSERT INTO message (IDuser1, IDuser2, text) VALUES ('$id', '$IDFriend', '$msg');";


if ($conn->query($sqlMessage) === TRUE)
{
    echo "Message sent";
} else
    {
    echo "Error: " . $sqlMessage . "<br>" . $conn->error;
}

$sqlGetMessages = "SELECT * FROM message WHERE (IDuser1 =  '$id' OR IDuser2 = '$id')";

$result1 =  $conn->query($sql);


class message
{
    public $id1;
    public $id2;
    public $text;
    public $date;
}


$result2 = $conn->query($sqlGetMessages);

$array = array();
if ($result2->num_rows > 0)
{
    while($row2 = $result2->fetch_assoc())
    {

        $msg = new message();

        $msg->id1 = $row2["IDuser1"];
        $msg->id2 = $row2["IDuser2"];
        $msg->text = $row2["text"];
        $msg->date = $row2["date"];



        array_push($array, $msg);

    }
}



$message1 = $array[0]->text . " ".   $array[0]->date ;
$message2 = $array[1]->text . " ".   $array[1]->date ;
$message3 = $array[2]->text . " ".   $array[2]->date ;
$message4 = $array[3]->text . " ".   $array[3]->date ;

echo "<script>alert('$message1')</script>";
echo "<script>alert('$message2')</script>";
echo "<script>alert('$message3')</script>";
echo "<script>alert('$message4')</script>";


$id1 = $array[0]->id2;
$id2 = $array[1]->id2;
$id3 = $array[2]->id2;
$id4 = $array[3]->id2;

echo "<script>alert('$message1')</script>";
echo "<script>alert('$message2')</script>";
echo "<script>alert('$message3')</script>";
echo "<script>alert('$message4')</script>";


$sql1 = "SELECT * FROM user WHERE IDuser = '$id1'";
$sql2 = "SELECT * FROM user WHERE IDuser = '$id2'";
$sql3 = "SELECT * FROM user WHERE IDuser = '$id3'";
$sql4 = "SELECT * FROM user WHERE IDuser = '$id4'";


$result100 =  $conn->query($sql1);

if ($result100->num_rows > 0)
{
    // output data of each row
    while($row1 = $result100->fetch_assoc())
    {

        $username1 = $row1["pseudo"];

    }
}


$result101 =  $conn->query($sql2);

if ($result101->num_rows > 0)
{
    // output data of each row
    while($row2 = $result101->fetch_assoc())
    {

        $username2 = $row2["pseudo"];
        echo "<script>alert('$username2')</script>";


    }
}
$result102 =  $conn->query($sql3);

if ($result102->num_rows > 0)
{
    // output data of each row
    while($row3 = $result102->fetch_assoc())
    {

        $username3 = $row3["pseudo"];

    }
}
$result103 =  $conn->query($sql4);

if ($result103->num_rows > 0)
{
    // output data of each row
    while($row4 = $result103->fetch_assoc())
    {

        $username4 = $row4["pseudo"];
    }
}





$conn->close();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <link rel="stylesheet" type="text/css" href="profile.css">


<script type="text/javascript"  >
    var message1= "<?php Print($message1); ?>";
    var message2= "<?php Print($message2); ?>";
    var message3= "<?php Print($message3); ?>";
    var message4= "<?php Print($message4); ?>";
    var username1= "<?php Print($username1); ?>";
    var username2= "<?php Print($username2); ?>";
    var username3= "<?php Print($username3); ?>";
    var username4= "<?php Print($username4); ?>";

    window.onload = function()
    {
        document.getElementById("message1").innerHTML = message1;
        document.getElementById("message2").innerHTML = message2;
        document.getElementById("message3").innerHTML = message3;
        document.getElementById("message4").innerHTML = message4;
        document.getElementById("username1").innerHTML = username1;
        document.getElementById("username2").innerHTML = username2;
        document.getElementById("username3").innerHTML = username3;
        document.getElementById("username4").innerHTML = username4;

        alert(message1);
    }

</script>

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html">
                <img src="../img/ece_logo.png">
            </a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li class="active"><a href="profile.php">Profile</a></li>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="messenger.html">Messenger</a></li>
            <li><a href="network.html">Network</a></li>
            <li><a href="notification.html">Notifications</a></li>
        </ul>
        <form class="navbar-form navbar-left" action="/action_page.php">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="signin.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>

<div class="col-md-12 commentsblock border-top">
    <div class="media">
        <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>
        <div class="media-body">
            <h4 class="username1" name = "username1" id ="username1" type="text">
                <small><i class="fa fa-clock-o"></i> </small> </h4>
            <p class="text2"><label type="text" id="message1" name="message1" ></p>
        </div>
    </div>
</div>
<div class="col-md-12 commentsblock border-top">
    <div class="media">
        <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>
        <div class="media-body">
            <h4 class="username2" name = "username2" id ="username2" type="text">
                <small><i class="fa fa-clock-o"></i> </small> </h4>
            <p class="text2"><label type="text" id="message2" name="message2" ></p>
        </div>
    </div>
</div>
<div class="col-md-12 commentsblock border-top">
    <div class="media">
        <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>
        <div class="media-body">
            <h4 class="username3" name = "username3" id ="username3" type="text">
                <small><i class="fa fa-clock-o"></i> </small> </h4>
            <p class="text2"><label type="text" id="message3" name="message3" ></p>
        </div>
    </div>
</div>
<div class="col-md-12 commentsblock border-top">
    <div class="media">
        <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>
        <div class="media-body">
            <h4 class="username4" name = "username4" id ="username4" type="text">
                <small><i class="fa fa-clock-o"></i> </small> </h4>
            <p class="text2"><label type="text" id="message4" name="message4" ></p>
        </div>
    </div>
</div>
</body>
</html>