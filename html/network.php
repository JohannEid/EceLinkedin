<?php
include 'jobsC.php';

session_start();
$id = $_SESSION['id'];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "meetece";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user";

$sqlFriends = "SELECT t.* FROM user AS t INNER JOIN network AS tr ON (t.IDuser = tr.IDuser1 OR t.IDuser = tr.IDuser2) AND (tr.IDuser2 = '$id' OR tr.IDuser1 = '$id')";

$result = $conn->query($sql);
$resultFriends = $conn->query($sqlFriends);

$num = $result->num_rows;

$arrayFriends = array();
$arrayUsers = array();

class user
{
    public $id;
    public $name;
    public $firstname;
    public $email;
    public $photo;
    public $photo_background;
    public $statue;
    public $job_research;
    public $type;
    public $pseudo;
    public $age;
    public $amigo;
    public $msgAjout;

}

if ($resultFriends->num_rows > 0) {

    while ($rowFriends = $resultFriends->fetch_assoc()) {

        $user = new user;

        $user->id = $rowFriends["IDuser"];
        $user->name = $rowFriends["name"];
        $user->firstname = $rowFriends["firstname"];
        $user->email = $rowFriends["email"];
        $user->job_research = $rowFriends["job_search"];
        $user->statue = $rowFriends["statue"];
        $user->type = $rowFriends["type"];
        $user->pseudo = $rowFriends["pseudo"];
        $user->age = $rowFriends["age"];
        $user->photo = $rowFriends["photo"];
        $user->photo_background = $rowFriends["photo_background"];

        if ($user->id != $id) {
            array_push($arrayFriends, $user);
        }
    }
}

$numFriends = count($arrayFriends);

$user0 = $arrayFriends[0]->firstname . " " . $arrayFriends[0]->name;
$user1 = $arrayFriends[1]->firstname . " " . $arrayFriends[1]->name;
$user2 = $arrayFriends[2]->firstname . " " . $arrayFriends[2]->name;
$user3 = $arrayFriends[3]->firstname . " " . $arrayFriends[3]->name;
$user4 = $arrayFriends[4]->firstname . " " . $arrayFriends[4]->name;
$user5 = $arrayFriends[5]->firstname . " " . $arrayFriends[5]->name;
$user6 = $arrayFriends[6]->firstname . " " . $arrayFriends[6]->name;
$user7 = $arrayFriends[7]->firstname . " " . $arrayFriends[7]->name;
$user8 = $arrayFriends[8]->firstname . " " . $arrayFriends[8]->name;

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $user = new user;

        $user->id = $row["IDuser"];
        $user->name = $row["name"];
        $user->firstname = $row["firstname"];
        $user->email = $row["email"];
        $user->job_research = $row["job_search"];
        $user->statue = $row["statue"];
        $user->type = $row["type"];
        $user->pseudo = $row["pseudo"];
        $user->age = $row["age"];
        $user->photo = $row["photo"];
        $user->photo_background = $row["photo_background"];
        $user->amigo = false;
        $user->$msgAjout = "Ajouter";

        if ($user->id != $id) {
            array_push($arrayUsers, $user);
        }
    }
}

$user0 = $arrayUsers[0]->firstname . " " . $arrayUsers[0]->name;
$user1 = $arrayUsers[1]->firstname . " " . $arrayUsers[1]->name;
$user2 = $arrayUsers[2]->firstname . " " . $arrayUsers[2]->name;
$user3 = $arrayUsers[3]->firstname . " " . $arrayUsers[3]->name;
$user4 = $arrayUsers[4]->firstname . " " . $arrayUsers[4]->name;
$user5 = $arrayUsers[5]->firstname . " " . $arrayUsers[5]->name;
$user6 = $arrayUsers[6]->firstname . " " . $arrayUsers[6]->name;
$user7 = $arrayUsers[7]->firstname . " " . $arrayUsers[7]->name;
$user8 = $arrayUsers[8]->firstname . " " . $arrayUsers[8]->name;

for ($i = 0; $i < $num; $i++) {

    for ($j = 0; $j < $numFriends; $j++) {

        if (strcmp($arrayUsers[$i]->id, $arrayFriends[$j]->id) == 0) {
            $arrayUsers[$i]->amigo = true;
            $arrayUsers[$i]->msgAjout = "Supprimer";
        } else {
            $arrayUsers[$i]->msgAjout = "Ajouter";
        }
    }
}

