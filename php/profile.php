<?php
session_start();
$id =   $_SESSION['id'];
$database = "meetece";
$host = '127.0.0.1:8889';
$login = 'root';
$passwordDTB = 'root';

$conn = new mysqli($host,$login,$passwordDTB,$database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user WHERE IDuser =  '$id'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
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


} else {

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


    <script type="text/javascript" >

        var id= "<?php Print($ID); ?>";
        var email= "<?php Print($email); ?>";
        var photo= "<?php Print($photo); ?>";
        var statute= "<?php Print($statute); ?>";
        var job= "<?php Print($job); ?>";
        var type= "<?php Print($type); ?>";
        var username= "<?php Print($username); ?>";
        var name= "<?php Print($name); ?>";
        var fname= "<?php Print($fname); ?>";
        var password= "<?php Print($password); ?>";
        var photoBack= "<?php Print($photoBack); ?>";
        var age= "<?php Print($age); ?>";


        window.onload = function() {

            document.getElementById("completeName").innerHTML = fname + " " + name;
            document.getElementById("details").innerHTML = "User: " + username + "   Mail: " + email;
        }


        alert(name + fname);


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
            <li><a href="jobs.html">Jobs</a></li>
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











<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center ">
            <div class="panel panel-default">
                <div class="userprofile social ">
                    <div class="userpic"> <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" class="userpicimg"> </div>
                    <h3 class="username"><label type="text" id="completeName" name="completeName" ></h3>
                    <p>Gujarat, India</p>
                    <div class="socials tex-center"> <a href="" class="btn btn-circle btn-primary ">
                            <i class="fa fa-facebook"></i></a> <a href="" class="btn btn-circle btn-danger ">
                            <i class="fa fa-google-plus"></i></a> <a href="" class="btn btn-circle btn-info ">
                            <i class="fa fa-twitter"></i></a> <a href="" class="btn btn-circle btn-warning "><i class="fa fa-envelope"></i></a>
                    </div>
                </div>
                <div class="col-md-12 border-top border-bottom">
                    <ul class="nav nav-pills pull-left countlist" role="tablist">
                        <li role="presentation">
                            <h3>1452<br>
                                <small>Follower</small> </h3>
                        </li>
                        <li role="presentation">
                            <h3>245<br>
                                <small>Following</small> </h3>
                        </li>
                        <li role="presentation">
                            <h3>5000<br>
                                <small>Activity</small> </h3>
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
                        <label type="text" id="details" name="details" >
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
                <div class="panel-heading">
                    <h1 class="page-header small">What others are saying </h1>
                    <p class="page-subtitle small">Express your self, Express to other</p>
                </div>
                <div class="col-md-12">
                    <div class="media">
                        <div class="media-left"> <a href="javascript:void(0)"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object"> </a> </div>
                        <div class="media-body">
                            <h4 class="media-heading">Lucky Sans</h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio. </div>
                    </div>
                    <div class="media">
                        <div class="media-left"> <a href="javascript:void(0)">
                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object"> </a> </div>
                        <div class="media-body">
                            <h4 class="media-heading">John Doe</h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio. </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="page-header small">Recently Connected</h1>
                    <p class="page-subtitle small">You have recemtly connected with 34 friends</p>
                </div>
                <div class="col-md-12">
                    <div class="memberblock"> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                            <div class="memmbername">Ajay Sriram</div>
                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            <div class="memmbername">Rajesh Sriram</div>
                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            <div class="memmbername">Manish Sriram</div>
                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            <div class="memmbername">Chandra Amin</div>
                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            <div class="memmbername">John Sriram</div>
                        </a> <a href="" class="member"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            <div class="memmbername">Lincoln Sriram</div>
                        </a> </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12 pull-left posttimeline">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="status-upload nopaddingbtm">
                        <form>
                            <textarea class="form-control" placeholder="What are you doing right now?"></textarea>
                            <br>
                            <ul class="nav nav-pills pull-left ">
                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Audio"><i class="glyphicon glyphicon-bullhorn"></i></a></li>
                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Video"><i class=" glyphicon glyphicon-facetime-video"></i></a></li>
                                <li><a title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Picture"><i class="glyphicon glyphicon-picture"></i></a></li>
                            </ul>
                            <button type="submit" class="btn btn-success pull-right"> Share</button>
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
                            <h4 class="media-heading">Lucky Sans<br>
                                <small><i class="fa fa-clock-o"></i> Yesterday, 2:00 am</small> </h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio. </p>

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
                            <h4 class="media-heading">Astha Smith</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>
                        <div class="media-body">
                            <h4 class="media-heading">Lucky Sans</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </p>
                            <div class="media">
                                <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Astha Smith</h4>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                </div>
                            </div>
                        </div>
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
                            <h4 class="media-heading"> Lucky Sans<br>
                                <small><i class="fa fa-clock-o"></i> Yesterday, 2:00 am</small> </h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio. </p>
                            <ul class="nav nav-pills pull-left ">
                                <li><a href="" title=""><i class="glyphicon glyphicon-thumbs-up"></i> 2015</a></li>
                                <li><a href="" title=""><i class=" glyphicon glyphicon-comment"></i> 25</a></li>
                                <li><a href="" title=""><i class="glyphicon glyphicon-share-alt"></i> 15</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 border-top">
                    <div class="status-upload">
                        <form>
                            <label>Comment</label>
                            <textarea class="form-control" placeholder="Comment here"></textarea>
                            <br>
                            <ul class="nav nav-pills pull-left ">
                                <li><a title=""><i class="glyphicon glyphicon-bullhorn"></i></a></li>
                                <li><a title=""><i class=" glyphicon glyphicon-facetime-video"></i></a></li>
                                <li><a title=""><i class="glyphicon glyphicon-picture"></i></a></li>
                            </ul>
                            <button type="submit" class="btn btn-success pull-right"> Comment</button>
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
                        <div class="media-left"> <a href="javascript:void(0)"> <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="media-object"> </a> </div>
                        <div class="media-body">
                            <h4 class="media-heading"> Lucky Sans<br>
                                <small><i class="fa fa-clock-o"></i> Yesterday, 2:00 am</small> </h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio. </p>
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
                            <h4 class="media-heading">Astha Smith</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. </p>
                            <div class="media">
                                <div class="media-left"> <a href="javascript:void(0)"> <img alt="64x64" src="https://bootdey.com/img/Content/avatar/avatar1.png" class="media-object"> </a> </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Nested Lucky Sans</h4>
                                    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                </div>
                            </div>
                        </div>
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
                            <h4 class="media-heading"> Lucky Sans<br>
                                <small><i class="fa fa-clock-o"></i> Yesterday, 2:00 am</small> </h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio. </p>
                            <ul class="nav nav-pills pull-left ">
                                <li><a href="" title=""><i class="glyphicon glyphicon-thumbs-up"></i> 2015</a></li>
                                <li><a href="" title=""><i class=" glyphicon glyphicon-comment"></i> 25</a></li>
                                <li><a href="" title=""><i class="glyphicon glyphicon-share-alt"></i> 15</a></li>
                            </ul>
                        </div>
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
                            <h4 class="media-heading"> Lucky Sans<br>
                                <small><i class="fa fa-clock-o"></i> Yesterday, 2:00 am</small> </h4>
                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio. </p>
                            <ul class="nav nav-pills pull-left ">
                                <li><a href="" title=""><i class="glyphicon glyphicon-thumbs-up"></i> 2015</a></li>
                                <li><a href="" title=""><i class=" glyphicon glyphicon-comment"></i> 25</a></li>
                                <li><a href="" title=""><i class="glyphicon glyphicon-share-alt"></i> 15</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>











</body>
</html>