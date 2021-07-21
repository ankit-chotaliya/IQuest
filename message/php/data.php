<?php
if($_SESSION["role"]=="recruiter"){
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        $sql2 =$conn->prepare( "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1");
        $sql2->execute();
        $row2 = $sql2->fetch(PDO::FETCH_ASSOC);
        ($sql2->rowCount() > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="../../seeker/uploads/'. $row['s_img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['s_name'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
}else{
    while($row = $sql->fetch(PDO::FETCH_ASSOC)){
        $sql2 =$conn->prepare( "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1");
        $sql2->execute();
        $row2 = $sql2->fetch(PDO::FETCH_ASSOC);
        ($sql2->rowCount() > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
        if($msg=="No message available"){
            $output .='';
        }else{
            $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
            <div class="content">
            <img src="../../recruiter/uploads/'. $row['r_img'] .'" alt="">
            <div class="details">
                <span>'. $row['r_name'] .'</span>
                <p>'. $you . $msg .'</p>
            </div>
            </div>
            <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
        </a>';
        }
        
    }
}
?>