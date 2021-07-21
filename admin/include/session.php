<?php
	include 'config.php';

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
        header("location: https://qualifind.rushilshah.in/admin/Auth/loginform.php");
        exit();
    }
       
?>