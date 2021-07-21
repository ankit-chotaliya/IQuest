<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../../include/config.php";
        $logout_id = $_GET['logout_id'];
        if(isset($logout_id)){

            if($_SESSION["role"]=="recruiter"){
                $status = "Offline now";
                $sql =$conn->prepare("UPDATE rc_details SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
               
                if( $sql->execute()){
                    session_unset();
                    session_destroy();
                    header("location: ../../");
                }
            }else{
                $status = "Offline now";
                $sql =$conn->prepare("UPDATE st_details SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
               
                if( $sql->execute()){
                    session_unset();
                    session_destroy();
                    header("location: ../../");
                }
            }
            
        }else{
            header("location: ../users.php");
        }
    }else{  
        header("location: ../login.php");
    }
?>