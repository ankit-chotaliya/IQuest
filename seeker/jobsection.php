<?php 

    include "../include/session.php";
    include "include/header.php";
    include "include/sidebar.php";
    include "../include/config.php";
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
                                    <div>Job Seeker Dashboard
                                        <div class="page-title-subheading">Those jobs you have applied will be shown here!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>           
                    <div class="col-lg-12 mt-2">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Applied-Jobs</h5>
                                        <table class="mb-0 table table-striped" id="applied">
                                    
                                                <?php
                                                $sql=$conn->prepare("SELECT ja.ja_status,jd.r_id ,jd.j_id,jd.j_desc,jd.j_title,ja.q_result,ja.q_id,ja.j_cmt FROM `job_apply` AS ja, job_details AS jd WHERE ja.s_id=? AND ja.j_id=jd.j_id");
                                                $sql->bindParam(1,$_SESSION["sid"]);
                                                $sql->execute();
                                                $row=$sql->fetchAll();
                                                
                                                $trow=$sql->rowCount();
                                                if($trow > 0)
                                                {
                                                    echo "<thead>
                                                        <tr>
                                                            <th>Job Title</th>
                                                            <th>Result</th>
                                                            <th>Job View</th>
                                                            <th>Interview</th>
                                                            <th>Job status</th>
                                                            <th>Comment</th>
                                                            <th>Profile</th>
                                                            <th>Job tracing</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>";
                                                        for($i=0;$i<$trow;$i++){
                                                        echo '<tr>
                                                            <td>' . $row[$i]["j_title"] . '</td>';
                                                        
                                                        
                                                            echo '<td>' .$row[$i]["q_result"] . '</td>';    
                                                        
                                                        
                                                        echo' <td> <a href="../job_details.php?id=' . $row[$i]["j_id"] . '" class="btn btn-primary" type="submit">View</button></td>';
                                                         echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-warning' target='_blank'
                                                             href='../meeting.php?oid=".$_SESSION["sid"]."&rid=".$row[$i]["r_id"]."'><i style='font-size:25px;' class='pe-7s-users'></i></a>  </td>";
                                                       if($row[$i]["ja_status"]=="Submitted"){
                                                      
                                                       echo "<td><span class='badge badge-warning' >".$row[$i]["ja_status"]."</span></td> " ;
                                                      }
                                                      if($row[$i]["ja_status"]=="rejected"){
                                                      
                                                       echo "<td><span class='badge badge-danger'  >".$row[$i]["ja_status"]."</span></td> " ;
                                                      }
                                                      if($row[$i]["ja_status"]=="selected"){
                                                      
                                                       echo "<td><span class='badge badge-success'  >".$row[$i]["ja_status"]."</span></td> " ;
                                                      }
                                                      echo   '<td>' . $row[$i]["j_cmt"] . '</td>';
                                                      
                                                       echo' <td> <a href="../profile_recruiter.php?rid=' . $row[$i]["r_id"] . '" class="btn btn-primary" type="submit">Profile</button></td>';
                                                       echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-success'
                                                             href='job_traceing.php?jid=".$row[$i]["j_id"]."&sid=".$_SESSION["sid"]."'><i style='font-size:25px;' class='pe-7s-next-2'></i></a>  </td>";
                                                       
                                                       
                                                        
                                                         
                                                        echo' </tr>';
                                                        }
                                                        echo "</tbody>";
                                                }
                                                else
                                                {
                                                    echo "<p style='font-size:18px;color:grey;font-style:italic;'>No Records were Found</p>"; 
                                                }
                                                
                                            ?>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                    <div class="col-lg-12 mt-2">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Saved-Jobs</h5>
                                        <table class="mb-0 table table-striped " id="savedtable">
                                            
                                            <?php
                                                $sql2=$conn->prepare("SELECT jd.j_id,jd.j_desc,jd.j_title FROM `job_saved` AS ja, job_details AS jd WHERE ja.s_id=? AND ja.j_id=jd.j_id");
                                                $sql2->bindParam(1,$_SESSION["sid"]);
                                                $sql2->execute();
                                                $row2=$sql2->fetchAll();
                                                
                                                $trow2=$sql2->rowCount();
                                                if($trow2 > 0)
                                                {
                                                    echo "<thead>
                                                            <tr>
                                                                
                                                                <th>Job Title</th>
                                                                <th>Job Description</th>
                                                                <th>Job View</th>
                                                            </tr>
                                                            </thead>";
                                                     for($i=0;$i<$trow2;$i++){
                                                        echo '<tr>
                                                            <td>' . $row2[$i]["j_title"] . '</td>
                                                            <td>' . $row2[$i]["j_desc"] . '</td>
                                                            <td> <a href="../job_details.php?id=' . $row2[$i]["j_id"] . '" class="btn btn-primary" type="submit">View</button></td>
                                                        </tr>';
                                                        }
                                                        echo "</tbody>";
                                                }
                                                else
                                                {
                                                    echo "<p style='font-size:18px;color:grey;font-style:italic;'>No Records were Found</p>"; 
                                                }
                                             ?>   
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>        
                    <?php 
                        include "include/footer.php";
                    ?>    </div>
                    
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <script type="text/javascript" src="./assets/scripts/tablerespo.js"></script>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
