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
            <form name="login" id="login" action="forgotaction.php" method="post" autocomplete="off">
              <div class="form-group first">
                <select name="role" class="custom-select" id="role" required>
                    <option value="" disabled hidden selected>Role:</option>
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
              
              <input type="submit" name="submit" value="RESET" class="btn btn-block btn-primary">

             
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