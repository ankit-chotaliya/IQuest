<?php
//make sure you severname username password and dbname is right as per your pc!!
$servername = "localhost";
$username = "rushilsh_qualifindadmin";
$password = "Qualifind";
$db="rushilsh_qualifind";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
} catch (PDOException $e) {
    // header('location: error.php');
    die();
}


// $link = mysqli_connect("localhost","rushilsh_qualifindadmin","Qualifind","rushilsh_qualifind");

// if($link == false)
// {
//      die("ERROR: Could not connect. " . mysqli_connect_error());
// }


?>