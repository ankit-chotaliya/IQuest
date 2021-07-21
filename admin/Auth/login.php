<?php
// ob_start();
include"../include/config.php";
session_start();
if(isset($_POST["submit"]) && isset($_POST["email"]) && isset($_POST["password"])){
    $sql=$conn->prepare("SELECT a_name,a_mbno,a_email,a_password from admin");
    $sql->execute();
    $row=$sql->fetch(PDO::FETCH_ASSOC);
    if($row["a_email"]==$_POST["email"] && $row["a_password"]==$_POST["password"]){
        $_SESSION["admin"]=$row["a_name"];
        $_SESSION["aemail"]=$row["a_email"];
        $_SESSION["ambno"]=$row["a_mbno"];
        header("location:../index.php");
    }else{
          $_SESSION["err_admin_login"]="Invalid Creadentials";
          header("location:loginform.php");
    }
}else{
    echo "hii";
    $_SESSION["err_admin_login"]="Invalid Creadentials";
    header("location:loginform.php");
}

?>