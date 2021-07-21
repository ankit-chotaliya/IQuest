<?php
include "include/session.php";
include "include/header.php";

error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("include/config.php");
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <main>

        <!-- slider Area Start-->
        <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" id="main-img" >
                    <div class="container">
                        <div class="row">
                
                        </div>
                        <!-- Search Box -->
                        <div class="row search">
                            <div class="col-xl-8">
                                <!-- form -->
                                <form action="findajob.php" method="GET" class="search-box">
                                    <div class="input-form">
                                        <input type="hidden" name="page" value="1" placeholder="Job Tittle or keyword">
                                    </div>
                                    <div class="select-form">
                                        <div class="select-itms">
                                            <select name="cat" id="select1">
                                                <option value="DesignandCreative">Design & Creative</option>
                                        <option value="DesignandDevelopment">Design & Development</option>
                                        <option value="SalesandMarketing">Sales & Marketing</option>
                                        <option value="MobileApplication">Mobile Application</option>
                                        <option value="Construction">Construction</option>
                                        <option value="InformationTechnology">Information Technology</option>
                                        <option value="RealEstate">Real Estate</option>
                                        <option value="ContentWriter">Content Writer</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="search-form">
                                        <button class="btn head-btn1 searchbtn" type="submit">Find job</button>
                                    </div>	
                                </form>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider Area End-->
        <!-- Our Services Start -->
        <div class="our-services section-pad-t30">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            
                            <h2>Browse Top Categories </h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-contnet-center">
                    <?php
                    $sql=$conn->prepare("SELECT * FROM job_details WHERE j_cat = 'DesignandCreative' && j_status='1'");
                    $sql->execute();
                    $num = $sql->rowCount();
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="findajob.php?page=1&cat=DesignandCreative">Design & Creative</a></h5>
                                <span>(<?php echo $num;?>)</span>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql=$conn->prepare("SELECT * FROM job_details WHERE j_cat = 'DesignandCreative' && j_status='1'");
                    $sql->execute();
                    $num = $sql->rowCount();
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-cms"></span>
                            </div>
                            
                            <div class="services-cap">
                               <h5><a href="findajob.php?page=1&cat=DesignandDevelopment">Design & Development</a></h5>
                                <span>(<?php echo $num; ?>)</span>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql=$conn->prepare("SELECT * FROM job_details WHERE j_cat = 'SalesandMarketing' && j_status='1'");
                    $sql->execute();
                    $num = $sql->rowCount();
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-report"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="findajob.php?page=1&cat=SalesandMarketing">Sales & Marketing</a></h5>
                                <span>(<?php echo $num; ?>)</span>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql=$conn->prepare("SELECT * FROM job_details WHERE j_cat = 'MobileApplication' && j_status='1'");
                    $sql->execute();
                    $num = $sql->rowCount();
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-app"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="findajob.php?page=1&cat=MobileApplication">Mobile Application</a></h5>
                                <span>(<?php echo $num; ?>)</span>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql=$conn->prepare("SELECT * FROM job_details WHERE j_cat = 'Construction' && j_status='1'");
                    $sql->execute();
                    $num = $sql->rowCount();
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-helmet"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="findajob.php?page=1&cat=Construction">Construction</a></h5>
                                <span>(<?php echo $num; ?>)</span>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql=$conn->prepare("SELECT * FROM job_details WHERE j_cat = 'InformationTechnology' && j_status='1'");
                    $sql->execute();
                    $num = $sql->rowCount();
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-high-tech"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="findajob.php?page=1&cat=InformationTechnology">Information Technology</a></h5>
                                <span>(<?php echo $num; ?>)</span>
                            </div>
                        </div>
                    </div>
                     <?php
                    $sql=$conn->prepare("SELECT * FROM job_details WHERE j_cat = 'RealEstate' && j_status='1'");
                    $sql->execute();
                    $num = $sql->rowCount();
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-real-estate"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="findajob.php?page=1&cat=RealEstate">Real Estate</a></h5>
                                <span>(<?php echo $num; ?>)</span>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql=$conn->prepare("SELECT * FROM job_details WHERE j_cat = 'DesignandCreative' && j_status='1'");
                    $sql->execute();
                    $num = $sql->rowCount();
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-services text-center mb-30">
                            <div class="services-ion">
                                <span class="flaticon-content"></span>
                            </div>
                            <div class="services-cap">
                               <h5><a href="findajob.php?page=1&cat=ContentWriter">Content Writer</a></h5>
                                <span>(<?php echo $num; ?>)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- More Btn -->
                <!-- Section Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="browse-btn2 text-center mt-50">
                            <a href="findajob.php?page=1" class="border-btn2">Browse All Categories</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services End -->

        <!-- Featured_job_start -->
        <!--<section class="featured-job-area p-5 m-5" style="border:3px solid #1f2b7b">-->
        <!--    <video src="/assets/video/qualifind.mp4" controls width="100%" height="700vh"></video>-->
        <!--</section>-->
        <section class="featured-job-area">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12" >
                        <div class="section-tittle text-center" >
                            <h2>Featured Jobs</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <?php
                    $sql=$conn->prepare("SELECT r.r_img,j.j_title,j.j_cat,j.j_id,j.j_maxsalary,j.j_minsalary,j.j_loc,j.j_postdate FROM job_details AS j, rc_details AS r WHERE j.j_status = '1' AND r.r_id=j.r_id LIMIT 0,5");
                    $sql->execute();
                    $result=$sql->fetchAll();
                    $total_row=$sql->rowCount();
                    // $sql2=$conn->prepare("SELECT j_id FROM `job_saved` WHERE s_id=?");
                    // $sql2->bindParam(1,$_SESSION['sid']);
                    // $sql2->execute();
                    // $result2=$sql2->fetchAll();
                    // $total_row1=$sql2->rowCount();
                    // $b=array(0);
                    // for($i=0;$i<$total_row1;$i++){
                    //      array_push($b,$result2[$i]["j_id"]);
                    // }
                   
                   
                    if($total_row > 0)
                    
                    
                    
         {
          foreach($result as $row)
          {
           if($row["j_cat"]=="DesignandCreative") $jobcat="Design & Creative";
           if($row["j_cat"]=="DesignandDevelopment") $jobcat="Design & Development";
           if($row["j_cat"]=="SalesandMarketing") $jobcat="Sales & Marketing";
           if($row["j_cat"]=="MobileApplication") $jobcat="Mobile Application";
           if($row["j_cat"]=="Construction") $jobcat="Construction";
           if($row["j_cat"]=="InformationTechnology") $jobcat="Information Technology";
           if($row["j_cat"]=="RealEstate") $jobcat="Real Estate";
           if($row["j_cat"]=="ContentWriter") $jobcat="Content Writer";
           echo '
        		<div class="single-job-items mb-30">
                                            <div class="job-items">
                                                <div class="company-img">
                                                    <a href="#"><img src="recruiter/uploads/'.$row['r_img'].'" width="85px" height="85px" style="border: 1px solid #1f2b7b; padding:3px;" alt=""></a>
                                                </div>
                                                <div class="job-tittle job-tittle2">
                                                    <a href="#">
                                                        <h4>'.$row["j_title"].'</h4>
                                                    </a>
                                                    <ul>
                                                        <li>'.$jobcat.'</li>
                                                        <li><i class="fas fa-map-marker-alt"></i>'.$row["j_loc"].'</li>
                                                        <li>&#x20B9;'.$row["j_minsalary"].'- &#x20B9;'.$row["j_maxsalary"].'</li>
                                                         
                                                    </ul>
                                                     <span>Post on:'.date("d-m-y",strtotime($row["j_postdate"])).'</span>
                                                </div>
                                            </div>
                                            <div class="items-link items-link2 f-right">
                                                <a href="job_details.php?id='.$row["j_id"].'">Apply</a>
                                                
                                               
                                            </div>
                                        </div>
        		';
                                                
          }
        }else
            {
            	echo '
            		<h3 align="center">No Product Found</h3>
            	';
            }

            echo '
            </div>
            ';
                    ?>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- Featured_job_end -->
        <!-- How  Apply Process Start-->
        <div class="apply-process-area apply-bg pt-150 pb-150" data-background="assets/img/gallery/how-applybg.png">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle white-text text-center">
                            <span>Apply process</span>
                            <h2> How it works</h2>
                        </div>
                    </div>
                </div>
                <!-- Apply Process Caption -->
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-search"></span>
                            </div>
                            <div class="process-cap">
                               <h5>1. Search a job</h5>
                               <p>Search for your dream job / intership using our different kind of filters.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-curriculum-vitae"></span>
                            </div>
                            <div class="process-cap">
                               <h5>2. Apply for job</h5>
                               <p>You are just an click away from your dream job. Don't worry its not a clickbait!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-process text-center mb-30">
                            <div class="process-ion">
                                <span class="flaticon-tour"></span>
                            </div>
                            <div class="process-cap">
                               <h5>3. Get your job</h5>
                               <p>Get your dream job so that, you won't have to search again.</p>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>
        <!-- How  Apply Process End-->
     
         <!-- Support Company Start-->
         <div class="support-company-area support-padding fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="right-caption">
                            <!-- Section Tittle -->
                            <div class="section-tittle section-tittle2">
                                
                                <h2>Your Goal is Our Vision</h2>
                            </div>
                            <div class="support-caption">
                                <p class="pera-top">
                                    <ul>
                                        <li>- Intern with a Large Company to Gain Experience</li>
                                        <li>- Improve Employee Satisfaction</li>
                                        <li>- Prioritize job preference</li>
                                        <li>- Expand your professional network</li>
                                        <li>- Stretch your role</li>
                                        <li>- Be open to outside opportunities</li>
                                    </ul>
                                </p>
                                <?php if(isset($_SESSION['recruiter'])){
                                ?>
                                <a href="recruiter/createjob.php" class="btn post-btn">Post a job</a>
                                <?php
                                }elseif(isset($_SESSION['seeker'])){
                                ?>
                                <a href="findajob.php?page=1" class="btn post-btn">Find a job</a>
                                <?php
                                } else{
                                    
                                ?>
                                <a href="Auth/loginform.php" class="btn post-btn">Login / Register</a>
                                <?php 
                                }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="support-location-img">
                            
                            <img src="assets/img/service/support.jpg" alt="">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Support Company End-->
        <!-- Blog Area Start -->
        <div class="home-blog-area blog-h-padding">
            <div class="container">
                <!-- Section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle text-center">
                            <span>Our latest blog</span>
                            <h2>Our recent blogs</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="home-blog-single mb-30">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src="assets/img/blog/home-blog-1.png" alt="">
                                    <!-- Blog date -->
                                    <div class="blog-date text-center">
                                        <span>24</span>
                                        <p>Now</p>
                                    </div>
                                </div>
                                <div class="blog-cap">
                                    <p>|   Survey</p>
                                    <h3><a href="#">8 in 10 Gen Z Workers hopeful of finding meaningful work in 2030</a></h3>
                                    <a href="#" class="more-btn">Read more »</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="home-blog-single mb-30">
                            <div class="blog-img-cap">
                                <div class="blog-img">
                                    <img src="assets/img/blog/home-blog-2.png" alt="">
                                    <!-- Blog date -->
                                    <div class="blog-date text-center">
                                        <span>24</span>
                                        <p>Now</p>
                                    </div>
                                </div>
                                <div class="blog-cap">
                                    <p>|    Properties</p>
                                    <h3><a href="#">What does the new normal look like in jobs sector?</a></h3>
                                    <a href="#" class="more-btn">Read more »</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Area End -->

    </main>
<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <script src="./assets/js/price_rangs.js"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
		<script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="./assets/js/jquery.scrollUp.min.js"></script>
        <script src="./assets/js/jquery.nice-select.min.js"></script>
		<script src="./assets/js/jquery.sticky.js"></script>
        
        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>
        <?php include "include/footer.php"; ?>
    </body>
</html>