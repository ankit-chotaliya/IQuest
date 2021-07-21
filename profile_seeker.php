<?php 
ob_start();
include "include/session.php";
include "include/header.php";
include "include/config.php";

if(isset($_GET["sid"])){
  $getcat=$_GET["sid"];  
}else{
            header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit(); 
}

try
{
 
        $sqlquery = $conn->prepare("SELECT * FROM st_details WHERE s_id=? ");
        $sqlquery->bindParam(1,$_GET["sid"] );
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
                    <img src="  <?php echo "seeker/uploads/". $row["s_img"]; ?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>  <?php echo $row["s_name"]; ?></h4>
                      <p class="text-secondary mb-1">
                          <?php
                                $sqlquery2 = $conn->prepare("SELECT sad_desc,sad_wsample,sad_resume FROM st_adetails WHERE s_id=? ");
                                $sqlquery2->bindParam(1,$_GET["sid"] );
                                $sqlquery2->execute();
                                $num2=$sqlquery2->rowCount();
    
                                
                                    $row2=$sqlquery2->fetch(PDO::FETCH_ASSOC);
                                    echo $row2["sad_desc"];
                                  
                               
                                  
                                                  
                          ?>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Work-Sample</h6>
                    <a target="_blank" href="<?php  echo $row2["sad_wsample"];  ?>" class="text-secondary ">Check Out</a>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>&nbsp;&nbsp;Resume</h6>
                    <a target="_blank" href="<?php  echo $row2["sad_resume"];  ?>" class="text-secondary ">Check Out</a>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h5 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>&nbsp;&nbsp;Skills</h5>
                   
                  </li>
                  <?php
                   $sqlquery3= $conn->prepare("SELECT st.* FROM st_skill AS sk, skill AS st WHERE st.sk_id=sk.sk_id AND sk.s_id=?");
                   $sqlquery3->bindParam(1,$_GET["sid"] );
                   $sqlquery3->execute();
                   $num3=$sqlquery3->rowCount();
                   $row3=$sqlquery3->fetchAll();
                   for($i=0;$i<$num3;$i++ )
                   {
                     
                  echo '<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    
                    <h6 class="mb-0 ">'.$row3[$i]["sk_name"].'</h6>
                    
                  </li>'; 
                   }
                   
                ?>
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
                      <?php echo $row["s_name"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row["s_email"]; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                       <?php echo "+91 ". $row["s_mbno"]; ?>

                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Whatsapp Number</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "+91 ". $row["s_wpno"]; ?>
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
               <!--/gutters-sm-->
              <div class="row">
                <div class="col-12">
                  <div class="card h-100">
                    <div class="card-body" >
                      <h6 class="d-flex align-items-center mb-3">
                      <i class="material-icons text-info mr-2">Educational Details</i></h6>
                      <table class="table table-striped" id="edutable">
                          
                          <?php 
                          $sqlquery4= $conn->prepare("SELECT * FROM st_background WHERE s_id=? ");
                          $sqlquery4->bindParam(1,$_GET["sid"] );
                          $sqlquery4->execute();
                          $num4=$sqlquery4->rowCount();
                          if($num4==0){
                              echo '<p>No Educational record found</p>';
                          }else{
                              
                          $row4=$sqlquery4->fetchAll();
                          echo '<thead>
                            <tr>
                              <th scope="col w-100">Qualification</th>
                              <th scope="col">Name</th>
                              <th scope="col">Passout Year</th>
                              <th scope="col">Result</th>
                            </tr>
                          </thead>
                          <tbody>'; 
                          for($i=0;$i<$num4;$i++)
                          {
                              
                              echo '<tr>
                              <th scope="row">'.$row4[$i]["sb_qualify"] .'</th>
                              <td>'.$row4[$i]["sb_clg"].'</td>
                              <td>'.$row4[$i]["sb_passyr"].'</td>
                              <td>'.$row4[$i]["sb_result"].'</td>
                            </tr>';
                          }
                          }
                        ?>
                        
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
                <div class="col-12 mb-3 mt-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">
                     <i class="material-icons text-info mr-2"> Achievements</i></h6>
                      <table class="table table-striped" id="achievetable">
                          
                          <?php 
                          $sqlquery4= $conn->prepare("SELECT * FROM st_achievement WHERE s_id=? ");
                          $sqlquery4->bindParam(1,$_GET["sid"] );
                          $sqlquery4->execute();
                          $num4=$sqlquery4->rowCount();
                          if($num4==0){
                             echo '<p>No Achievement record found</p>'; 
                          }else{
                          $row4=$sqlquery4->fetchAll();
                           echo '<thead>
                            <tr>
                              <th scope="col">Title</th>
                              <th scope="col">Time</th>
                              <th scope="col">Level</th>
                              <th scope="col">Certificate</th>
                            </tr>
                          </thead>
                          <tbody>'; 
                          for($i=0;$i<$num4;$i++)
                          {
                              echo '<tr>
                              <th scope="row">'.$row4[$i]["sa_title"] .'</th>
                              <td>'.$row4[$i]["sa_time"].'</td>
                              <td>'.$row4[$i]["sa_level"].'</td>
                              <td><a style="color:black;" href="seeker/uploads/certificate/'.$row4[$i]["sa_certificate"].'">Check Out</a></td>
                            </tr>';
                          }
                          }
                        ?>
                          </tbody>
                        </table>
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



    