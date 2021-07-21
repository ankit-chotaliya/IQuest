<?php
ob_start();
include "include/session.php";
include "include/config.php";

try
{
    $sql = $conn->prepare("DELETE FROM st_details WHERE s_id = :id");
    $sql->bindParam(":id",$_SESSION["sid"]);
    if($sql->execute())
    {
        session_start();
    	session_destroy();
    	header('location: https://qualifind.rushilshah.in/');
    	exit();
    }
}
catch(PDOException $e)
{
   header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit(); 
}

?>