$_SESSION['arrayUse'] = $arrayUsers;


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


        <link rel="stylesheet" type="text/css" href="network.css">

        <script>
            /* Demo purposes only */
            $(".hover").mouseleave(
                function () {
                    $(this).removeClass("hover");
                }
            );


        </script>

        <script type="text/javascript">

            var msg = new Array(
                "<?php print($arrayUsers[0]->msgAjout);?>",
                "<?php print($arrayUsers[1]->msgAjout);?>",
                "<?php print($arrayUsers[2]->msgAjout);?>",
                "<?php print($arrayUsers[3]->msgAjout);?>",
                "<?php print($arrayUsers[4]->msgAjout);?>",
                "<?php print($arrayUsers[5]->msgAjout);?>",
                "<?php print($arrayUsers[6]->msgAjout);?>",
                "<?php print($arrayUsers[7]->msgAjout);?>",
                "<?php print($arrayUsers[8]->msgAjout);?>"
            );

            var amigo = new Array(
                "<?php print($arrayUsers[0]->amigo);?>",
                "<?php print($arrayUsers[1]->amigo);?>",
                "<?php print($arrayUsers[2]->amigo);?>",
                "<?php print($arrayUsers[3]->amigo);?>",
                "<?php print($arrayUsers[4]->amigo);?>",
                "<?php print($arrayUsers[5]->amigo);?>",
                "<?php print($arrayUsers[6]->amigo);?>",
                "<?php print($arrayUsers[7]->amigo);?>",
                "<?php print($arrayUsers[8]->amigo);?>"
            );

            //je gere tous les amis

            function estaAmigo(k){
                if(amigo[k]==1){
                    amigo[k] = 0;
                    msg[k] = "Ajouter";

                    if(k == 0){
                        document.write(' <?php supprimer0();?> ');
                    }
                    if(k == 1){
                        document.write(' <?php supprimer1();?> ');
                    }
                    if(k == 2){
                        document.write(' <?php supprimer2();?> ');
                    }
                    if(k == 3){
                        document.write(' <?php supprimer3();?> ');
                    }
                    if(k == 4){
                        document.write(' <?php supprimer4();?> ');
                    }
                    if(k == 5){
                        document.write(' <?php supprimer5();?> ');
                    }
                    if(k == 6){
                        document.write(' <?php supprimer6();?> ');
                    }
                    if(k ==7){
                        document.write(' <?php supprimer7();?> ');
                    }
                    if(k == 8){
                        document.write(' <?php supprimer8();?> ');
                    }

                } else {
                    amigo[k] = 1;
                    msg[k] = "Supprimer";

                    if(k == 0){
                        document.write(' <?php ajouter0();?> ');
                    }
                    if(k == 1){
                        document.write(' <?php ajouter1();?> ');
                    }
                    if(k == 2){
                        document.write(' <?php ajouter2();?> ');
                    }
                    if(k == 3){
                        document.write(' <?php ajouter3();?> ');
                    }
                    if(k == 4){
                        document.write(' <?php ajouter4();?> ');
                    }
                    if(k == 5){
                        document.write(' <?php ajouter5();?> ');
                    }
                    if(k == 6){
                        document.write(' <?php ajouter6();?> ');
                    }
                    if(k ==7){
                        document.write(' <?php ajouter7();?> ');
                    }
                    if(k == 8){
                        document.write(' <?php ajouter8();?> ');
                    }

                }

                document.getElementById(k).innerHTML = msg[k];
            }


            $(document).ready(function() {

                var str0 = "";
                var str1 = "";
                var str2 = "";
                var str3 = "";
                var str4 = "";
                var str5 = "";
                var str6 = "";
                var str7 = "";
                var str8 = "";


                str0 = str0 +   '<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample6.jpg" alt="profile-sample6" />'
                    +   '<figcaption>'
                    +   '<h3>'+ "<?php print($user0);?>" +'</h3>'
                    +   '<div class="icons"><a href="#"><i class="ion-social-twitter"></i></a>'
                    +   '<a href="#"> <button type="button" onclick="estaAmigo(0)"><label type="text" id="0" name="0" ></button></a>'
                    +   '</div>'
                    +   '</figcaption>';

                str1 = str1 +   '<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample6.jpg" alt="profile-sample6" />'
                    +   '<figcaption>'
                    +   '<h3>'+ "<?php print($user1);?>" +'</h3>'
                    +   '<div class="icons"><a href="#"><i class="ion-social-twitter"></i></a>'
                    +   '<a href="#"> <button type="button" onclick="estaAmigo(1)"><label type="text" id="1" name="1" ></button></a>'
                    +   '</div>'
                    +   '</figcaption>';

                str2 = str2 +   '<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample6.jpg" alt="profile-sample6" />'
                    +   '<figcaption>'
                    +   '<h3>'+ "<?php print($user2);?>" +'</h3>'
                    +   '<div class="icons"><a href="#"><i class="ion-social-twitter"></i></a>'
                    +   '<a href="#"> <button type="button" onclick="estaAmigo(2)"><label type="text" id="2" name="2" ></button></a>'
                    +   '</div>'
                    +   '</figcaption>';

                str3 = str3 +   '<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample6.jpg" alt="profile-sample6" />'
                    +   '<figcaption>'
                    +   '<h3>'+ "<?php print($user3);?>" +'</h3>'
                    +   '<div class="icons"><a href="#"><i class="ion-social-twitter"></i></a>'
                    +   '<a href="#"> <button type="button" onclick="estaAmigo(3)"><label type="text" id="3" name="3" ></button></a>'
                    +   '</div>'
                    +   '</figcaption>';

                str4 = str4 +   '<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample6.jpg" alt="profile-sample6" />'
                    +   '<figcaption>'
                    +   '<h3>'+ "<?php print($user4);?>" +'</h3>'
                    +   '<div class="icons"><a href="#"><i class="ion-social-twitter"></i></a>'
                    +   '<a href="#"> <button type="button" onclick="estaAmigo(4)"><label type="text" id="4" name="4" ></button></a>'
                    +   '</div>'
                    +   '</figcaption>';

                str5 = str5 +   '<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample6.jpg" alt="profile-sample6" />'
                    +   '<figcaption>'
                    +   '<h3>'+ "<?php print($user5);?>" +'</h3>'
                    +   '<div class="icons"><a href="#"><i class="ion-social-twitter"></i></a>'
                    +   '<a href="#"> <button type="button" onclick="estaAmigo(5)"><label type="text" id="5" name="5" ></button></a>'
                    +   '</div>'
                    +   '</figcaption>';

                str6 = str6 +   '<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample6.jpg" alt="profile-sample6" />'
                    +   '<figcaption>'
                    +   '<h3>'+ "<?php print($user6);?>" +'</h3>'
                    +   '<div class="icons"><a href="#"><i class="ion-social-twitter"></i></a>'
                    +   '<a href="#"> <button type="button" onclick="estaAmigo(6)"><label type="text" id="6" name="6" ></button></a>'
                    +   '</div>'
                    +   '</figcaption>';

                str7 = str7 +   '<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample6.jpg" alt="profile-sample6" />'
                    +   '<figcaption>'
                    +   '<h3>'+ "<?php print($user7);?>" +'</h3>'
                    +   '<div class="icons"><a href="#"><i class="ion-social-twitter"></i></a>'
                    +   '<a href="#"> <button type="button" onclick="estaAmigo(7)"><label type="text" id="7" name="7" ></button></a>'
                    +   '</div>'
                    +   '</figcaption>';

                str8 = str8 +   '<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/profile-sample6.jpg" alt="profile-sample6" />'
                    +   '<figcaption>'
                    +   '<h3>'+ "<?php print($user8);?>" +'</h3>'
                    +   '<div class="icons"><a href="#"><i class="ion-social-twitter"></i></a>'
                    +   '<a href="#"> <button type="button" onclick="estaAmigo(8)"><label type="text" id="8" name="8" ></button></a>'
                    +   '</div>'
                    +   '</figcaption>';


                $("#foo0").html(str0);
                $("#foo1").html(str1);
                $("#foo2").html(str2);
                $("#foo3").html(str3);
                $("#foo4").html(str4);
                $("#foo5").html(str5);
                $("#foo6").html(str6);
                $("#foo7").html(str7);
                $("#foo8").html(str8);

                //Initialisation des valeurs des boutons
                document.getElementById('0').innerHTML = msg[0];
                document.getElementById('1').innerHTML = msg[1];
                document.getElementById('2').innerHTML = msg[2];
                document.getElementById('3').innerHTML = msg[3];
                document.getElementById('4').innerHTML = msg[4];
                document.getElementById('5').innerHTML = msg[5];
                document.getElementById('6').innerHTML = msg[6];
                document.getElementById('7').innerHTML = msg[7];
                document.getElementById('8').innerHTML = msg[8];



            });



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
                <li><a href="profile.php">Profile</a></li>
                <li><a href="jobs.php">Jobs</a></li>
                <li><a href="messenger.html">Messenger</a></li>
                <li class="active"><a href="network.php">Network</a></li>
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
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="signin.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>

        </div>
    </nav>


    <figure class="snip1578 hover"> <div id="foo0"></div> </figure>
    <figure class="snip1578 hover"> <div id="foo1"></div> </figure>
    <figure class="snip1578 hover"> <div id="foo2"></div> </figure>
    <figure class="snip1578 hover"> <div id="foo3"></div> </figure>
    <figure class="snip1578 hover"> <div id="foo4"></div> </figure>
    <figure class="snip1578 hover"> <div id="foo5"></div> </figure>
    <figure class="snip1578 hover"> <div id="foo6"></div> </figure>
    <figure class="snip1578 hover"> <div id="foo7"></div> </figure>
    <figure class="snip1578 hover"> <div id="foo8"></div> </figure>



    </body>
    </html>

