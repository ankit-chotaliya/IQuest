<?php
ob_start();
include "include/session.php";
include "include/config.php";
include "include/header.php";

if(isset($_GET["j_id"])){
    $getid=$_GET["j_id"];
    $_SESSION["quizjid"]=$_GET["j_id"];
     $precheck=$conn->prepare("SELECT ja_id FROM job_apply WHERE s_id=? AND j_id=?");
     $precheck->bindParam(1,$_SESSION["sid"]);
     $precheck->bindParam(2,$_SESSION["quizjid"] );
     $precheck->execute();
     $prerow=$precheck->rowCount();
     if($prerow>=1){
            header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();  
     }
}
?>

<?php
$sql=$conn->prepare("SELECT q.q_total,q.q_title,qq.* FROM quiz AS q,quiz_question AS qq WHERE qq.q_id=q.q_id AND q.j_id=? ORDER BY `qq`.`qu_sn` ASC");
$sql->bindParam(1,$_SESSION["quizjid"]);
if(!$sql->execute()){
     header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();
}
$row=$sql->fetchAll();

$tque=$row[0]["q_total"];
if($tque==0 || $tque=="" || $tque==null){
     header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();
}
$count=1;
?>
<?php
if(isset($_POST["submit_quiz"]) && $_SERVER["REQUEST_METHOD"]=="POST"){
    $ans=array();
    $result=0;
    // $ques=array();
    for($i=0;$i<$_POST["tque"];$i++){
        array_push($ans,$_POST["option".$i]);
        // array_push($ques,$_POST["que".$i]);
    }

   
   
    $sql2=$conn->prepare("SELECT qu_ans FROM quiz_question WHERE q_id=? ORDER BY qu_sn");
    $sql2->bindParam(1,$_POST["qid"]);
    $sql2->execute();
    $rans=$sql2->fetchAll();
   
    for($i=0;$i<$_POST["tque"];$i++){
       
        if($ans[$i]==$rans[$i]["qu_ans"]){
            $result+=1;
        }else{
            continue;
        }
        
    }
          
     $myDate = date('Y-m-d');
    $query3="INSERT INTO `job_apply` ( `j_id`, `s_id`, `q_id`, `q_result`,`ja_date`) VALUES (?,?,?,?,?)";
    $sql3=$conn->prepare($query3);
    $sql3->bindParam(1,$_SESSION["quizjid"]);
    $sql3->bindParam(2,$_SESSION["sid"]);
    $sql3->bindParam(3,$_POST["qid"]);
    $sql3->bindParam(4,$result);
    $sql3->bindParam(5,$myDate);
    
    if( $sql3->execute()){
        $sqlround=$conn->prepare("SELECT jr_id,r_num from job_round where j_id=?");
        $sqlround->bindParam(1,$_SESSION["quizjid"]);
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
          $sqlroundentry->bindParam($roundcount,$_SESSION['quizjid']);
          $roundcount+=1;
          $sqlroundentry->bindParam($roundcount,$_SESSION['sid']);
          $roundcount+=1;
          $sqlroundentry->bindParam($roundcount,$rounddata[$i]['r_num']);
        }
        $sqlroundentry->execute();
        }
        
        
        
        
        $sqlquery2 = $conn->prepare("SELECT js_id FROM job_saved WHERE s_id=? AND j_id=?");
        $sqlquery2->bindParam(1,$_SESSION["sid"]);
        $sqlquery2->bindParam(2,$_SESSION["quizjid"] );
        $sqlquery2->execute();
        if($sqlquery2->rowCount()>0){
        $sqlquery3 = $conn->prepare("DELETE FROM job_saved WHERE s_id=? AND j_id=?");
        $sqlquery3->bindParam(1,$_SESSION["sid"]);
        $sqlquery3->bindParam(2,$_SESSION["quizjid"] );
        $sqlquery3->execute();
        }
        
        echo "<script>alert('Successful Applied')</script>";
    }
    else{
        echo "<script>alert('Unsuccessful Entry Try Again!')</script>";
      
    }
    
}

