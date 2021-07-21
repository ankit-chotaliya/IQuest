<?php
ob_start();
include "../include/session.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
// include "../include/config.php";
require_once('../include/config.php');

if(isset($_POST['submit']) && $_SERVER["REQUEST_METHOD"] = "POST"){
    
    if(empty($_POST["email"]))
    {
        $_SESSION["err_email"] = "Email required";
        header("location: https://qualifind.rushilshah.in/Auth/loginform.php");
        ob_flush();
        exit();
    }
    else
    {
        $email = $_POST['email'];
    }
    if(empty($_POST["password"]))
    {
        $_SESSION["err_pass"] = "Password required";
        header("location: https://qualifind.rushilshah.in/Auth/loginform.php");
        ob_flush();
        exit();
    }
    else
    {
        $pass = $_POST['password'];
    }
    $role = $_POST["role"];
    if($role == "seeker")
    {
        try{
            $sql=$conn->prepare("SELECT s_id, s_email,s_password,unique_id from `st_details` where s_email=?");
            $sql->bindParam(1,$email);
            $sql->execute();
            $num=$sql->rowCount();
            if($num==1){
               $row=$sql->fetch(PDO::FETCH_ASSOC);
                // print_r($row);
                // echo $pass;
               if($row['s_password'] == $pass){
                        $_SESSION["seeker"] = "seeker";
                        $_SESSION["role"]="seeker";//for msg functionality
                        $_SESSION["unique_id"]=$row['unique_id'];//for msg functionality
                        $_SESSION["sid"] = $row["s_id"];
                        $_SESSION["email"]=$row["s_email"];
                        header("location: https://qualifind.rushilshah.in/");
                        ob_flush();
                        exit();
                }else{
                     $_SESSION["err_pass"] = "Incorrect password";
                    header("location: https://qualifind.rushilshah.in/Auth/loginform.php");
                    ob_flush();
                    exit();
                   }
               }else{
                   $_SESSION["err_email"] = "User doesn't exist";
                    header("location: https://qualifind.rushilshah.in/Auth/loginform.php");
                    ob_flush();
                    exit();
            }
    
        }catch(Exception $e){
            
            header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();
        }
    }
    else
    {
        try{
            $sql=$conn->prepare("SELECT r_id, r_email, r_password,unique_id from `rc_details` where r_email=?");
            $sql->bindParam(1,$email);
            $sql->execute();
            $num=$sql->rowCount();
            if($num==1){
               $row=$sql->fetch(PDO::FETCH_ASSOC);
                // print_r($row);
                // echo $pass;
               if($row['r_password']==$pass){
                        echo "Login succuessfull";
                        $_SESSION["recruiter"] = "recruiter";
                        $_SESSION["role"]="recruiter";//for msg functionality
                        $_SESSION["unique_id"]=$row["unique_id"];//for msg functionality
                        $_SESSION["rid"] = $row["r_id"];
                        $_SESSION["email"]=$row["r_email"];
                        header("location: https://qualifind.rushilshah.in/");
                        ob_flush();
                        exit();
                        
                }else{
                        $_SESSION["err_pass"] = "Incorrect password";
                        header("location: https://qualifind.rushilshah.in/Auth/loginform.php");
                        ob_flush();
                        exit();
                   }
               }else{
                        $_SESSION["err_email"] = "User doesn't exist";
                    header("location: https://qualifind.rushilshah.in/Auth/loginform.php");
                    ob_flush();
                    exit();
            }
    
        }catch(Exception $e){
             header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();
        }
    }
}

?>