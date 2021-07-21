<?php 
include "../include/session.php";
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

    <title>Login</title>
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
              <h3>Sign In</h3>
              <p class="mb-4">Qualifind </p>
            </div>
            <form name="login" id="login" action="login.php" method="post" autocomplete="off">
              <div class="form-group first">
                <select name="role" class="custom-select" id="role" required>
                    <option value="" disabled hidden selected>Login As:</option>
                    <option value="seeker">Job Seeker</option>
                    <option value="recruiter">Recruiter</option>
                </select>
              </div>
              <div class="form-group first">
                <label for="email"><?php 
                if(isset($_SESSION["err_email"]))
                { echo "<span style='color:red;'>" . $_SESSION["err_email"] . "</span>";
                    unset($_SESSION["err_email"]);
                }
                else
                { echo "Email"; }
                ?>
                </label>
                <input type="email" name="email" class="form-control" id="email" autocomplete="off" required>
                
              </div>
              <div class="form-group last mb-4">
                <label for="password">
                    <?php 
                if(isset($_SESSION["err_pass"]))
                { echo "<span style='color:red;'>" . $_SESSION["err_pass"] . "</span>";
                    unset($_SESSION["err_pass"]);
                }
                else
                { echo "Password"; }
                ?>
                </label>
                <input type="password" name="password" class="form-control" id="password" autocomplete="off" required>
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <!--<label class="control control--checkbox mb-0"><span class="caption">Remember me</span>-->
                <!--  <input type="checkbox" checked="checked"/>-->
                <!--  <div class="control__indicator"></div>-->
                <!--</label>-->
                <span class="ml-auto"><a href="https://qualifind.rushilshah.in/Auth/forgotpassword.php" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" name="submit" value="Log In" class="btn btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted text-center"><a href="https://qualifind.rushilshah.in/Auth/index.php" class="forgot-pass" style="color:black;">Don't have an account?</a></span>
              
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