if(isset($_POST["exit_quiz"]) && $_SERVER["REQUEST_METHOD"]=="POST"){
    unset($_SESSION["quizjid"]);
    header("location:index.php");
    ob_flush();
    exit();

}
if(isset($_SESSION["quizjid"])){
?>

<div class="quiz p-2" style="display:block;">
    <div class="text-center"> 
      <h4 style="color:white;font-weight:bold;">Skill test on <?php echo $row[0]["q_title"];?></h4>
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" >
    <input type="hidden" name="<?php echo "tque";?>" value="<?php echo $tque;?>">
    <input type="hidden" name="<?php echo "qid";?>" value="<?php echo $row[0]["q_id"];?>">
    <div class="container">
        <?php
        for($i=0;$i<$tque;$i++){
        ?>
        
        <div class="card  mb-2">
          <div class="card-header">
            
           <input type="hidden" name="<?php echo "que".$i;?>" value="<?php echo $row[$i]["qu_id"];?>">   
           <b >Question &nbsp;<?php echo $row[$i]["qu_sn"];?>&nbsp;::<br><br><?php echo $row[$i]["qu_que"];?></b>
          </div>
          <div class="card-body">
            <p class="card-text">
               
                <div class="
                <?php 
                    if(isset($result)){
                        if($rans[$i]["qu_ans"]==1 || $ans[$i]==1){
                          if($rans[$i]["qu_ans"]==1){ 
                            echo "alert  alert-success role='alert'";
                            }else{
                            echo "alert  alert-danger role='alert'";
                            }  
                        }
                    }
                ?>" >
                    <input 
                    class="qoption pt-2" 
                    type="radio" 
                    name="<?php echo "option".$i;?>" 
                    value="1" 
                    <?php 
                    if(isset($result)){
                        if($ans[$i]==1){
                            echo "checked";
                        }else{
                            echo "disabled";    
                        }
                    }
                    ?>
                    >&nbsp;<?php echo $row[$i]["qu_opta"];?><br><br>
                </div>
                <div class="
                <?php 
                    if(isset($result)){
                        if($rans[$i]["qu_ans"]==2 || $ans[$i]==2){
                          if($rans[$i]["qu_ans"]==2){ 
                            echo "alert  alert-success role='alert'";
                            }else{
                            echo "alert  alert-danger role='alert'";
                            }  
                        }
                    }
                ?>">
                    <input 
                    class="qoption" 
                    type="radio" 
                    name="<?php echo "option".$i;?>" 
                    value="2" 
                    <?php 
                        if(isset($result)){
                            if($ans[$i]==2){
                            echo "checked";
                        }else{
                            echo "disabled";
                        }
                    }
                    ?>
                    >&nbsp;<?php echo $row[$i]["qu_optb"];?><br><br>
                </div>
                <div class="
                <?php 
                    if(isset($result)){
                        if($rans[$i]["qu_ans"]==3 || $ans[$i]==3){
                          if($rans[$i]["qu_ans"]==3){ 
                            echo "alert  alert-success";
                            }else{
                            echo "alert  alert-danger role='alert'";
                            }  
                        }
                    }
                ?>">
                    <input 
                    class="qoption" 
                    type="radio" 
                    name="<?php echo "option".$i;?>" 
                    value="3" 
                    <?php 
                    if(isset($result)){
                        if($ans[$i]==3){
                            echo "checked";
                        }else{
                            echo "disabled";
                        }
                    }
                    ?>>&nbsp;<?php echo $row[$i]["qu_optc"];?><br><br>
                </div>
                <div class="
                <?php 
                    if(isset($result)){
                        if($rans[$i]["qu_ans"]==4 || $ans[$i]==4){
                          if($rans[$i]["qu_ans"]==4){ 
                            echo "alert  alert-success";
                            }else{
                            echo "alert  alert-danger role='alert'";
                            }  
                        }
                    }
                ?>">
                    <input 
                    class="qoption" 
                    type="radio" 
                    name="<?php echo "option".$i;?>" 
                    value="4" 
                    <?php 
                    if(isset($result)){
                        if($ans[$i]==4){
                            echo "checked";
                            }else{
                                echo "disabled";
                            }
                    }
                    ?>>&nbsp;<?php echo $row[$i]["qu_optd"];?><br><br>
                </div>
            </p>
            <?php if($count==$tque){
                if(isset($result)){
                   echo '<button type="submit" name="exit_quiz" class="btn btn-outline-primary">Exit</button>'; 
                }else{
                  echo '<button  type="submit" name="submit_quiz" class="btn btn-outline-primary">Submit</button>';  
                }
                
            }
            $count+=1;
            ?>
            
          </div>
        </div>
        <?php
        }
        ?>
    </div>
   </form>
</div>
<?php
}else{
 header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();
}?>
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