<?php

function supprimer0()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[0]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "DELETE FROM network WHERE (IDuser1 = '$idSupr' OR IDuser2 = '$idSupr') AND (IDuser1 = '$id' OR IDuser2 = '$id')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function supprimer1()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[1]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "DELETE FROM network WHERE (IDuser1 = '$idSupr' OR IDuser2 = '$idSupr') AND (IDuser1 = '$id' OR IDuser2 = '$id')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function supprimer2()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[2]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "DELETE FROM network WHERE (IDuser1 = '$idSupr' OR IDuser2 = '$idSupr') AND (IDuser1 = '$id' OR IDuser2 = '$id')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function supprimer3()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[3]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "DELETE FROM network WHERE (IDuser1 = '$idSupr' OR IDuser2 = '$idSupr') AND (IDuser1 = '$id' OR IDuser2 = '$id')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function supprimer4()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[4]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "DELETE FROM network WHERE (IDuser1 = '$idSupr' OR IDuser2 = '$idSupr') AND (IDuser1 = '$id' OR IDuser2 = '$id')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function supprimer5()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[5]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "DELETE FROM network WHERE (IDuser1 = '$idSupr' OR IDuser2 = '$idSupr') AND (IDuser1 = '$id' OR IDuser2 = '$id')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);
    $conn1->close();

}

