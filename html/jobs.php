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

$sql = "SELECT * FROM job";

$result = $conn->query($sql);

$array = array();

$numJobs = $result->num_rows;

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        $jobs = new jobs;

        $jobs->IDjob = $row["IDjob"];
        $jobs->IDfirm = $row["IDfirm"];
        $jobs->nom = $row["nom"];
        $jobs->description = $row["description"];
        $jobs->lieu = $row["lieu"];
        $jobs->salaire = $row["salaire"];
        $jobs->temps = $row["temps"];

        array_push($array, $jobs);
    }
} else {
    echo "whala y a pas de resultats";
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


    <!--
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/jobs.css">


    <script type="text/javascript">

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


            if("<?php print($numJobs);?>" == 0){
                str0 = "no job offer have been found... Sorry about that !";
            }

            if("<?php print($numJobs);?>" == 1){
                str0 = str0 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingOne">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[0]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[0]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[0]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';
            }

            if("<?php print($numJobs);?>" == 2){
                str0 = str0 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingOne">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[0]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[0]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[0]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str1 = str1 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingTwo">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[1]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[1]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[1]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';
            }

            if("<?php print($numJobs);?>" == 3){
                str0 = str0 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingOne">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[0]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[0]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[0]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str1 = str1 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingTwo">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[1]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[1]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[1]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str2 = str2 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingThree">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[2]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[2]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[2]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';
            }

            if("<?php print($numJobs);?>" == 4){
                str0 = str0 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingOne">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[0]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[0]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[0]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str1 = str1 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingTwo">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[1]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[1]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[1]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str2 = str2 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingThree">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[2]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[2]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[2]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str3 = str3 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingFour">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[3]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[3]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[3]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

            }

            if("<?php print($numJobs);?>" == 5){
                str0 = str0 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingOne">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[0]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[0]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[0]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str1 = str1 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingTwo">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[1]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[1]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[1]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str2 = str2 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingThree">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[2]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[2]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[2]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str3 = str3 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingFour">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[3]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[3]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[3]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str4 = str4 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingFive">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[4]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[4]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[4]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

            }


            if("<?php print($numJobs);?>" == 6){
                str0 = str0 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingOne">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[0]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[0]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[0]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str1 = str1 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingTwo">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[1]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[1]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[1]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str2 = str2 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingThree">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[2]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[2]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[2]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str3 = str3 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingFour">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[3]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[3]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[3]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str4 = str4 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingFive">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[4]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[4]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[4]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str5 = str5 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingSix">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[5]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[5]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[5]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';
            }

            if("<?php print($numJobs);?>" == 7){
                str0 = str0 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingOne">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[0]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[0]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[0]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str1 = str1 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingTwo">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[1]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[1]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[1]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str2 = str2 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingThree">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[2]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[2]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[2]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str3 = str3 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingFour">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[3]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[3]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[3]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str4 = str4 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingFive">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[4]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[4]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[4]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str5 = str5 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingSix">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[5]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[5]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[5]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str6 = str6 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingSeven">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[6]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[6]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingSeven" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[6]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';
            }


            if("<?php print($numJobs);?>" == 8){
                str0 = str0 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingOne">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[0]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[0]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[0]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str1 = str1 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingTwo">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[1]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[1]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[1]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str2 = str2 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingThree">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[2]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[2]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[2]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str3 = str3 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingFour">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[3]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[3]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[3]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str4 = str4 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingFive">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[4]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[4]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[4]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str5 = str5 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingSix">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[5]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[5]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[5]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str6 = str6 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingSeven">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[6]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[6]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingSeven" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[6]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str7 = str7 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingEight">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[7]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[7]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseEight" class="collapse" role="tabpanel" aria-labelledby="headingEight" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[7]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';
            }

            if("<?php print($numJobs);?>" == 9){
                str0 = str0 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingOne">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[0]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[0]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[0]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str1 = str1 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingTwo">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[1]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[1]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[1]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str2 = str2 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingThree">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[2]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[2]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[2]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str3 = str3 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingFour">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[3]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[3]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[3]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str4 = str4 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingFive">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[4]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[4]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[4]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str5 = str5 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingSix">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[5]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[5]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[5]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str6 = str6 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingSeven">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[6]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[6]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingSeven" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[6]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str7 = str7 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingEight">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[7]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[7]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseEight" class="collapse" role="tabpanel" aria-labelledby="headingEight" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[7]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';

                str8 = str8 + '<div class="card">'
                    + '<div class="card-header" role="tab" id="headingNine">'
                    + '<div class="mb-0">'
                    + '<a data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseOne" class="collapsed">'
                    + '<i class="fa fa-file-text-o" aria-hidden="true"></i>'
                    + '<h3>'
                    + '<label type="text" id="firm" name="firm"><b>' + "<?php print($array[8]->nom);?>" + '</b></label>'
                    + '</h3>'
                    + '<p>'
                    +   '<label type="text" id="job" name="job"><b>' + "<?php print($array[8]->lieu);?>" + '</b></label>'
                    +'</p>'
                    + '</a>'
                    + '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    +'</div>'
                    + '</div>'
                    + '<div id="collapseNine" class="collapse" role="tabpanel" aria-labelledby="headingNine" aria-expanded="false">'
                    + '<div class="card-block">'
                    +   '<label type="text" id="description" name="description" ><b>' + "<?php print($array[8]->description);?>" + '</b></label>';
                + '</div>'
                + '</div>'
                +'</div>';
            }

            $("#foo0").html(str0);
            $("#foo1").html(str1);
            $("#foo2").html(str2);
            $("#foo3").html(str3);
            $("#foo4").html(str4);
            $("#foo5").html(str5);
            $("#foo6").html(str6);
            $("#foo7").html(str7);
            $("#foo8").html(str8);

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
            <li ><a href="index.html">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li class="active"><a href="jobs.php">Jobs</a></li>
            <li><a href="messenger.html">Messenger</a></li>
            <li><a href="network.php">Network</a></li>
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



<section>
    <div class="container">
        <div class="row">
            <h2 class="text-center"><span>List of jobs offer</span></h2>
            <div class="col-md-8 offset-md-2">
                <div class="bd-example" data-example-id="">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div id="foo0"></div>
                        <div id="foo1"></div>
                        <div id="foo2"></div>
                        <div id="foo3"></div>
                        <div id="foo4"></div>
                        <div id="foo5"></div>
                        <div id="foo6"></div>
                        <div id="foo7"></div>
                        <div id="foo8"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



</body>
</html>