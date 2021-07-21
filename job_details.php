<?php
ob_start();
include "include/session.php";
include "include/header.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('include/config.php');
if(isset($_POST["apply"]))
{
    try
    {
        $qid = null;
        $myDate = date('Y-m-d');
        $query="INSERT INTO job_apply(j_id,s_id,q_id,ja_date) VALUES (?,?,?,?)";
        $sqlquery = $conn->prepare($query);
        $sqlquery->bindParam(1, $_SESSION["j_detail"]);
        $sqlquery->bindParam(2 , $_SESSION["sid"]);
        $sqlquery->bindParam(3 , $qid);
        $sqlquery->bindParam(4 , $myDate);
        $sqlquery->execute();
        
        $sqlround=$conn->prepare("SELECT jr_id,r_num from job_round where j_id=?");
        $sqlround->bindParam(1,$_SESSION["j_detail"]);
        $sqlround->execute();
        $rounddata=$sqlround->fetchAll();
        $tround=$sqlround->rowCount();
        if($tround>0){
        $queryround = "
        INSERT INTO `round_apply` (`ra_id`, `jr_id`, `j_id`, `s_id`, `s_status`,`r_num`) VALUES
        ";
        for($i=0;$i<$tround;$i++){
            if($i+1==$tround){
              $queryround .="
            (NULL,?,?,?,'0',?)
            ";  
            }else{
             $queryround .="
            (NULL,?,?,?,'0',?),
            ";   
            }
            
        }
        $sqlroundentry=$conn->prepare($queryround);
        $roundcount=0;
        for($i=0;$i<$tround;$i++){
          $roundcount+=1;
          $sqlroundentry->bindParam($roundcount,$rounddata[$i]['jr_id']);
          $roundcount+=1;
          $sqlroundentry->bindParam($roundcount,$_SESSION['j_detail']);
          $roundcount+=1;
          $sqlroundentry->bindParam($roundcount,$_SESSION['sid']);
          $roundcount+=1;
          $sqlroundentry->bindParam($roundcount,$rounddata[$i]['r_num']);
        }
        $sqlroundentry->execute();
        }
        
        $sqlquery2 = $conn->prepare("SELECT js_id FROM job_saved WHERE s_id=? AND j_id=?");
        $sqlquery2->bindParam(1,$_SESSION["sid"]);
        $sqlquery2->bindParam(2,$_SESSION["j_detail"] );
        $sqlquery2->execute();
        if($sqlquery2->rowCount()>0){
        $sqlquery3 = $conn->prepare("DELETE FROM job_saved WHERE s_id=? AND j_id=?");
        $sqlquery3->bindParam(1,$_SESSION["sid"]);
        $sqlquery3->bindParam(2,$_SESSION["j_detail"] );
        $sqlquery3->execute();
        }
    }
    catch(PDOException $e)
    {
        header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();
    }
}

