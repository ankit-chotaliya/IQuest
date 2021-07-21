<?php 
session_start();
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="login.css" rel="stylesheet" > 
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="sidenav">
         <div class="login-main-text">
            <h2>Admin<br> Login Page</h2>
            <p>Login from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <?php
                if(isset($_SESSION["err_admin_login"])){
                ?>
                <div class="alert alert-danger" role="alert">
                 Invalid creadintials
                </div>
                <?php
                }
                ?>
               <form action="login.php" method="POST">
                  <div class="form-group">
                     <label>E-mail</label>
                     <input type="text" class="form-control" name="email" placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" class="form-control" name="password"placeholder="Password">
                  </div>
                  <button type="submit" name="submit"class="btn btn-black">Login</button>
                
               </form>
            </div>
         </div>
      </div>