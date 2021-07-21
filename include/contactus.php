<?php
 ob_start();
include "config.php";
if(isset($_POST["contactus"]) && isset($_POST["message"]) && isset($_POST["email"]) &&  $_SERVER["REQUEST_METHOD"] = "POST"){
    $sql=$conn->prepare("INSERT INTO `contact` ( `c_email`, `c_cmnt`) VALUES (?,?)");
    $sql->bindParam(1,$_POST["email"]);
    $sql->bindParam(2,$_POST["message"]);
    if($sql->execute()){
    
  header("location:../about.php");
  ob_flush();
  exit();
    }else{
       
      header("location:../about.php");
      ob_flush();
        exit();
    }

   
}else{
    echo "<script>alert('unsuccessful')</script>";
}
?>