<?php
ob_start();
include "include/session.php";
    include "include/header.php";
    include "include/sidebar.php";
    include "include/config.php";

if(isset($_GET["sid"]) && isset($_GET["jid"]))
{
    $_SESSION["seekerid"] = $_GET["sid"];
    $_SESSION["jobid"] = $_GET["jid"];
    
}

?>

<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <?php
                                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub_rupdate"]))
            {
                try{
                    $rname=$_POST["roundname"];
                    $result=$_POST["result"];
                    
                    $sql = $conn->prepare("SELECT ra_id from round_apply where ra_id=? and s_status != 0");
                    $sql->bindParam(1,$rname);
                    $sql->execute();
                    $row=$sql->rowCount();
                    if($row==1){
                        $_SESSION["trace_err"]="you have already inserted this data";
                    }else
                    {
                        $sql = $conn->prepare("update round_apply set s_status = ? where ra_id=?");
                        $sql->bindParam(1,$result);
                        $sql->bindParam(2,$rname);
                        if($sql->execute()){
                            $sql2=$conn->prepare("select ra_id from round_apply where s_id=? and j_id=? order by jr_id desc limit 1");
                            $sql2->bindParam(1,$_SESSION["seekerid"]);
                            $sql2->bindParam(2,$_SESSION["jobid"]);
                            $sql2->execute();
                            $lastid=$sql2->fetch(PDO::FETCH_ASSOC);
                            if($lastid["ra_id"]==$rname){
                               
                                if($result==1){
                                    $sql = $conn->prepare("update job_apply set ja_status = 'selected' where s_id=? and j_id=?");
                                }else{
                                    $sql = $conn->prepare("update job_apply set ja_status = 'rejected' where s_id=? and j_id=?");
                                }
                                $sql->bindParam(1,$_SESSION["seekerid"]);
                                $sql->bindParam(2,$_SESSION["jobid"]);
                                $sql->execute();
                         
                            }else{
                                if($result==2){
                                    echo $_SESSION["seekerid"];
                                    echo $_SESSION["jobid"];
                                    $sql = $conn->prepare("update job_apply set ja_status = 'rejected' where s_id=? and j_id=?");
                                    $sql->bindParam(1,$_SESSION["seekerid"]);
                                    $sql->bindParam(2,$_SESSION["jobid"]);
                                    $sql->execute();
                                }
                                
                            }
                        }else{
                           header("Location: https://qualifind.rushilshah.in/error.php");
                            ob_flush();
                            exit(); 
                        }
                    }
                }
                catch(Exception $e)
                {
                    header("Location: https://qualifind.rushilshah.in/error.php");
                    ob_flush();
                    exit();    
                }
            }
                                                ?>
                                    <div>Recruiter Dashboard
                                         
                                        <div class="page-title-subheading"><?php
                                        if(isset($_SESSION["trace_err"])){
                                            echo $_SESSION["seekerid"];
                                            echo $_SESSION["jobid"];
                                            echo "<p style='color:red'>".$_SESSION["trace_err"]."</p>";
                                            unset($_SESSION["trace_err"]);
                                        }else{
                                            echo "Job tracing";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            
    <div class="container px-1 px-md-4 py-5 mx-auto">
        <?php
        $rounds=array();
        $statusvalue=array();
        $ravalue = array();
        $noquiz=array();
        $sql=$conn->prepare("select q_id from job_apply where s_id=? and j_id=? ");
        $sql->bindParam(1,$_SESSION["seekerid"]);
        $sql->bindParam(2,$_SESSION["jobid"]);
        $sql->execute();
        $trow=$sql->rowCount();
        $quizexist=$sql->fetch(PDO::FETCH_ASSOC);
        if($quizexist!=null){
            array_push($rounds,"Skill test");
            array_push($statusvalue,1);
           
        }
        $sql2=$conn->prepare("select jr_id,r_title from job_round where j_id=?");
        $sql2->bindParam(1,$_SESSION["jobid"]);
        $sql2->execute();
        $trow2=$sql2->rowCount();
        $roundname=$sql2->fetchAll();
      
        $jobroundid=array();
        if($trow2>0){
            for($i=0;$i<$trow2;$i++){
            array_push($rounds,$roundname[$i]["r_title"]); 
            array_push($jobroundid,$roundname[$i]["jr_id"]);
            array_push($noquiz,$roundname[$i]["r_title"]);
            }
        }
        for($i=0;$i<$trow2;$i++){
            $sql3=$conn->prepare("select ra_id, s_status from round_apply where j_id=? and s_id=? and jr_id=?");
            $sql3->bindParam(1,$_SESSION["jobid"]);
            $sql3->bindParam(2,$_SESSION["seekerid"]);
            $sql3->bindParam(3,$jobroundid[$i]);
            $sql3->execute();
            $status=$sql3->fetchAll();
            array_push($ravalue,$status[0][0]);
            array_push($statusvalue,$status[0][1]);
        }
        ?>
        
        
        
        
        
        <div class="card">
            <div class="row d-flex justify-content-between px-3 top">
                <div class="d-flex">
                    <h5> JOB STATUS</h5>
                </div>
                <div class="d-flex flex-column text-sm-right">
                    
                </div>
            </div> <!-- Add class 'active' to progress -->
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <ul id="progressbar" class="text-center">
                        <?php 
                             for($i=0;$i<count($statusvalue);$i++){
                             //0 step0
                             //1 for active step0
                             //2 for active wrong step0
                        ?>
                        <li class="
                        <?php
                        if($statusvalue[$i]==0){
                        echo "step0";    
                        }elseif($statusvalue[$i]==1){
                        echo "active step0"; 
                        }else{
                        echo "active wrong step0";
                        }
                        ?>"></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-between top">
                
                <?php
                for($i=0;$i<count($rounds);$i++){
                ?>
                
                <div class="row d-flex icon-content"> 
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold"><?php echo $rounds[$i]?></p>
                    </div>
                </div>
                <?php
                }
                ?>
                <?php 
                for($i=0;$i<(4-count($rounds));$i++){
                ?>
                    <div class="row d-flex icon-content"> 
                    <div class="d-flex flex-column">
                        <p class="font-weight-bold"></p>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="main-card mb-3 card" style="border: 1px solid black;">
                        <div class="card-body">
                            <h5 class="card-title">Status Update</h5>
                            <form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off" name="jobcmnt" id="jobcmnt" role="form" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="eduex">Round Name</label>
                                           <select name="roundname" id="eduex" class="form-control" required>
                                            <option value="" hidden disabled selected>Round Name</option>
                                            <?php
                                            for($i=0;$i<count($ravalue);$i++){
                                            ?>
                                            <option value="<?php echo $ravalue[$i]; ?>"><?php echo $noquiz[$i]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select> 
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="result">Result</label>
                                            <select name="result" id="result" class="form-control" required>
                                            <option value="" hidden disabled selected>Select Result</option>
                                            <option value="1">Select</option>
                                            <option value="2">Reject</option>
                                            
                                        </select> 
                                        </div>
                                    </div>
                                 
                                <button class="btn btn-primary" type="submit" name="sub_rupdate">Submit</button>
                            </form> 
                            <script>
                                // Example starter JavaScript for disabling form submissions if there are invalid fields
                                (function () {
                                    'use strict';
                                    window.addEventListener('load', function () {
                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                        var forms = document.getElementsByClassName('needs-validation');
                                        // Loop over them and prevent submission
                                        var validation = Array.prototype.filter.call(forms, function (form) {
                                            form.addEventListener('submit', function (event) {
                                                if (form.checkValidity() === false) {
                                                    event.preventDefault();
                                                    event.stopPropagation();
                                                }
                                                form.classList.add('was-validated');
                                            }, false);
                                        });
                                    }, false);
                                })();
                            </script>
                        </div>
                    </div>
                   
                    <?php 
                        include "include/footer.php";
                    ?>    </div>
                     
        </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
</body>
<style>
/*    body {*/
/*    color: #000;*/
/*    overflow-x: hidden;*/
/*    height: 100%;*/
/*    background-color: white;*/
/*    background-repeat: no-repeat*/
/*}*/

.card {
    z-index: 0;
    background-color: #ECEFF1;
    padding-bottom: 20px;
    /*margin-top: 90px;*/
    margin-bottom: 90px;
    border-radius: 10px;
    box-shadow:10px 10px;
}

.top {
    padding-top: 40px;
    padding-left: 13% !important;
    padding-right: 13% !important
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: #455A64;
    padding-left: 0px;
    margin-top: 30px
}

#progressbar li {
    list-style-type: none;
    font-size: 13px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar .step0:before {
    font-family: FontAwesome;
    content: "\f10c";
    color: #fff
}

#progressbar li:before {
    width: 40px;
    height: 40px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    background: #C5CAE9;
    border-radius: 50%;
    margin: auto;
    padding: 0px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 12px;
    background: #C5CAE9;
    position: absolute;
    left: 0;
    top: 16px;
    z-index: -1
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    position: absolute;
    left: -50%
}

#progressbar li:nth-child(2):after,
#progressbar li:nth-child(3):after {
    left: -50%
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
    position: absolute;
    left: 50%
}

#progressbar li:last-child:after {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px
}

#progressbar li:first-child:after {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #1F2B7B
}

#progressbar li.active:before {
    font-family: FontAwesome;
    content: "\f00c"
}
#progressbar li.active.wrong:before {
    font-family: FontAwesome;
    content: "\f00d";
    background-color:red;
}


.icon {
    width: 60px;
    height: 60px;
    margin-right: 15px
}

.icon-content {
    padding-bottom: 20px
}

@media screen and (max-width: 992px) {
    .icon-content {
        width: 50%
    }
}
</style>
</html>


