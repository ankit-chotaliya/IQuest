<?php
require_once("config.php");
include "session.php";
if(isset($_SESSION['sid'])){
 if(isset($_POST["action"]) && $_POST["action"]=="save_data"){
    if(isset($_POST["btnvalue"])){
        $query="INSERT INTO `job_saved` ( `j_id`, `s_id`) VALUES (?,?)";
          $sql=$conn->prepare($query);
            $sql->bindParam(1,$_POST["btnvalue"]);
            $sql->bindParam(2,$_SESSION["sid"]);
          if(  $sql->execute() ) {
              echo '<button class="bcbtn" data-id="'.$_POST["btnvalue"].'" >Bookmarked</button>';
          }
    }   
}

 if(isset($_POST["action"]) && $_POST["action"]=="unsave_data"){
     
    if(isset($_POST["btnvalue"])){
        $query="DELETE FROM `job_saved` WHERE j_id=? AND s_id=?";
          $sql=$conn->prepare($query);
            $sql->bindParam(1,$_POST["btnvalue"]);
            $sql->bindParam(2,$_SESSION["sid"]);
          if(  $sql->execute() ) {
              echo '<button class="bbtn" data-id="'.$_POST["btnvalue"].'" >Bookmark</button>';
          }
    }   
}   
}
else{
    
      echo "<a href='Auth/loginform.php' class='bcbtn' >login first</a>";
} 
 

    
    

?>