<?php
    session_start();
    include_once "../../include/config.php";

    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = $_POST['searchTerm'];

    $sql = $conn->prepare("SELECT * FROM st_details WHERE NOT unique_id = {$outgoing_id} AND (s_name LIKE '%{$searchTerm}%') ");
    $output = "";
    $sql->execute();
    if($sql->rowCount() > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>