function supprimer6()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[6]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "DELETE FROM network WHERE (IDuser1 = '$idSupr' OR IDuser2 = '$idSupr') AND (IDuser1 = '$id' OR IDuser2 = '$id')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function supprimer7()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[7]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "DELETE FROM network WHERE (IDuser1 = '$idSupr' OR IDuser2 = '$idSupr') AND (IDuser1 = '$id' OR IDuser2 = '$id')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function supprimer8()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[8]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "DELETE FROM network WHERE (IDuser1 = '$idSupr' OR IDuser2 = '$idSupr') AND (IDuser1 = '$id' OR IDuser2 = '$id')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function ajouter0()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[0]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "INSERT INTO network (IDuser1, IDuser2) VALUES ('$id', '$idSupr')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function ajouter1()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[1]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "INSERT INTO network (IDuser1, IDuser2) VALUES ('$id', '$idSupr')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function ajouter2()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[2]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "INSERT INTO network (IDuser1, IDuser2) VALUES ('$id', '$idSupr')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->close();

}

function ajouter3()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[3]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "INSERT INTO network (IDuser1, IDuser2) VALUES ('$id', '$idSupr')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function ajouter4()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[4]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "INSERT INTO network (IDuser1, IDuser2) VALUES ('$id', '$idSupr')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function ajouter5()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[5]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "INSERT INTO network (IDuser1, IDuser2) VALUES ('$id', '$idSupr')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function ajouter6()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[6]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "INSERT INTO network (IDuser1, IDuser2) VALUES ('$id', '$idSupr')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function ajouter7()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[7]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "INSERT INTO network (IDuser1, IDuser2) VALUES ('$id', '$idSupr')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}

function ajouter8()
{
    $id = $_SESSION['id'];
    $arrayUsers = $_SESSION['arrayUse'];

    $idSupr = $arrayUsers[8]->id;

    $database = "meetece";
    $host = '127.0.0.1:8889';
    $login = 'root';
    $passwordDTB = 'root';

    $sql = "INSERT INTO network (IDuser1, IDuser2) VALUES ('$id', '$idSupr')";

    $conn1 = new mysqli($host, $login, $passwordDTB, $database);

    $conn1->query($sql);

    $conn1->close();

}
?>