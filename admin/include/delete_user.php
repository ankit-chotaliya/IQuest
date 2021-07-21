<?php
require_once("config.php");
include "session.php";
if(isset($_POST["action"]) && $_POST["action"]=="delete_s"){
    if(isset($_POST["btnvalue"])){
        $sql=$conn->prepare("DELETE FROM st_details WHERE s_id=?");
        $sql->bindParam(1,$_POST["btnvalue"]);
        if($sql->execute()){
            echo "done s";
        }
    }
}
if(isset($_POST["action"])&& $_POST["action"]=="delete_r"){
    if(isset($_POST["btnvalue"])){
        $sql=$conn->prepare("DELETE FROM rc_details WHERE r_id=?");
        $sql->bindParam(1,$_POST["btnvalue"]);
        if($sql->execute()){
            echo "done r";
        }
    }
}



?>
