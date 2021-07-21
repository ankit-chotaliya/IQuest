<?php
	include 'config.php';

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(!isset($_SESSION['seeker']) || trim($_SESSION['seeker']) == ''){
        header("location: https://qualifind.rushilshah.in/");
        exit();
    }
        try
        {
            $sql=$conn->prepare("SELECT * from `st_details` where s_id=?");
            $sql->bindParam(1,$_SESSION["sid"]);
            $sql->execute();
            $num=$sql->rowCount();
            if($num==1)
            {
               $row=$sql->fetch(PDO::FETCH_ASSOC);
                // print_r($row);
                // echo $pass;
                $sname = $row["s_name"];
                $semail = $row["s_email"];
                $smbno = $row["s_mbno"];
                $swpno = $row["s_wpno"];
                $simg = $row["s_img"];
            }
        }
        catch(Exception $e){
            $_SESSION["err_email"] = "Something went wrong!";
            header("location: https://qualifind.rushilshah.in/Auth/loginform.php");
            exit();
        }
?>