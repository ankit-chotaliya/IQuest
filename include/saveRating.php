<?php
include_once("config.php");

if(!empty($_POST['rating']) && !empty($_POST['review'])){

$sql=$conn->prepare("INSERT INTO `review` ( `review_star`, `review_cmt`, `r_id`, `s_id`) VALUES (?,?,?,?)");
$sql->bindParam(1,$_POST["rating"]);
$sql->bindParam(2,$_POST["review"]);
$sql->bindParam(3,$_POST["rid"]);
$sql->bindParam(4,$_POST["sid"]);

if($sql->execute()){
  
}
}
?>