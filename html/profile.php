<?php
include('user.php');
include('publication.php');

session_start();
$id =   $_SESSION['id'];
$database = "meetece";
$host = 'localhost';
$login = 'root';
$passwordDTB = 'root';

$conn = new mysqli($host,$login,$passwordDTB,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user WHERE IDuser =  '$id'";
$sqlFriends = "SELECT t.* FROM user AS t INNER JOIN network AS tr ON (t.IDuser = tr.IDuser1 OR t.IDuser = tr.IDuser2) AND (tr.IDuser2 = '$id' OR tr.IDuser1 = '$id')";
$sqlPublication = "SELECT t.* FROM publication AS t INNER JOIN network AS tr ON (t.IDuser = tr.IDuser1 OR t.IDuser = tr.IDuser2) AND (tr.IDuser2 = '$id' OR tr.IDuser1 = '$id')";


$result =  $conn->query($sql);
$result1 = $conn->query($sqlFriends);
$result2 = $conn->query($sqlPublication);

$array = array();


if ($result1->num_rows > 0)
{
  while($row1 = $result1->fetch_assoc())
  {

         $user = new user;

        $user->id = $row1["IDuser"];
        $user->name = $row1["name"];
        $user->firstname = $row1["firstname"];
        $user->email = $row1["email"];
        $user->job_research = $row1["job_search"];
        $user->statue = $row1["statue"];
        $user->type  = $row1["type"];
        $user->pseudo = $row1["pseudo"];
        $user->age = $row1["age"];
        $user->photo = $row1["photo"];
        $user->photo_background = $row1["photo_background"];


      if($user->id != $id) array_push($array, $user);
  }
}

$numFriends = count($array) . " Friends" ;

$user1 = $array[0]->firstname . " ".   $array[0]->name ;
$user2 = $array[1]->firstname . " ".   $array[1]->name ;
$user3 = $array[2]->firstname . " ".   $array[2]->name ;
$user4 = $array[3]->firstname . " ".   $array[3]->name ;

$arrayPub = array();

if ($result2->num_rows > 0)
{

    while($row2 = $result2->fetch_assoc())
    {

        $pub = new publication;

        $pub->idPub = $row2["IDpublication"];
        $pub->idUsr = $row2["IDuser"];
        $pub->text = $row2["text"];
        $pub->photo = $row2["photo"];
        $pub->video = $row2["video"];
        $pub->lieu = $row2["lieu"];
        $pub->date = $row2["date"];
        $pub->etat = $row2["etat"];

        if($pub->idPub != $id) array_push($arrayPub, $pub);
    }
}

$lieu1 = $arrayPub[0]->lieu ;
$lieu2 = $arrayPub[1]->lieu ;
$lieu3 = $arrayPub[2]->lieu ;
$lieu4 = $arrayPub[3]->lieu ;

$text1 = $arrayPub[0]->text ;
$text2 = $arrayPub[1]->text ;
$text3 = $arrayPub[2]->text ;
$text4 = $arrayPub[3]->text ;

$desc1 = $arrayPub[0]->date . " " . $arrayPub[0]->lieu ;
$desc2 = $arrayPub[1]->date . " " . $arrayPub[1]->lieu ;
$desc3 = $arrayPub[2]->date . " " . $arrayPub[2]->lieu ;
$desc4 = $arrayPub[3]->date . " " . $arrayPub[3]->lieu ;

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc())
  {
      $ID = $row["IDuser"];
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

      var id= "<?php Print($ID); ?>";
      var email= "<?php Print($email); ?>";
      var statute= "<?php Print($statute); ?>";
      var job= "<?php Print($job); ?>";
      var type= "<?php Print($type); ?>";
      var username= "<?php Print($username); ?>";
      var name= "<?php Print($name); ?>";
      var fname= "<?php Print($fname); ?>";
      var password= "<?php Print($password); ?>";
      var photoBack= "<?php Print($photoBack); ?>";
      var age= "<?php Print($age); ?>";
      var nbFriends= "<?php Print($numFriends); ?>";
      var user1= "<?php Print($user1); ?>";
      var user2= "<?php Print($user2); ?>";
      var user3= "<?php Print($user3); ?>";
      var user4= "<?php Print($user4); ?>";
      var text1= "<?php Print($text1); ?>";
      var text2= "<?php Print($text2); ?>";
      var text3= "<?php Print($text3); ?>";
      var text4= "<?php Print($text4); ?>";
      var desc1= "<?php Print($desc1); ?>";
      var desc2= "<?php Print($desc2); ?>";
      var desc3= "<?php Print($desc3); ?>";
      var desc4= "<?php Print($desc4); ?>";




      window.onload = function()
      {
          document.getElementById("completeName").innerHTML = fname + " " + name;
          document.getElementById("details").innerHTML = "User: " + username + "   Mail: " + email;
          document.getElementById("numFriends").innerHTML = nbFriends;
          document.getElementById("username1").innerHTML = user1;
          document.getElementById("username2").innerHTML = user2;
          document.getElementById("username3").innerHTML = user3;
          document.getElementById("username4").innerHTML = user4;
          document.getElementById("text1").innerHTML = text1;
          document.getElementById("text2").innerHTML = text2;
          document.getElementById("text3").innerHTML = text3;
          document.getElementById("text4").innerHTML = text4;
          document.getElementById("desc1").innerHTML = desc1;
          document.getElementById("desc2").innerHTML = desc2;
          document.getElementById("desc3").innerHTML = desc3;
          document.getElementById("desc4").innerHTML = desc4;
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
          <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="signin.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>

  </div>
</nav>


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
  <div class="row">
      <div class="col-md-12 text-center ">
          <div class="panel panel-default">
              <div class="userprofile social ">
                  <div class="userpic"> <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" class="userpicimg"> </div>
                  <h3 class="username"><label type="text" id="completeName" name="completeName" ></h3>
                  <label type="text" id="details" name="details" >
                  <div class="socials tex-center"> <a href="" class="btn btn-circle btn-primary ">
                          <i class="fa fa-facebook"></i></a> <a href="" class="btn btn-circle btn-danger ">
                          <i class="fa fa-google-plus"></i></a> <a href="" class="btn btn-circle btn-info ">
                          <i class="fa fa-twitter"></i></a> <a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope"></i></a>
                  </div>
              </div>
              <div class="col-md-12 border-top border-bottom">
                  <ul class="nav nav-pills pull-left countlist" role="tablist">
                      <li role="presentation" >
                          <h3 class="userFriends"><label type="text" id="numFriends" name="numFriends" >
                          </h3>
                      </li>
                  </ul>
                  <button class="btn btn-primary followbtn">Follow</button>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
      <!-- /.col-md-12 -->
      <div class="col-md-4 col-sm-12 pull-right">
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h1 class="page-header small">Personal Details</h1>
                  <p class="page-subtitle small">
                  </p>
              </div>
              <div class="col-md-12 photolist">
                  <div class="row">
                      <div class="col-sm-3 col-xs-3"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="" alt=""> </div>
                      <div class="col-sm-3 col-xs-3"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="" alt=""> </div>
                      <div class="col-sm-3 col-xs-3"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="" alt=""> </div>
                      <div class="col-sm-3 col-xs-3"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="" alt=""> </div>
                  </div>
              </div>
              <div class="clearfix"></div>
          </div>
          <div class="panel panel-default">
              <div class="panel-heading">
                  <h1 class="page-header small">Worked with many domain</h1>
                  <p class="page-subtitle small">Like to work fr different business</p>
              </div>
              <div class="col-md-12">
                  <ul class="list-group">
                      <li class="list-group-item"><span class="fa fa-male"></span> Worked with 1000+ people</li>
                      <li class="list-group-item"><span class="fa fa-institution"></span> 60+ offices</li>
                      <li class="list-group-item"><span class="fa fa-user"></span> 50000+ satify customers</li>
                      <li class="list-group-item"><span class="fa fa-clock-o"></span> Work hours many and many still counting</li>
                      <li class="list-group-item"><span class="fa fa-heart"></span> Customer satisfaction for servics</li>
                  </ul>
              </div>
              <div class="clearfix"></div>
          </div>

          <div class="panel panel-default">
              <div class="col-md-12">
                  <div class="memberblock"> <a href="" clss="member"> <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                      </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                          <div class="username1"><label type="text" id="username1" name="username1" ></div>
                      </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                          <div class="username2"><label type="text" id="username2" name="username2" ></div>
                      </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                          <div class="memmbername">Chandra Amin</div>
                          <div class="username3"><label type="text" id="username3" name="username3" ></div>
                          <div class="memmbername">John Sriram</div>
                      </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                          <div class="username4"><label type="text" id="username4" name="username4" ></div>
                      </a> </div>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
      <div class="col-md-8 col-sm-12 pull-left posttimeline">
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="status-upload nopaddingbtm">
                      <form method="get" action = "publcation.php">
                          <textarea class="form-control" placeholder="What are you doing right now?" name="publish" id="publish"> </textarea>
                          <br>
                          <ul class="nav nav-pills pull-left ">
                              <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="glyphicon glyphicon-bullhorn"></i></a></li>
                              <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class=" glyphicon glyphicon-facetime-video"></i></a></li>
                              <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="glyphicon glyphicon-picture"></i></a></li>
                          </ul>
                          <input type="submit"  value="Share" />
                      </form>
                  </div>
                  <!-- Status Upload  -->
              </div>
          </div>
          <div class="panel panel-default">
              <div class="btn-group pull-right postbtn">
                  <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class="dots"></span> </button>
                  <ul class="dropdown-menu pull-right" role="menu">
                      <li><a href="javascript:void(0)">Hide this</a></li>
                      <li><a href="javascript:void(0)">Report</a></li>
                  </ul>
              </div>
              <div class="col-md-12">
                  <div class="media">
                      <div class="media-left"> <a href="javascript:void(0)"> <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="" class="media-object"> </a> </div>
                      <div class="media-body">
                          <h4 class="desc1" name = "desc1" id ="desc1" type="text">
                              <small><i class="fa fa-clock-o"></i> </small> </h4>
                          <p class="text1"><label type="text" id="text1" name="text1" ></p>

                          <ul class="nav nav-pills pull-left ">
                              <li><a href="" title=""><i class="glyphicon glyphicon-thumbs-up"></i> 2015</a></li>
                              <li><a href="" title=""><i class=" glyphicon glyphicon-comment"></i> 25</a></li>
                              <li><a href="" title=""><i class="glyphicon glyphicon-share-alt"></i> 15</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-md-12 commentsblock border-top">
                  <div class="media">
                      <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>
                      <div class="media-body">
                          <h4 class="desc1" name = "desc2" id ="desc2" type="text">
                              <small><i class="fa fa-clock-o"></i> </small> </h4>
                          <p class="text2"><label type="text" id="text2" name="text2" ></p>
                      </div>
                  </div>
              </div>
              <div class="col-md-12 commentsblock border-top">
                  <div class="media">
                      <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>
                      <div class="media-body">
                          <h4 class="desc1" name = "desc4" id ="desc4" type="text">Lucky Sans<br>
                              <small><i class="fa fa-clock-o"></i> </small> </h4>
                          <p class="text2"><label type="text" id="text4" name="text4" ></p>
                      </div>
                  </div>

                  <div class="media">
                      <div class="media-left"> <a href="javascript:void(0)"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object"> </a> </div>
                      <div class="media-body">
                          <h4 class="desc3" name = "desc3" id ="desc3" type="text"><br>
                              <small><i class="fa fa-clock-o"></i> </small> </h4>
                          <p class="text3"><label type="text" id="text3" name="text3" ></p></div>
                  </div>
              </div>
          </div>
          <div class="panel panel-default">
              <div class="btn-group pull-right postbtn">
                  <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class="dots"></span> </button>
                  <ul class="dropdown-menu pull-right" role="menu">
                      <li><a href="javascript:void(0)">Hide this</a></li>
                      <li><a href="javascript:void(0)">Report</a></li>
                  </ul>
              </div>
              <div class="col-md-12">
                  <div class="media">
                      <div class="media-left"> <a href="javascript:void(0)"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object"> </a> </div>
                      <div class="media-body">
                          <ul class="nav nav-pills pull-left ">
                              <li><a href="" title=""><i class="glyphicon glyphicon-thumbs-up"></i> 2015</a></li>
                              <li><a href="" title=""><i class=" glyphicon glyphicon-comment"></i> 25</a></li>
                              <li><a href="" title=""><i class="glyphicon glyphicon-share-alt"></i> 15</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
              <div class="col-md-12 border-top">
              </div>
          </div>
          <div class="panel panel-default">
              <div class="btn-group pull-right postbtn">
                  <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class="dots"></span> </button>
                  <ul class="dropdown-menu pull-right" role="menu">
                      <li><a href="javascript:void(0)">Hide this</a></li>
                      <li><a href="javascript:void(0)">Report</a></li>
                  </ul>
              </div>

          </div>
          <div class="panel panel-default">
              <div class="btn-group pull-right postbtn">
                  <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class="dots"></span> </button>
                  <ul class="dropdown-menu pull-right" role="menu">
                      <li><a href="javascript:void(0)">Hide this</a></li>
                      <li><a href="javascript:void(0)">Report</a></li>
                  </ul>
              </div>
          </div>
          <div class="panel panel-default">
              <div class="btn-group pull-right postbtn">
                  <button type="button" class="dotbtn dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> <span class="dots"></span> </button>
                  <ul class="dropdown-menu pull-right" role="menu">
                      <li><a href="javascript:void(0)">Hide this</a></li>
                      <li><a href="javascript:void(0)">Report</a></li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</div>
</body>
</html>