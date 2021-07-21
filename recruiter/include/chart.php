<?php 

session_start();
require_once("config.php");
if(isset($_POST["action"]) &&  $_POST["action"]=="job_action"){
    try{
    $d=(int)$_POST["count"];
    $sql2=$conn->prepare("SELECT j_title from job_details where r_id=? LIMIT $d,1 ");
    $sql2->bindParam(1,$_SESSION["rid"]);
    $sql2->execute();
    $data=$sql2->fetch(PDO::FETCH_ASSOC);
    // echo $data["j_title"];
    echo "'0:hii'";
    }catch(Exception $e){
        echo "error";
    }
   
    
} 
if(isset($_POST["action"]) &&  $_POST["action"]=="chart1"){
    try{
    $c=(int)$_POST["count"];
    $sql=$conn->prepare("SELECT j_vacancy from job_details where r_id=? LIMIT $c,1");
    $sql->bindParam(1,$_SESSION["rid"]);
    $sql->execute();
    $data=$sql->fetchAll();
    echo $data[0]["j_vacancy"];
 
    }catch(Exception $e){
        echo "error";
    }
   
}
if(isset($_POST["action"]) &&  $_POST["action"]=="chart2"){
    try{
    $c=(int)$_POST["count"];
    $job_id=array();
    $sql2=$conn->prepare("SELECT j_id from job_details where r_id=?");
    $sql2->bindParam(1,$_SESSION["rid"]);
    $sql2->execute();
    $row=$sql2->fetchAll();
    for($i=0;$i<count($row);$i++){
        array_push($job_id,$row[$i]["j_id"]);
    }
    $sql=$conn->prepare("SELECT ja.s_id FROM job_apply AS ja, job_details AS jd WHERE jd.r_id=? AND jd.j_id=? AND jd.j_id=ja.j_id");
    $sql->bindParam(1,$_SESSION["rid"]);
    $sql->bindParam(2,$job_id[$_POST["count"]]);
    $sql->execute();
    $data=$sql->rowCount();
    echo $data;
 
    }catch(Exception $e){
        echo "error";
    }
   
    
}
if(isset($_POST["action"]) &&  $_POST["action"]=="chart3"){
    try{
    $c=(int)$_POST["count"];
    $job_id=array();
    $sql2=$conn->prepare("SELECT j_id from job_details where r_id=?");
    $sql2->bindParam(1,$_SESSION["rid"]);
    $sql2->execute();
    $row=$sql2->fetchAll();
    for($i=0;$i<count($row);$i++){
        array_push($job_id,$row[$i]["j_id"]);
    }
    $sql=$conn->prepare("SELECT ja.s_id FROM job_apply AS ja, job_details AS jd WHERE jd.r_id=? AND jd.j_id=? AND jd.j_id=ja.j_id AND ja.ja_status='selected'");
    $sql->bindParam(1,$_SESSION["rid"]);
    $sql->bindParam(2,$job_id[$_POST["count"]]);
    $sql->execute();
    $data=$sql->rowCount();
    echo $data;
 
    }catch(Exception $e){
        echo "error";
    }

  
}



?>