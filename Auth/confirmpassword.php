<?php 
include "../include/session.php";
include "../include/config.php";
if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"]=="POST"){
    $pass=$_POST["pass"];
    $repass=$_POST["repass"];
    if($pass!=$repass){
        $_SESSION["err_email"]="Password must be same";
    }else{
        try{
            
            if($_SESSION["role"]=="seeker"){
            $sql=$conn->prepare("UPDATE st_details SET s_password=? WHERE s_email=?");    
            }else{
                $sql=$conn->prepare("UPDATE rc_details SET r_password=? WHERE r_email=?");
            }
            $sql->bindParam(1,$pass);
            $sql->bindParam(2,$_SESSION["email"]);
            if($sql->execute()){
                $_SESSION["email"]="Password updated successfully!";
            }else{
                 header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();
            }
            
        }catch(Exception $e){
           header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();  
        }
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Password reset</title>
  </head>
  <style>
      .custom-select
      {
         background-color: #edf2f5;
      }
  </style>
  <body>
  

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Reset Password</h3>
              <p class="mb-4">Qualifind </p>
            </div>
            <form name="login" id="login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" autocomplete="off">
               <div class="form-group first">
                <label for="email"><?php 
                if(isset($_SESSION["err_email"]))
                { echo "<span style='color:red;'>" . $_SESSION["err_email"] . "</span>";
                    unset($_SESSION["err_email"]);
                }
                elseif(isset($_SESSION["email"])){
                    echo "<span style='color:green;'>" . $_SESSION["email"] . "</span>";
                    unset($_SESSION["email"]);
                }
                else
                { echo "Password"; }
                ?>
                </label>
                <input type="password" name="pass" class="form-control" id="password" autocomplete="off" required>
                
              </div>
               <div class="form-group first">
                <label for="email">Re-enter Password
                </label>
                <input type="password" name="repass" class="form-control" id="repassword" autocomplete="off" required>
                
              </div>
              <input type="submit" name="submit" value="RESET" class="btn btn-block btn-primary">
                
                  <span class="d-block text-left my-4 text-muted text-center"><a href="https://qualifind.rushilshah.in/Auth/loginform.php" class="forgot-pass" style="color:black;">Go to Login</a></span>
                
             
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>