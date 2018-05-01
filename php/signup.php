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


$database = "MeetECE";
$host = '127.0.0.1:8889';
$login = 'root';
$passwordDTB = 'root';

$db_handle = mysqli_connect($host,$login,$passwordDTB);
$db_found = mysqli_select_db($db_handle, $database);

if($db_found){
    //$sql = "SELECT * FROM membre ORDER BY Prenom DESC ";
    //$sql = "SELECT * FROM membre ORDER BY Prenom LIKE '%J%'";
    $sql = "SELECT * FROM membre WHERE Prenom LIKE 'G%'";


    $result = mysqli_query($db_handle, $sql);

    while ($data = mysqli_fetch_assoc($result)){
        echo "ID : " . $data['ID'] . '<br>';
        echo "Nom : " . $data['Nom'] . '<br>';
        echo "Prénom : " . $data['Prenom'] . '<br>';
        echo "Statut : " . $data['Statut'] . '<br>';
        echo "Date de Naissance : " . $data['DateNaissance'] . '<br>';
    }

} else {
    echo "Database not found.";
}
