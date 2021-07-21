<?php
require_once("config.php");
include "session.php";
if(isset($_POST["action"])&& $_POST["action"]=="select_action"){
    if(isset($_POST["btnvalue"])){
        $sql=$conn->prepare("UPDATE job_apply SET ja_status = 'selected' WHERE ja_id = ?");
        $sql->bindParam(1,$_POST["btnvalue"]);
        $sql->execute();
    }
}
if(isset($_POST["action"])&& $_POST["action"]=="reject_action"){
    if(isset($_POST["btnvalue"])){
        $sql=$conn->prepare("UPDATE job_apply SET ja_status = 'rejected' WHERE ja_id = ?");
        $sql->bindParam(1,$_POST["btnvalue"]);
        $sql->execute();
    }
}



?>
