<?php 
    include "include/config.php";
    include "include/session.php";
    include "include/header.php";
    include "include/sidebar.php";
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
                                    <div>Recruiter Dashboard
                                        <div class="page-title-subheading">Basic details about you & your company
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Job Posted</div>
                                            
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span>
                                            <?php 
                                            
                                            try{
                                                
                                                $sql = $conn->prepare("SELECT j_id FROM job_details WHERE j_status = 1 && r_id = ?");
                                                $sql->bindParam(1,$_SESSION["rid"]);
                                                $sql->execute();
                                                $num = $sql->rowCount();
                                                
                                                if($num=="" || $num == null)
                                                {
                                                    echo "0";
                                                }
                                                else
                                                {
                                                    echo $num;
                                                }
                                            }
                                            catch(Exception $e)
                                            {
                                                
                                            }
                                            
                                            ?>
                                            </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Seeker Applied</div>
                                           
                                        </div>
                                        <?php 
                                          try{
                                            $count=0;
                                            $job_id=array();
                                            $sql2=$conn->prepare("SELECT j_id from job_details where r_id=?");
                                            $sql2->bindParam(1,$_SESSION["rid"]);
                                            $sql2->execute();
                                            $row=$sql2->fetchAll();
                                            $tjob=count($row);
                                            for($i=0;$i<count($row);$i++){
                                                array_push($job_id,$row[$i]["j_id"]);
                                            }
                                            for($i=0;$i<count($job_id);$i++){
                                            $sql=$conn->prepare("SELECT ja.s_id FROM job_apply AS ja, job_details AS jd WHERE jd.r_id=? AND jd.j_id=? AND jd.j_id=ja.j_id");
                                            $sql->bindParam(1,$_SESSION["rid"]);
                                            $sql->bindParam(2,$job_id[$i]);
                                            $sql->execute();
                                            $data=$sql->rowCount();
                                            $count+=$data;
                                            }
                                            
                                            }catch(Exception $e){
                                                echo "error";
                                            }
                                        ?>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $count; ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Seeker Placed</div>
                                            
                                        </div>
                                        <?php 
                                          try{
                                            $count=0;
                                            $job_id=array();
                                            $sql2=$conn->prepare("SELECT j_id from job_details where r_id=?");
                                            $sql2->bindParam(1,$_SESSION["rid"]);
                                            $sql2->execute();
                                            $row=$sql2->fetchAll();
                                            $tjob=count($row);
                                            for($i=0;$i<count($row);$i++){
                                                array_push($job_id,$row[$i]["j_id"]);
                                            }
                                            for($i=0;$i<count($job_id);$i++){
                                            $sql=$conn->prepare("SELECT ja.s_id FROM job_apply AS ja, job_details AS jd WHERE jd.r_id=? AND jd.j_id=? AND jd.j_id=ja.j_id AND ja.ja_status='selected'");
                                            $sql->bindParam(1,$_SESSION["rid"]);
                                            $sql->bindParam(2,$job_id[$i]);
                                            $sql->execute();
                                            $data=$sql->rowCount();
                                            $count+=$data;
                                            }
                                            
                                            }catch(Exception $e){
                                                echo "error";
                                            }
                                        ?>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo $count; ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                         <div class="row">
                              <div class="col-lg-12 mt-2">
                                 
                                    <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                                <div class="widget-chat-wrapper-outer">
                                                    <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                                        <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div>
                                                                <div 
                                                                class="chartjs-size-monitor-shrink" 
                                                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                                    <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                                        <canvas id="canvas" width="1077" height="538" style="display: block; height: 431px; width: 862px;" class="chartjs-render-monitor"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                           </div>  
                         </div>
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                            <div class="mb-3 card">
                                <div class="card-header">
                                    <ul class="nav nav-justified">
                                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link">Basic Details</a></li>
                                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link">Company Details</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-eg7-0" role="tabpanel">
                                            <table class="mb-0 table table-striped">
                                                <tbody>
                                                <tr>
                                                    <td scope="row"><strong>Name</strong> </td>
                                                    <td><?php echo $sname; ?></td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td scope="row"><strong>Email</strong> </td>
                                                    <td><?php echo $semail; ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td scope="row"><strong>Mobile Number</strong></td>
                                                    <td><?php echo $smbno; ?></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row"><strong>Whatsapp Number</strong></td>
                                                    <td><?php echo $swpno; ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="tab-eg7-1" role="tabpanel">
                                            <table class="mb-0 table table-striped">
                                                
                                            <?php
                                            try
                                            {
                                                $sql=$conn->prepare("SELECT r_cemail, r_cname, r_cdesc, r_cwblink FROM rc_details WHERE r_id = ? && r_cname IS NOT NULL");
                                                $sql->bindParam(1,$_SESSION["rid"]);
                                                $sql->execute();
                                                $num=$sql->rowCount();
                                                if($num==1)
                                                {
                                                    $row=$sql->fetch(PDO::FETCH_ASSOC);
                                                    echo "  <tbody>
                                                            <tr>
                                                            <td scope='row'><strong>Name</strong> </td>
                                                            <td>" . $row["r_cname"] ."</td>
                                                            </tr>
                                                            <tr>
                                                            <td scope='row'><strong>Email</strong> </td>
                                                            <td>" . $row["r_cemail"] ."</td>
                                                            </tr>
                                                            <tr>
                                                            <td scope='row'><strong>Description</strong> </td>
                                                            <td>" . $row["r_cdesc"] ."</td>
                                                            </tr>
                                                            <tr>
                                                                <td scope='row'><strong>Website</strong> </td>";
                                                            if($row["r_cwblink"] != null)
                                                            {
                                                                echo "<td><a target='_blank' href='" .$row["r_cwblink"]. "'>Check out</a></td>";
                                                            }
                                                            else
                                                            {
                                                                echo"<td>None</td>";
                                                            }
                                                            echo "</tr>
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
                    </div>
                    </div>
                   
                    <?php 
                        include "include/footer.php";
                    ?>    
                    </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
   
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
