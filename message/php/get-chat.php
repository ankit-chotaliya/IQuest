<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "../../include/config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = $_POST['incoming_id'];
        // $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        if($_SESSION=="recruiter"){
            $sql =$conn->prepare( "SELECT * FROM messages LEFT JOIN rc_details ON rc_details.unique_id = messages.outgoing_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id");
        }else{
            $sql =$conn->prepare( "SELECT * FROM messages LEFT JOIN st_details ON st_details.unique_id = messages.outgoing_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id");
        }
        // $query = mysqli_query($conn, $sql);
        $sql->execute();
        // if(mysqli_num_rows($query) > 0){
        if($sql->rowCount() > 0){
            while($row = $sql->fetch(PDO::FETCH_ASSOC)){
                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>