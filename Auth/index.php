<!doctype html>
<?php 
include "../include/session.php";
?>
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
        
    <title>Register</title>
    
    <style>
      .custom-select
      {
         background-color: #edf2f5;
      }
  </style>
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
              <h3>Register</h3>
              <p class="mb-4">QualiFind</p>
        </div>
        
<script type="text/javascript">

</script>

            <form name="register" id="register" method="post"  >
                 <!-- You are a <br>-->
                 <!-- <input type="radio" id="job_seeker" name="role" onClick="radio_input('register_job_seeker.php')" value="job_seeker" ;>-->
                 <!--  <label for="job_seeker">Job Seeker</label> <br>-->
                 <!--<input type="radio" id="recruiter" name="role" onClick="radio_input('register_recruiter.php')"  value="recruiter";>-->
                 <!--   <label for="recruiter">Recruiter</label>  <br>-->
                </form>    

                <form name="register" id="register" action="register.php" method="post" autocomplete="off">
                <div class="form-group first">
                <select name="role" class="custom-select" id="role" required>
                    <option value="" disabled hidden selected>Register As :</option>
                    <option value="seeker">Job Seeker</option>
                    <option value="recruiter">Recruiter</option>
                </select>
              </div>
              <div class="form-group first">
                <label for="name"><?php 
                if(isset($_SESSION["err_name"]))
                { echo "<span style='color:red;'>" . $_SESSION["err_name"] . "</span>";
                    unset($_SESSION["err_name"]);
                }
                else
                { echo "Enter your username"; }
                ?></label>
                <input type="text" name="name" class="form-control" id="name" autocomplete="off" required >
            </div>
            
            <div class="form-group first">
              <label for="email"><?php 
                if(isset($_SESSION["err_email"]))
                { echo "<span style='color:red;'>" . $_SESSION["err_email"] . "</span>";
                    unset($_SESSION["err_email"]);
                }
                else
                { echo "Enter your Email"; }
                ?></label>
              <input type="email" name="email" class="form-control" id="email" autocomplete="off" required>
            </div>
                
                <div class="form-group first">
                <label for="password"><?php 
                if(isset($_SESSION["err_pass"]))
                { echo "<span style='color:red;'>" . $_SESSION["err_pass"] . "</span>";
                    unset($_SESSION["err_pass"]);
                }
                else
                { echo "Enter your password"; }
                ?></label>
                <input type="password" name="password" class="form-control" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" autocomplete="off" required>
                </div>
                
                <div class="form-group first">
                <label for="re_password"><?php 
                if(isset($_SESSION["err_rpass"]))
                { echo "<span style='color:red;'>" . $_SESSION["err_rpass"] . "</span>";
                    unset($_SESSION["err_rpass"]);
                }
                else
                { echo "Re-enter pssword"; }
                ?></label>
                <input type="password" name="re_password" class="form-control" id="re_password" autocomplete="off" required>
                </div>
                
                <div class="form-group first">
                <label for="m_number"><?php 
                if(isset($_SESSION["err_mno"]))
                { echo "<span style='color:red;'>" . $_SESSION["err_mno"] . "</span>";
                    unset($_SESSION["err_mno"]);
                }
                else
                { echo "Enter your mobile number"; }
                ?></label>
                <input type="text" name="m_number" class="form-control" id="m_number" autocomplete="off" required>
                </div>
                
                <div class="form-group first">
                <label for="wp_number"><?php 
                if(isset($_SESSION["err_wpno"]))
                { echo "<span style='color:red;'>" . $_SESSION["err_wpno"] . "</span>";
                    unset($_SESSION["err_wpno"]);
                }
                else
                { echo "Enter your whatsapp number"; }
                ?></label>
                <input type="text" name="wp_number" class="form-control" id="wp_number" autocomplete="off" required>
                </div> 
                <div class="d-flex mb-5 align-items-center">
                <!--<label class="control control--checkbox mb-0"><span class="caption">Remember me</span>-->
                <!--  <input type="checkbox" checked="checked"/>-->
                <!--  <div class="control__indicator"></div>-->
                <!--</label>-->
              </div>
              
             <input type="submit" name="submit" value="Register" class="btn btn-block btn-primary">
             
             <span class="d-block text-left my-4 text-muted text-center"><a href="https://qualifind.rushilshah.in/Auth/loginform.php" class="forgot-pass" style="color:black;">Have an account?</a></span>
              </div>
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