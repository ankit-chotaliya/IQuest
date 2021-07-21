<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../../include/config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = $_POST['incoming_id'];
        $message = $_POST['message'];
        if(!empty($message)){
            $sql = $conn->prepare("INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')");
            $sql->execute();
        }
    }else{
        header("location: ../login.php");
    }


    
?>