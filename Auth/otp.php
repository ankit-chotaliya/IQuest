<?php 
ob_start();
include "../include/session.php";
if(isset($_SESSION["seeker"]) || isset($_SESSION["recruiter"]) || isset($_SESSION["forgot"]))
{
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
    {
        $otp = $_POST["otp"];
        if($otp == $_SESSION["OTP"])
        {
            if(isset($_SESSION["forgot"])){
                header("Location: https://qualifind.rushilshah.in/Auth/confirmpassword.php");
                ob_flush();
                exit();
            }else{
                header("Location: https://qualifind.rushilshah.in/");
                ob_flush();
                exit();
            }
            
           
        }
        else
        {
            $_SESSION["err_otp"] = "Invalid OTP";
        }
    }
}
else
{
            header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();
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

    <title>OTP Verification</title>
  </head>
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
              <h3><br>Verify your OTP</h3>
              <p class="mb-4" style="color:green;">OTP has been sent to your mail</p>
            </div>
            <form name="login" id="login" autocomplete="off" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
              <div class="form-group first">
                <label for="otp">
                    <?php 
                if(isset($_SESSION["err_otp"]))
                { echo "<span style='color:red;'>" . $_SESSION["err_otp"] . "</span>";
                   // unset($_SESSION["err_otp"]);
                }
                else
                { echo "OTP"; }
                ?>
                </label>
                <input type="otp" name="otp" class="form-control" id="otp" required autocomplete="off">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <!--<label class="control control--checkbox mb-0"><span class="caption">Remember me</span>-->
                <!--  <input type="checkbox" checked="checked"/>-->
                <!--  <div class="control__indicator"></div>-->
                <!--</label>-->
              </div>

              <input type="submit" name="submit" value="Verify OTP" class="btn btn-block btn-primary">
              
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