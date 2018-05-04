<?php
/**
 * Created by PhpStorm.
 * User: clementdebailliencourt
 * Date: 5/1/18
 * Time: 11:28 AM
 */
session_start();
$id =   $_SESSION['id'];

$fname = isset($_POST["fname"])? $_POST["fname"] : "";
$lname = isset($_POST["lname"])? $_POST["lname"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";
$username = isset($_POST["username"])? $_POST["username"] : "";
$password = isset($_POST["password"])? $_POST["password"] : "";
$idSuppr = isset($_POST["suppress"])? $_POST["suppress"] : "";
$modify = isset($_POST["modify"])? $_POST["modify"] : "";


if($fname  != "")
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "meetece";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql1 = "SELECT IDuser FROM user WHERE IDuser = '$id' AND type = 'admin'";

    $result1 = $conn->query($sql1);

    if ($result1->num_rows > 0)
    {
        $sql = "INSERT INTO user (firstname, name, email, pseudo, password)
    VALUES ('$fname', '$lname', '$email', '$username', '$password');";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        if($idSuppr != "")
        {
            $idSuppr = intval($idSuppr);

          $sqlSuppr =  "DELETE FROM user WHERE IDuser = '$idSuppr'";

            if ($conn->query($sqlSuppr) === TRUE) {
                echo "User deleted";
            } else {
                echo "Error: " . $sqlSuppr . "<br>" . $conn->error;
            }
        }

        if($modify != "")
        {
            $idModify = intval($idModify);

            $sqlModify = "UPDATE user SET type = 'admin' WHERE IDuser = '$idModify' ";

            if ($conn->query($sqlModify) === TRUE)
            {
                echo "User modified";
            } else
                {
                echo "Error: " . $sqlModify . "<br>" . $conn->error;
            }

        }
    }

    else
    {
        $message = "YOU NEED TO BE ADMINISTRATOR TO ADD NEW USERS";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }


    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Website CSS style -->
    <link rel="stylesheet" type="text/css" href="../css/signup.css">

    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <title>Admin</title>

    <script>
        var error;
        var letters = new RegExp(/\D/g);
        var mail = new RegExp(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/g);
        function isEmpty(fname,lname,email,username,password,confirmation) {
            if(password != confirmation){
                error = "Your 2nd password does not correspond to the first one !";
            }


            else {
                if (fname=="")
                    error = "Your First name is empty\n";
                if (lname=="")
                    error += "Your Last name is empty\n";
                if (email=="")
                    error += "Your Email is empty\n";
                if (username=="")
                    error += "Your Username is empty\n";
                if (password=="")
                    error += "Your Password is empty\n";
                if (confirmation=="")
                    error += "Your Password confirmation  is empty";
            }
            if(error != "")
                alert(error);
        }
        function isCorrect(fname,lname,email) {
            if (!letters.test(fname))
                error = "Your First name must contain letters only\n";
            if (!letters.test(lname))
                error += "Your Last name must contain letters only\n";
            if (!mail.test(email))
                error += "Your Email is invalid\n";
            if(error != "")
                alert(error);
        }
        function verifyContent() {
            var fname = document.getElementById("fname").value;
            var lname = document.getElementById("lname").value;
            var email = document.getElementById("email").value;
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;
            var confirmation = document.getElementById("confirm").value;
            var suppress = document.getElementById("suppress").value;

            if(suppress != "") return true;

            error = "";
            isEmpty(fname,lname,email,username,password,confirmation) ;


            if(error=="")
                isCorrect(fname,lname,email);
            if(error == ""){
                return true;
            } else {
                return false;
            }
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
            <li ><a href="index.html">Home</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="signin.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>

    </div>
</nav>
<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">MeetECE</h1>
                <hr />
            </div>
        </div>
        <div class="main-login main-center">
            <form class="form-horizontal" method="post" onsubmit="return verifyContent();" action="signup.php">

                <div class="form-group">
                    <label for="fname" class="cols-sm-2 control-label">Your First Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="fname" id="fname"  placeholder="Enter your First Name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="lname" class="cols-sm-2 control-label">Your Last Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="lname" id="lname"  placeholder="Enter your Last Name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Your Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="cols-sm-2 control-label">Username</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Suppress Users (ADMINS ONLY DANGEROUS)</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="suppress" id="suppress"  placeholder="Enter ID to delete"/>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                        <label for="password" class="cols-sm-2 control-label">Modify users (ADMINS ONLY)</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="modify" id="modify"  placeholder="Enter ID to modify"/>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                </div>
                <div class="login-register">
                    <a href="signin.html">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="assets/js/bootstrap.js"></script>
</body>
</html>
