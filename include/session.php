<?php

if(!isset($_SESSION))
{
     session_start();   
}
include "config.php";
if(isset($_SESSION["seeker"]))
{
     try{
            $sql=$conn->prepare("SELECT * from `st_details` where s_email=?");
            $sql->bindParam(1,$_SESSION["email"]);
            $sql->execute();
            $num=$sql->rowCount();
            if($num==1){
               $row=$sql->fetch(PDO::FETCH_ASSOC);
                // print_r($row);
                // echo $pass;
                $_SESSION["sid"]=$row["s_id"];
                $_SESSION["name"] = $row["s_name"];
            }
        }catch(Exception $e){
            echo "query error";
        }
}
elseif(isset($_SESSION["recruiter"]))
{
    try{
            $sql=$conn->prepare("SELECT * from `rc_details` where r_email=?");
            $sql->bindParam(1,$_SESSION["email"]);
            $sql->execute();
            $num=$sql->rowCount();
            if($num==1){
               $row=$sql->fetch(PDO::FETCH_ASSOC);
                // print_r($row);
                // echo $pass;
                $_SESSION["rid"] = $row["r_id"];
                $_SESSION["name"] = $row["r_name"];
            }
    
        }catch(Exception $e){
            echo "query error";
        }
}
else
{
    echo " ";
}

?>