<?php
    session_start();
    include_once "../../include/config.php";
    $outgoing_id = $_SESSION['unique_id'];
    if($_SESSION['role']=="recruiter"){
        $sql = $conn->prepare("SELECT DISTINCT s.* FROM st_details AS s,job_apply AS j WHERE NOT s.unique_id = {$outgoing_id} AND j.s_id=s.s_id ORDER BY s.s_id DESC");
        $sql->execute();
        $output = "";
        if($sql->rowCount() == 0){
            $output .= "No users are available to chat";
        }elseif($sql->rowCount() > 0){
            include_once "data.php";
        }
        echo $output;
    }else{
        //student list
        $sql = $conn->prepare("SELECT * FROM rc_details WHERE NOT unique_id = {$outgoing_id} ORDER BY r_id DESC");
        
        $sql->execute();
        $output = "";
        if($sql->rowCount() == 0){
            $output .= "No users are available to chat";
        }elseif($sql->rowCount() > 0){
            include_once "data.php";
        }
        echo $output;
    }
    
?>