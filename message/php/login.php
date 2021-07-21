<?php 
    session_start();
    include_once "../../include/config.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role=$_POST['role'];
    if(!empty($role) && !empty($email) && !empty($password)){
        if($role=="recruiter"){
            $sql = $conn->prepare("SELECT * FROM rc_details WHERE r_email = '{$email}'");
            $sql->execute();
            if($sql->rowCount() > 0){
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                // $user_pass = md5($password);
                $pass = $row['r_password'];
                if($password === $pass){
                    $status = "Active now";
                    $sql2 = $conn->prepare("UPDATE rc_details SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                    if($sql2->execute()){
                        $_SESSION['unique_id'] = $row['unique_id'];
                        $_SESSION['role']="recruiter";
                        echo "success";
                    }else{
                        echo "Something went wrong. Please try again!";
                    }
                }else{
                    echo "Email or Password is Incorrect!";
                }
            }else{
                echo "$email - This email not Exist!";
            }
        }else{
            $sql = $conn->prepare("SELECT * FROM st_details WHERE s_email = '{$email}'");
            $sql->execute();
            if($sql->rowCount() > 0){
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                // $user_pass = md5($password);
                $pass = $row['s_password'];
                if($password === $pass){
                    $status = "Active now";
                    $sql2 = $conn->prepare("UPDATE st_details SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                    if($sql2->execute()){
                        $_SESSION['unique_id'] = $row['unique_id'];
                        $_SESSION['role'] = "seeker";
                        echo "success";
                    }else{
                        echo "Something went wrong. Please try again!";
                    }
                }else{
                    echo "Email or Password is Incorrect!";
                }
            }else{
                echo "$email - This email not Exist!";
            }
        }
        
    }else{
        echo "All input fields are required!";
    }
?>