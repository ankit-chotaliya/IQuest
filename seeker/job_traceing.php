<?php
include "include/session.php";
    include "include/header.php";
    include "include/sidebar.php";
    include "include/config.php";
   if(isset($_GET["jid"]) && isset($_GET["sid"])){
       $s_id=$_GET["sid"];
       $j_id=$_GET["jid"];
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
                                    <div>Seeker Dashboard
                                         
                                        <div class="page-title-subheading">Status of job
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            
                       <div class="container px-1 px-md-4 py-5 mx-auto">
        <?php
        $rounds=array();
        $statusvalue=array();
        $sql=$conn->prepare("select q_id from job_apply where s_id=? and j_id=? ");
        $sql->bindParam(1,$s_id);
        $sql->bindParam(2,$j_id);
        $sql->execute();
        $trow=$sql->rowCount();
        $quizexist=$sql->fetch(PDO::FETCH_ASSOC);
        if($quizexist!=null){
            array_push($rounds,"Skill test");
            array_push($statusvalue,1);
           
        }
        $sql2=$conn->prepare("select jr_id,r_title from job_round where j_id=?");
        $sql2->bindParam(1,$j_id);
        $sql2->execute();
        $trow2=$sql2->rowCount();
        $roundname=$sql2->fetchAll();
      
        $jobroundid=array();
        if($trow2>0){
            for($i=0;$i<$trow2;$i++){
            array_push($rounds,$roundname[$i]["r_title"]); 
            array_push($jobroundid,$roundname[$i]["jr_id"]);
            
            }
        }
        for($i=0;$i<$trow2;$i++){
            $sql3=$conn->prepare("select s_status from round_apply where j_id=? and s_id=? and jr_id=?");
            $sql3->bindParam(1,$j_id);
            $sql3->bindParam(2,$s_id);
            $sql3->bindParam(3,$jobroundid[$i]);
            $sql3->execute();
            $status=$sql3->fetchAll();
           
            array_push($statusvalue,$status[0]["s_status"]);
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
                       <div class="col-lg-12 mt-2">
                            <div class="mb-3 card">
                                <div class="card-header">
                                    <ul class="nav nav-justified">
                                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link">Post Details </a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-eg7-0" role="tabpanel">
                                            <table class="mb-0 table table-striped">
                                                <?php
                                            try
                                            {
                                                $sql=$conn->prepare("SELECT * FROM job_details WHERE j_id = ?  && j_status = 1");
                                                $sql->bindParam(1,$j_id);
                                                $sql->execute();
                                                $num=$sql->rowCount();
                                                if($num==1)
                                                {
                                                    $row=$sql->fetch(PDO::FETCH_ASSOC);
                                                    echo "  <tbody>
                                                            <tr>
                                                            <td scope='row'><strong>Title</strong> </td>
                                                            <td>" . $row["j_title"] ."</td>
                                                            </tr>
                                                            <tr>
                                                            <td scope='row'><strong>Description</strong> </td>
                                                            <td>" . $row["j_desc"] ."</td>
                                                            </tr>
                                                            <tr>
                                                            <td scope='row'><strong>Education / Experience</strong> </td>
                                                            <td>" . $row["j_eduex"] ."</td>
                                                            </tr>
                                                            <tr>
                                                            <td scope='row'><strong>Category</strong> </td>
                                                            <td>" . $row["j_cat"] ."</td>
                                                            </tr>
                                                            <tr>
                                                            <td scope='row'><strong>Deadline</strong> </td>
                                                            <td>" . $row["j_deadline"] ."</td>
                                                            </tr>
                                                            <tr>
                                                            <td scope='row'><strong>Location</strong> </td>
                                                            <td>" . $row["j_loc"] ."</td>
                                                            </tr>
                                                            <tr>
                                                            <td scope='row'><strong>Vacancy</strong> </td>
                                                            <td>" . $row["j_vacancy"] ."</td>
                                                            </tr>
                                                            <tr>
                                                            <td scope='row'><strong>Type</strong> </td>
                                                            <td>" . $row["j_type"] ."</td>
                                                            </tr>
                                                            <tr>
                                                            <td scope='row'><strong>Salary</strong> </td>
                                                            <td>" . $row["j_minsalary"] ." - " . $row["j_maxsalary"] ."</td>
                                                            </tr>
                                                            <tr>
                                                            <td scope='row'><strong>Post Date</strong> </td>
                                                            <td>" . $row["j_postdate"] ."</td>
                                                            </tr>
                                                            </tbody>";
                                                }
                                                else
                                                {
                                                    echo "<p style='font-size:18px;color:grey;font-style:italic;'>No Records were Found</p>";  
                                                }
                                            }
                                            catch(Exception $e){
                                              header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();  
                                            }
                                        ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                    <?php 
                        include "include/footer.php";
                    ?>    </div>
               
        </div>
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


