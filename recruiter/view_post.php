<?php 
ob_start();
    include "include/session.php";
    include "include/header.php";
    include "include/sidebar.php";
    $limit=10;
    if(isset($_GET["page"]))
    {
        $pnum =$_GET["page"];
    }else{
        $pnum =1;
    }
      
            $start_from = ($pnum-1) * $limit;
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
                                
                                        <div class="page-title-subheading">Details of the post
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
                                                $sql=$conn->prepare("SELECT * FROM job_details WHERE j_id = ? && r_id=? && j_status = 1");
                                                $sql->bindParam(1,$_GET["id"]);
                                                $sql->bindParam(2,$_SESSION["rid"]);
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
                            <div class="col-lg-12 mt-2">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Applied Candidates</h5>
                                        <div class="table-responsive" style="overflow-x:auto;">
                                        <table class="col-lg-12 col-sm-12 table table-striped" cellspacing="0" style="width:100%">
                                            <?php 
                                                
                                                try
                                                {
                                                    $js = 1;
                                                    $sql=$conn->prepare("SELECT s.*,j.ja_id,j.ja_status,j.q_result from job_apply as j ,st_details as s where j.s_id=s.s_id AND j.j_id = ? LIMIT ".$start_from.",".$limit."");
                                                    $sql->bindParam(1,$_GET["id"]);
                                                    $sql->execute();
                                                    $row = $sql->fetchAll();
                                                    if(count($row) > 0)
                                                    {
                                                        echo "
                                                        <thead>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Mobile Number</th>
                                                            <th>Result</th>
                                                            <th>View</th>
                                                            <th>Interview</th>
                                                            <th>Status</th>
                                                            <th>Select</th>
                                                            <th>Reject</th>
                                                            <th>Comment</th>
                                                            <th>Job tracing</th>
                                                        </thead>
                                                        <tbody>
                                                        ";
                                                        for($i = 0; $i < count($row); $i++)
                                                        {
                                                        $c = $i + 1;
                                                        echo "<tr>";
                                                        echo "<td>" . $c . "</td>";
                                                        echo "<td>" .$row[$i]["s_name"]. "</td>";
                                                        echo "<td>" .$row[$i]["s_email"]. "</td>";
                                                        echo "<td>" .$row[$i]["s_mbno"]. "</td>";
                                                         echo "<td>" .$row[$i]["q_result"]. "</td>";
                                                        
                                                        echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-success'
                                                             href='../profile_seeker.php?sid=". $row[$i]["s_id"] ."'><i style='font-size:25px;' class='pe-7s-next-2'></i></a>  </td>";
                                                       
                                                        echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-warning' target='_blank'
                                                             href='../meeting.php?oid=".$_SESSION["rid"]."&rid=".$row[$i]["s_id"]."'><i style='font-size:25px;' class='pe-7s-users'></i></a>  </td>";
                                                      if($row[$i]["ja_status"]=="Submitted"){
                                                      
                                                       echo "<td><span class='badge badge-warning' id='".$row[$i]["ja_id"]."' >".$row[$i]["ja_status"]."</span></td> " ;
                                                      }
                                                      if($row[$i]["ja_status"]=="rejected"){
                                                      
                                                       echo "<td><span class='badge badge-danger' id='".$row[$i]["ja_id"]."' >".$row[$i]["ja_status"]."</span></td> " ;
                                                      }
                                                      if($row[$i]["ja_status"]=="selected"){
                                                      
                                                       echo "<td><span class='badge badge-success' id='".$row[$i]["ja_id"]."' >".$row[$i]["ja_status"]."</span></td> " ;
                                                      }
                                                        echo "<td><button class='mb-2 mr-2 btn-transition btn btn-outline-success selectbtn' data-id='".$row[$i]["ja_id"]."'
                                                             >Select</button></td>";
                                                        echo "<td><button class='mb-2 mr-2 btn-transition btn btn-outline-danger rejectbtn' data-id='".$row[$i]["ja_id"]."'
                                                             >Reject</button></td>";
                                                        echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-success'
                                                             href='jobcmt.php?sid=".$row[$i]["s_id"]."&jid=".$_GET["id"]."'><i style='font-size:25px;' class='pe-7s-next-2'></i></a>  </td>";
                                                     echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-success'
                                                             href='job_tracing.php?sid=".$row[$i]["s_id"]."&jid=".$_GET["id"]."'><i style='font-size:25px;' class='pe-7s-next-2'></i></a>  </td>"; 
                                                        echo"</tr>";
                                                        
                                                        }
                                                         
                                                        
                                                        echo "</tbody>";
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
                            <?php
                                
                                $sql2=$conn->prepare("SELECT * from `job_apply` where j_id=?");
                                $sql2->bindParam(1,$_GET["id"]);
                                $sql2->execute();
                                $trecord=$sql2->rowCount();
                                $tpage=(int)($trecord/11)+1;
                                ?>
                            <nav aria-label="Page navigation example" >
                              <ul class="pagination justify-content-center">
                                <li class="page-item">
                                  <a class="page-link" href="postedjob.php?page=<?php if($pnum!=1){echo $pnum-1;} else{echo $pnum;}  ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                  </a>
                                </li>
                                <?php
                                for($i = 1; $i <= $tpage; $i++)
                                {
                                    echo"<li class='page-item'><a class='page-link' href='postedjob.php?page=$i'>$i</a></li>";
                                }
                                ?>
                               
                                <li class="page-item">
                                  <a class="page-link" href="postedjob.php?page=<?php if($pnum!=$tpage){echo $pnum+1;} else{echo $pnum;}  ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                    </div>
                   
                    <?php 
                        include "include/footer.php";
                    ?>    </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script>
<script type="text/javascript" src="./assets/scripts/status.js"></script>
</body>
</html>
