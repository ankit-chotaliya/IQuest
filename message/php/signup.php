<?php
    session_start();
    include_once "../../include/config.php";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role=$_POST['role'];
    $password = $_POST['password'];
    if(!empty($name) && !empty($email) && !empty($password) &&!empty($role)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if($role=="recruiter"){
                $sql = $conn->prepare("SELECT * FROM rc_details WHERE r_email = '{$email}'");
                $sql->execute();
                if($sql->rowCount() > 0){
                    echo "$email - This email already exist!";
                }else{
                    if(isset($_FILES['image'])){
                        $img_name = $_FILES['image']['name'];
                        $img_type = $_FILES['image']['type'];
                        $tmp_name = $_FILES['image']['tmp_name'];
                        
                        $img_explode = explode('.',$img_name);
                        $img_ext = end($img_explode);
        
                        $extensions = ["jpeg", "png", "jpg"];
                        if(in_array($img_ext, $extensions) === true){
                            $types = ["image/jpeg", "image/jpg", "image/png"];
                            if(in_array($img_type, $types) === true){
                                $time = time();
                                $new_img_name = $time.$img_name;
                                if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                    $ran_id = rand(time(), 100000000);
                                    $status = "Active now";
                                    // $encrypt_pass = md5($password);
                                    $insert_query = $conn->prepare("INSERT INTO rc_details (unique_id, r_name , r_email, r_password, r_img, status)
                                    VALUES ({$ran_id},'{$name}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                                    
                                    if($insert_query->execute()){
                                        $select_sql2 = $conn->prepare("SELECT * FROM rc_details WHERE r_email = '{$email}'");
                                        $select_sql2->execute();
                                        if($select_sql2->rowCount() > 0){
                                            $result = $select_sql2->fetch(PDO::FETCH_ASSOC);
                                            $_SESSION['unique_id'] = $result['unique_id'];
                                            $_SESSION['role']="recruiter";
                                            echo "success";
                                        }else{
                                            echo "This email address not Exist!";
                                        }
                                    }else{
                                        echo "Something went wrong. Please try again!";
                                    }
                                }
                            }else{
                                echo "Please upload an image file - jpeg, png, jpg";
                            }
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }
                }
            }
            else{
                $sql = $conn->prepare("SELECT * FROM st_details WHERE s_email = '{$email}'");
                $sql->execute();
                if($sql->rowCount() > 0){
                    echo "$email - This email already exist!";
                }else{
                    if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $ran_id = rand(time(), 100000000);
                                $status = "Active now";
                                $encrypt_pass = md5($password);
                                $insert_query = $conn->prepare("INSERT INTO st_details (unique_id, s_name, s_email, s_password, s_img, status)
                                VALUES ({$ran_id}, '{$name}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                                
                                if($insert_query->execute()){
                                    $select_sql2 = $conn->prepare("SELECT * FROM st_details WHERE s_email = '{$email}'");
                                    $select_sql2->execute();
                                    if($select_sql2->rowCount() > 0){
                                        $result = $select_sql2->fetch(PDO::FETCH_ASSOC);
                                        $_SESSION['unique_id'] = $result['unique_id'];
                                        $_SESSION["role"]="seeker";
                                        echo "success";
                                    }else{
                                        echo "This email address not Exist!";
                                    }
                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
                }
            }
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>