?>
<?php 
if(isset($_GET["id"]) || $_SESSION["j_detail"]){
    if(isset($_GET["id"]))
    {
        $_SESSION["j_detail"] = $_GET["id"];
    }
  $jid=$_SESSION["j_detail"];
  $sql=$conn->prepare("SELECT j.*,r.r_cemail,r.r_cname,r.r_cwblink,r.r_cdesc,r.r_img FROM job_details AS j ,rc_details AS r WHERE j.j_id=? AND r.r_id=j.r_id ");
  $sql->bindParam(1,$jid);
  $sql->execute();
  $row=$sql->fetch(PDO::FETCH_ASSOC);
?>
<main> 
<!-- Hero Area Start-->
     <?php 
        if($row["j_cat"]=="InformationTechnology"){
     ?>
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/information.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Information Technology</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
         <?php 
            }
         ?>
              <?php 
        if($row["j_cat"]=="DesignandDevelopment"){
     ?>
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/development.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Design & Development</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
         <?php 
            }
         ?>
              <?php 
        if($row["j_cat"]=="DesignandCreative"){
     ?>
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/creative.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Design & Creative</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
         <?php 
            }
         ?>
              <?php 
        if($row["j_cat"]=="SalesandMarketing"){
     ?>
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/sales.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Sales & Marketing</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
         <?php 
            }
         ?>
              <?php 
        if($row["j_cat"]=="MobileApplication"){
     ?>
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/mobile.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Mobile Application</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
         <?php 
            }
         ?>
              <?php 
        if($row["j_cat"]=="Construction"){
     ?>
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/contra.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Construction</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
         <?php 
            }
         ?>
              <?php 
        if($row["j_cat"]=="RealEstate"){
     ?>
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/realestate.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Real Estate</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
         <?php 
            }
         ?>
              <?php 
        if($row["j_cat"]=="ContentWriter"){
     ?>
        <div class="slider-area ">
        <div class="single-slider section-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/content.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Content Writer</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
         <?php 
            }
         ?>
        <!-- Hero Area End -->
        <!-- job post company Start -->
        <div class="job-post-company pt-120 pb-120">
            <div class="container">
                <div class="row justify-content-between">
                    <!-- Left Content -->
                    <div class="col-xl-7 col-lg-8">
                        <!-- job single -->
                        <div class="single-job-items mb-50">
                            <div class="job-items">
                                <div class="company-img company-img-details">
                                    <a href="#"><img src="recruiter/uploads/<?php echo $row["r_img"];?>" alt=""></a>
                                </div>
                                <div class="job-tittle">
                                    <a href="#">
                                        <h4> <?php echo $row["j_title"]   ?></h4>
                                    </a>
                                    <ul>
                                        <li> <?php  echo  $row['r_cname'] ?? 'default value';   ?></li>
                                        <li><i class="fas fa-map-marker-alt"></i>  <?php echo $row["j_loc"]  ?></li>
                                        <li>  &#8377;  <?php echo $row["j_minsalary"]  ?>  - &#8377; <?php echo $row["j_maxsalary"]  ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                          <!-- job single End -->
                       
                        <div class="job-post-details">
                            <div class="post-details1 mb-50">
                                <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Job Description</h4>
                                </div>
                                <p><?php echo $row["j_desc"]  ?></p>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Required Knowledge, Skills, and Abilities</h4>
                                </div>
                               <p> <?php echo $row["j_req"]  ?></p>
                            </div>
                            <div class="post-details2  mb-50">
                                 <!-- Small Section Tittle -->
                                <div class="small-section-tittle">
                                    <h4>Education + Experience</h4>
                                </div>
                               <p><?php echo $row["j_eduex"]  ?></p>
                            </div>
                        </div>

                    </div>
                    <!-- Right Content -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="post-details3  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Job Overview</h4>
                           </div>
                          <ul>
                              <li>Posted date : <span><?php echo $row["j_postdate"]  ?></span></li>
                              <li>Location : <span><?php echo $row["j_loc"]  ?></span></li>
                              <li>Vacancy : <span><?php echo $row["j_vacancy"]  ?></span></li>
                              <li>Job Type : <span><?php echo $row["j_type"]  ?></span></li>
                              <li>Salary Range :  <span>&#8377;  <?php echo $row["j_minsalary"]  ?>  - &#8377; <?php echo $row["j_maxsalary"]  ?></span></li>
                              <li>Deadline : <span><?php echo $row["j_deadline"]  ?></span></li>
                          </ul>
                         <div class="apply-btn2">
                             <?php
                                    if(isset($_SESSION["seeker"]))
                                    {
                                        try
                                        {
                                            $queryforapply = $conn->prepare("SELECT ja_id FROM job_apply WHERE j_id = ? && s_id = ?");
                                            $queryforapply->bindParam(1, $row["j_id"]);
                                            $queryforapply->bindParam(2, $_SESSION["sid"]);
                                            if($queryforapply->execute())
                                            {
                                                $num = $queryforapply->rowCount();
                                                if($num == 1)
                                                {
                                                     echo "<a href='#' class='btn'>Applied</a>";    
                                                }
                                                else
                                                {
                                                    $query=$conn->prepare("SELECT q_id FROM quiz WHERE j_id = ? ");
                                                    $query->bindParam(1, $row["j_id"]);
                                                    $query->execute();
                                                    $num=$query->rowCount();
                                                    if($num==1)
                                                    {
                                                         echo "<a href='quiz.php?j_id=". $row["j_id"] ."' class='btn'>Apply For SkillTest</a>";   
                                                    }
                                                    else{
                                                         echo "
                                                         <form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) ."' method='post' >
                                                         <button name='apply' class='btn'>Apply Now</button>
                                                         </form>";     
                                                    }   
                                                }
                                            }
                                        }
                                        catch(Exception $e){
                                            header("location: https://qualifind.rushilshah.in/error.php");
                                            ob_flush();
                                            exit();
                                        }
                                    }
                                    else
                                    {
                                        echo "<a href='Auth/loginform.php' class='btn'>Apply</a>";    
                                    }
                                    
                             ?>
                         </div>
                       </div>
                        <div class="post-details4  mb-50">
                            <!-- Small Section Tittle -->
                           <div class="small-section-tittle">
                               <h4>Company Information</h4>
                           </div>
                              <span><?php echo $row["r_cname"]  ?>  </span>
                              <p><?php echo $row["r_cdesc"]  ?></p>
                            <ul>
                                <li>Name: <span><?php echo $row["r_cname"]  ?>  </span></li>
                                <li>Web : <span> <?php echo $row["r_cwblink"]  ?></span></li>
                                <li>Email: <span><?php echo $row["r_cemail"]  ?></span></li>
                            </ul>
                       </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- job post company End -->
</main>
<?php 
}
else{
  header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();

}
?>
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
