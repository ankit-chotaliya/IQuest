<?php

include "include/header.php";
include "include/session.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
// include "../include/config.php";
require_once('include/config.php');
if(isset($_GET["cat"])){
  $getcat=$_GET["cat"];  
}else{
    $getcat="any";
}

if(isset($_GET["page"])){
  $pnum=$_GET["page"];  
}else{
    $pnum=1;
}

?>
<main>

        <!-- Hero Area Start-->
        <div class="slider-area ">
            <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/find.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Find Your Job</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero Area End -->
        <!-- Job List Area Start -->
        <div class="job-listing-area pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <!-- Left content -->
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="row">
                            <div class="col-12">
                                    <div class="small-section-tittle2 mb-45">
                                    <div class="ion"> <svg 
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="20px" height="12px">
                                    <path fill-rule="evenodd"  fill="#1f2b7b"
                                        d="M7.778,12.000 L12.222,12.000 L12.222,10.000 L7.778,10.000 L7.778,12.000 ZM-0.000,-0.000 L-0.000,2.000 L20.000,2.000 L20.000,-0.000 L-0.000,-0.000 ZM3.333,7.000 L16.667,7.000 L16.667,5.000 L3.333,5.000 L3.333,7.000 Z"/>
                                    </svg>
                                    </div>
                                    <h4>Filter Jobs</h4>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- Job Category Listing start -->
                        <div class="job-category-listing mb-50">
                            <!-- single one -->
                            <div class="single-listing">
                               <div class="small-section-tittle2">
                                     <h4>Job Category</h4>
                               </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select class="catagory">
                                        <option value="0">All Category</option>
                                        <option value="DesignandCreative" <?php if($getcat=="DesignandCreative"){echo "selected";}?>>Design & Creative</option>
                                        <option value="DesignandDevelopment" <?php if($getcat=="DesignandDevelopment"){echo "selected";}?>>Design & Development</option>
                                        <option value="SalesandMarketing" <?php if($getcat=="SalesandMarketing"){echo "selected";}?>>Sales & Marketing</option>
                                        <option value="MobileApplication" <?php if($getcat=="MobileApplication"){echo "selected";}?>>Mobile Application</option>
                                        <option value="Construction" <?php if($getcat=="Construction"){echo "selected";}?>>Construction</option>
                                        <option value="InformationTechnology" <?php if($getcat=="InformationTechnology"){echo "selected";}?>>Information Technology</option>
                                        <option value="RealEstate" <?php if($getcat=="RealEstate"){echo "selected";}?>>Real Estate</option>
                                        <option value="ContentWriter" <?php if($getcat=="ContentWriter"){echo "selected";}?>>Content Writer</option>
                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Job Type</h4>
                                    </div>
                                    <label class="container ">Full Time
                                        <input type="checkbox" class="common_selector jt" value="FullTime">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Part Time
                                        <input type="checkbox" class="common_selector jt" value="PartTime">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Intership
                                        <input type="checkbox" class="common_selector jt" value="Internship">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single two -->
                            <div class="single-listing">
                               <div class="small-section-tittle2">
                                     <h4>Job Location</h4>
                               </div>
                                <!-- Select job items start -->
                                <div class="select-job-items2">
                                    <select class="location">
                                        <option value="0">Anywhere</option>
                                        <option value="Ahmedabad">Ahmedabad</option>
                                        <option value="Banglore">Banglore</option>
                                        <option value="Mumbai">Mumbai</option>
                                        <option value="Pune">Pune</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Indore">Indore</option>
                                        <option value="Vadodara">Vadodara</option>
                                    </select>
                                </div>
                                <!--  Select job items End-->
                                <!-- select-Categories start -->
                                <div class="select-Categories pt-80 pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Experience</h4>
                                    </div>
                                    <label class="container">10th passout
                                        <input type="checkbox" class="common_selector ex" value="10">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">12th passout
                                        <input type="checkbox" class="common_selector ex" value="12">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Diploma
                                        <input type="checkbox" class="common_selector ex" value="diploma">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Undergraduate
                                        <input type="checkbox" class="common_selector ex" value="undergraduate">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Postgraduate
                                        <input type="checkbox" class="common_selector ex" value="postgraduate">
                                        <span class="checkmark"></span>
                                    </label>
                                    
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <!-- single three -->
                            <div class="single-listing">
                                <!-- select-Categories start -->
                                <div class="select-Categories pb-50">
                                    <div class="small-section-tittle2">
                                        <h4>Posted Within</h4>
                                    </div>
                                    <label class="container">Any
                                        <input type="checkbox" class="common_selector pw" checked="checked active" value="any">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Today
                                        <input type="checkbox" class="common_selector pw"  value="0">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 2 days
                                        <input type="checkbox" class="common_selector pw" value="2">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 3 days
                                        <input type="checkbox" class="common_selector pw" value="3">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 5 days
                                        <input type="checkbox" class="common_selector pw" value="5">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="container">Last 10 days
                                        <input type="checkbox" class="common_selector pw" value="10">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <!-- select-Categories End -->
                            </div>
                            <div class="single-listing">
                                <!-- Range Slider Start -->
                                <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow">
                                    <div class="small-section-tittle2">
                                        <h4>Filter Jobs</h4>
                                    </div>
                                    <div class="widgets_inner">
                                        
                                        <div class="range_item">
                                            <!-- <div id="slider-range"></div> -->
                                            <input type="text" class="js-range-slider" value="" />
                                            <div class="d-flex align-items-center">
                                                <div class="price_text">
                                                    <p>Salary Range:</p>
                                                </div>
                                                <div class="price_value d-flex justify-content-center">
                                                    <input type="text" class="js-input-from" id="amount"  readonly />
                                                    <span>to</span>
                                                    <input type="text" class="js-input-to" id="amount"  readonly />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                              <!-- Range Slider End -->
                            </div>
                        </div>
                        <!-- Job Category Listing End -->
                    </div>
                    <!-- Right content -->
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <!-- Featured_job_start -->
                        <?php
           
           $query2="
           SELECT * FROM job_details WHERE j_status=1
           " ;
           if($getcat!="any"){
               $query2.="
               AND j_cat='".$getcat."'
               ";
           }
            $sql2=$conn->prepare($query2);
            $sql2->execute();
            $trecord=$sql2->rowCount();
            $tpage=(int)($trecord/9)+1;
           
            
        ?>
                        <section class="featured-job-area"  >
                                <div class="row">
                                            <div class="col-lg-12">
                                                <div class="count-job mb-35">
                                                    <span class="ml-4"><?php echo $trecord; ?> Jobs found</span>
                                                    <!-- Select job items start -->
                                                    <div class="select-job-items">
                                                        <span>Sort by</span>
                                                        <select class="sort">
                                                            <option value="0">None</option>
                                                            <option value="lf">Latest First</option>
                                                            <option value="dd">Deadline</option>
                                                            <option value="ms">Max. Salary</option>
                                                        </select>
                                                    </div>
                                                    <!--  Select job items End-->
                                                </div>
                                            </div>
                                        </div>
                           <div id="load_product" >
                               
                               
                           </div>
                        </section>
                        <!-- Featured_job_end -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Job List Area End -->
        <!--Pagination Start  -->
        
        <div class="pagination-area pb-115 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                   <?php
                                  
                                    for($i = 1; $i <= $tpage; $i++)
                                {
                                   
                                ?>
                                    <li class="page-item <?php if($pnum==$i){echo "active";}?>"><a class="page-link" href="findajob.php?page=<?php echo $i; ?><?php if($getcat!="any"){echo "&cat="; echo $getcat;}?>"><?php echo $i; ?></a></li>
                                   
                                    <?php
                                } 
                                    ?>
                                <li class="page-item"><a class="page-link" href="findajob.php?page=<?php if($pnum!=$tpage){echo $pnum+1;} else{echo $pnum;}  ?><?php if($getcat!="any"){echo "&cat="; echo $getcat;}?>" ><span class="ti-angle-right"></span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Pagination End  -->
        
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
