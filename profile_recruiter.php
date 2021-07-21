<?php 
ob_start();
include "include/session.php";
include "include/header.php";
include "include/config.php";

if(isset($_GET["rid"])){
  $getcat=$_GET["rid"];  
}
if(isset($_SESSION["seeker"]) or isset($_SESSION["admin"])){
    
}else{
    header("location:Auth/loginform.php");
    ob_flush();
    exit();
}

try
{
 
        $sqlquery = $conn->prepare("SELECT * FROM rc_details WHERE r_id=? ");
        $sqlquery->bindParam(1,$_GET["rid"] );
        $sqlquery->execute();
        $num=$sqlquery->rowCount();
        if($num==1)
        {
            $row=$sqlquery->fetch(PDO::FETCH_ASSOC);
            
        }else{
             header("location: https://qualifind.rushilshah.in/error.php");
             ob_flush();
             exit(); 
        }

?>

<div class="container">
    <div class="main-body">
    
          
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="  <?php echo "recruiter/uploads/". $row["r_img"]; ?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>  <?php echo $row["r_name"]; ?></h4>
                      <p class="text-secondary mb-1">
                         
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                    <?php 
                    if($row["r_cwblink"]!=null){ ?>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Company Info</h6>
                    <a target="_blank" href="<?php  echo $row["r_cwblink"];  ?>" class="text-secondary ">Check Out</a>
                  </li>
                    <?php 
                    }
                    ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>&nbsp;&nbsp;Company</h5>
                     <p class="text-secondary"> <?php echo $row["r_cname"]; ?></p>
                  </li>
                    <?php 
                    $sqlquery2= $conn->prepare("SELECT r_id FROM job_details WHERE r_id=?");
                    $sqlquery2->bindParam(1,$_GET["rid"] );
                    $sqlquery2->execute();
                    $num2=$sqlquery2->rowCount();
                    
                    
                    ?> 
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>&nbsp;&nbsp;Posted Jobs</h6>
                    <p class="text-secondary"> <?php echo $num2; ?></p>
                  </li>
                  
                  
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row["r_name"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row["r_email"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                       <?php echo "+91 ". $row["r_mobno"]; ?>

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Whatsapp Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "+91 ". $row["r_wpno"]; ?>
                    </div>
                  </div>
                  <hr>
                  
                  
                  <div class="row">
                    <div class="col-sm-12">
                     
                    </div>
                  </div>
                </div>
              </div>
              <?php 
                    }
                    catch(PDOException $e)
                    {
                         header("location: https://qualifind.rushilshah.in/error.php");
                            ob_flush();
                            exit(); 
                    }
              ?>

              <div class="row gutters-sm">
                <div class="col-md-12">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Company descrisption</i></h6>
                      <p> <?php  echo $row["r_cdesc"];?></p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-12 mb-3 mt-3">
                  <div class="card h-100">
                    <div class="card-body">
                        <?php
                        $sql=$conn->prepare("SELECT review_id FROM review WHERE s_id=? AND r_id=?");
                        $sql->bindParam(1,$_SESSION["sid"]);
                        $sql->bindParam(2,$_GET["rid"]);
                        $sql->execute();
                        $ava=$sql->rowCount();
                        if($ava>0){
                            echo '  <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Already Given</i></h6>';
                        }else{
                        ?>
                      <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">Give a Review</i></h6>
                        
                                <div class="card">
                              <div class="card-header fs-2 font-weight-bold">
                                 <h5><?php if(isset($_SESSION["name"])) { echo $_SESSION["name"]; }
                                 
                                 ?></h5> 
                              </div>
                              <div class="card-body">
                                <h5 class="card-title">
                                    <span class="fa fa-star ratingchecked rateButton"></span>
                                    <span class="fa fa-star ratingunchecked rateButton"></span>
                                    <span class="fa fa-star ratingunchecked rateButton"></span>
                                    <span class="fa fa-star ratingunchecked rateButton"></span>
                                    <span class="fa fa-star ratingunchecked rateButton"></span> </h5>
                                 
                                <form id="ratingForm" method="POST">
                                    <input type="hidden" class="form-control" id="rating" name="rating" value="1">
                                    <input type="hidden" class="form-control"  name="rid" value="<?php echo $getcat; ?>">
                                    <input type="hidden" class="form-control"  name="sid" value="<?php echo $_SESSION["sid"]; ?>">
                                  <div class="card mb-2">
                                      <textarea id=review name="review"  placeholder="Describe yourself here..." rows=10 cols=100>  </textarea>
                                      
                                  </div> 
                                  
        
    
                                    <button type="submit"  class="btn btn-primary">Post</butoon> 
                                    </form>
                                  </div>
                        </div>
                        <?php } ?>
                         <h6 class="d-flex align-items-center mb-2 mt-2"><i class="material-icons text-info mr-2">Reviews and Ratings</i></h6>
                        
                        <?php 
                        $sql2=$conn->prepare("SELECT r.review_star,r.review_cmt,s.s_name FROM review AS r, st_details AS s WHERE r.r_id=? AND r.s_id=s.s_id  ORDER BY review_id DESC");
                        $sql2->bindParam(1,$getcat);
                        $sql2->execute();
                        $row2=$sql2->fetchAll();
                        $trow=$sql2->rowCount();
                        $count=1;
                        if($trow==0){
                            echo ' <h6 class="d-flex align-items-center mb-2 mt-2"><i class="material-icons mr-2"> No review available!! Be the first to give review</i></h6>';
                        }
                        for($i=0;$i<$trow;$i++){
                           ?>
                        
                         <div class="card mt-1 ">
                              <div class="card-header fs-2 font-weight-bold">
                                 <h5><h5 class="card-title">
                                    <span class="fa fa-star <?php if($count<=$row2[$i]["review_star"]){echo "ratingchecked";$count+=1;}else{ echo "ratingunchecked";} ?>"></span>
                                    <span class="fa fa-star <?php if($count<=$row2[$i]["review_star"]){echo "ratingchecked";$count+=1;}else{ echo "ratingunchecked";} ?>" ></span>
                                    <span class="fa fa-star <?php if($count<=$row2[$i]["review_star"]){echo "ratingchecked";$count+=1;}else{ echo "ratingunchecked";} ?>"></span>
                                    <span class="fa fa-star <?php if($count<=$row2[$i]["review_star"]){echo "ratingchecked";$count+=1;}else{ echo "ratingunchecked";} ?>"></span>
                                    <span class="fa fa-star <?php if($count<=$row2[$i]["review_star"]){echo "ratingchecked";$count+=1;}else{ echo "ratingunchecked";} ?>"></span>
                                    <P class="float-right"> <?php echo $row2[$i]["s_name"]; ?></P>
                                    </h5></h5>
                                    
                              </div>
                            
                              <div class="card-body">
                                
                                
                                  <div class="card mb-2">
                                      <textarea   rows=2 cols=100 readonly > <?php echo $row2[$i]["review_cmt"]; ?> </textarea>
                                      
                                  </div> 
                                  
        
    
                                  </div>
                        </div>
                 <?php     
                  $count=1; 
                            
                        } 
                      ?>
                        
                       
                    </div>
                  </div>
                </div>
              </div>



            </div>
          </div>

        </div>
    </div>
    
    
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
   
</html>
