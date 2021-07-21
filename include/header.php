<?php
include "session.php";
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>QualiFind </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo/loading.png">
	
		<!-- CSS here -->
		    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
            <link rel="stylesheet" href="assets/css/flaticon.css">
            <link rel="stylesheet" href="assets/css/price_rangs.css">
            <link rel="stylesheet" href="assets/css/slicknav.css">
            <link rel="stylesheet" href="assets/css/animate.min.css">
            <link rel="stylesheet" href="assets/css/magnific-popup.css">
            <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
            <link rel="stylesheet" href="assets/css/themify-icons.css">
            <link rel="stylesheet" href="assets/css/slick.css">
            <link rel="stylesheet" href="assets/css/nice-select.css">
            <link rel="stylesheet" href="assets/css/style2.css">
            <link rel="stylesheet" href="assets/css/messagestyle.css">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            
        
            
       <style>
                .search
                {
                    position:relative;
                    bottom:200px;
                    right:253px;
                    width:125%;
                }
                .searchbtn{
                    height:70px;
                }
                .quiz{
                    background-color:#1f2b7b;
                    width:100%;
                    height:100%;
                }
                .panel{
                    background:white;
                    padding-top:5rem!important;
                    padding-left:5rem!important;
                    padding-right:5rem!important;
                }
                .qoption{
                    color:white;
                    
                }
                .qsbtn{
                    background:#337ab7;
                    outline:none;
                    color:white;
                    border:none;
                }
                .qnotapply{
                    display:flex !important;
                    align-items:center;
                    justify-content:center;
                }
                .bbtn{
                    border: 1px solid green !important;
                    color:green !important; 
                    background:none !important
                }
                .bbtn:hover{
                    border: none !important;
                    color:white !important; 
                    background:green !important;
                }
                .bcbtn{
                    border: 1px solid green !important;
                    color:white !important; 
                    background:green !important
                }
                .ratingchecked {
                  color: orange;
                }
                .ratingunchecked{
                  color: black;
                }
                #main-img{
                    background-image:url(https://qualifind.rushilshah.in/assets/img/hero/bg-1.jpg);    
                }
                @media screen and (max-width: 800px) {
                  .search {
                    position:relative;
                    top:-88px;
                    right:0px;
                    width:100%;
                  }
                  .searchbtn{
                      height:56px;
                      width:45%;
                  }
                }
                @media screen and (max-width:700px)
                {
                    #main-img{
                    background-image:url(https://qualifind.rushilshah.in/assets/img/hero/bg-2.PNG);    
                    width:320px;
                    height:550px;
                  }
                }
            </style>
            <style>
   
    .video {
        width: 100%;
        height: 47vh;
    }

    .title {
        background: #1f2b7b;
        color: white;
        width: 100%;
        line-height: 100px;
    }

    .frame {
        width: 45%;
        height: 50vh;
        border: 5px groove #1f2b7b;
        border-radius: 5%;
        border-spacing: 5px 1rem;
        margin: 10px;
    }

    .main {
        border: 2px solid #1f2b7b;
    }

    .button {
        background-color: #1f2b7b;
        color: white;
    }

    .button:hover {
        background: none;
        border: 2px solid #1f2b7b;

    }

    .button1 {
        border: 2px solid #1f2b7b;
    }

    .button1:hover {
        background-color: #1f2b7b;
        color: white;
    }

    .meetfooter {
        border: 2px groove #1f2b7b;
        padding: 20px;

    }

    .ft {
        background: transparent;
        line-height: 24px;
        outline: none;
        border: none;
        border-bottom: 2px solid black;
        margin-right: 2%;
    }

    .cb {
        width: 100%;
        height: 57vh;
    }
    
    .copy{
        font-weight: bold;
    }
   
    .id{
        margin-left: 10%;
        width: 75%;
    }
    @media only screen and (max-width: 600px) {
       .id{
            width: 100%;
            margin: 0%;
        }
        .cb{
            width:100%;
            height:400px;
        }
        .text-center{
            text-align:center;
        }
        .title
        {
            line-height:50px;
        }
        .ft
        {
            margin-bottom:2%;
        }
    }
    
</style>
   </head>

   <body>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/loading.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <header >
        <!-- Header Start -->
       <div class="header-area header-transparrent">
           <div class="headder-top header-sticky" >
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-2">
                            <!-- Logo -->
                            <div class="logo " style="margin-left: 4rem!important">
                                <a href="index.php"><img src="assets/img/logo/headlogo.png  " alt=""></a>
                            </div>  
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="menu-wrapper">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block   ">
                                    
                        <ul id="navigation">
                            <li><a href="index.php" >Home</a></li>
                            <li><a href="findajob.php?page=1" >Find a Job </a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            
                               
                           </ul>  
                      
                                
                    </nav>
                    
                </div>          
                                <!-- Header-btn -->
                                        <?php
                                if(isset($_SESSION["seeker"]) || isset($_SESSION["recruiter"]))
                                {
                                    
                                
                                ?>
                                <div class="header-btn  mt-1 mr-3 d-sm-block f-right d-lg-block">
                                 <?php 
                                  if(isset($_SESSION["seeker"]))
                                  {
                                      
                                        echo"<a href='seeker/index.php' class='btn head-btn1'>" . $_SESSION["name"]." </a> ";
                                        echo "<a href='logout.php' class='btn head -btn1' >Logout</a> ";
                                }
                                 else
                                {
                                    echo"<a href='recruiter/index.php' class='btn head-btn1'>" . $_SESSION["name"]." </a>";
                                    echo "<a href='logout.php' class='btn head -btn1' >Logout</a>";
                                }
                                    ?>
                                   
                                    
                                </div>
                                <?php
                                }
                               else{
                                ?>
                                <div class="header-btn mt-1 mr-3  f-right d-lg-block d-sm-block " >
                                    <a href="Auth/index.php" class="btn head-btn1">Register </a>
                                   <a href="Auth/loginform.php" class="btn head-btn1" >Login</a>
                                </div>
                                <?php
                                  }
                                ?>
                       
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                      
                            
                            <div class="mobile_menu d-block d-lg-none">
                               
                            </div>
                        </div>
                    </div>
                </div>
           </div>
       </div>
        <!-- Header End -->
    </header>