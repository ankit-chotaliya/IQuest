<?php
	include 'config.php';

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if(!isset($_SESSION['recruiter']) || trim($_SESSION['recruiter']) == ''){
        header("location: https://qualifind.rushilshah.in/");
        exit();
    }
        try
        {
            $sql=$conn->prepare("SELECT r_name, r_email, r_mobno, r_wpno, r_img from `rc_details` where r_id=?");
            $sql->bindParam(1,$_SESSION["rid"]);
            $sql->execute();
            $num=$sql->rowCount();
            if($num==1)
            {
               $row=$sql->fetch(PDO::FETCH_ASSOC);
                // print_r($row);
                // echo $pass;
                $sname = $row["r_name"];
                $semail = $row["r_email"];
                $smbno = $row["r_mobno"];
                $swpno = $row["r_wpno"];
                $simg = $row["r_img"];
                
            }
        }
        catch(Exception $e){
            $_SESSION["err_email"] = "Something went wrong!";
            header("location: https://qualifind.rushilshah.in/Auth/loginform.php");
            exit();
        }
?>