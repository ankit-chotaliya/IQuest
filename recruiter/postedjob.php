<?php 
ob_start();
    include "include/session.php";
    include "include/header.php";
    include "include/sidebar.php";
    // mobie network not available
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
                                    <div>Posted Jobs
                                        <div class="page-title-subheading">All the jobs that you have posted will be show here
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>           
                    <div class="col-lg-12 mt-2">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Posted Job</h5>
                                        <div class="table-responsive" style="overflow-x:auto;">
                                        <table class="col-lg-12 col-sm-12 table table-striped" cellspacing="0" style="width:100%">
                                            <?php 
                                                
                                                try
                                                {
                                                    $js = 1;
                                                    $sql=$conn->prepare("SELECT * from `job_details` where r_id=? && j_status=? LIMIT ".$start_from.",".$limit."");
                                                    $sql->bindParam(1,$_SESSION["rid"]);
                                                    $sql->bindParam(2,$js);
                                                    $sql->execute();
                                                    $row = $sql->fetchAll();
                                                    if(count($row) > 0)
                                                    {
                                                        echo "
                                                        <thead>
                                                            <th>#</th>
                                                            <th>Title</th>
                                                            <th>Education</th>
                                                            <th>Deadline</th>
                                                            <th>Location</th>
                                                            <th>Type</th>
                                                            <th>Skill Test</th>
                                                            <th>Edit Skill</th>
                                                            <th>View</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </thead>
                                                        <tbody>
                                                        ";
                                                        for($i = 0; $i < count($row); $i++)
                                                        {
                                                        $c = $i + 1;
                                                        echo "<tr>";
                                                        echo "<td>" . $c . "</td>";
                                                        echo "<td>" .$row[$i]["j_title"]. "</td>";
                                                        echo "<td>" .$row[$i]["j_deadline"]. "</td>";
                                                        echo "<td>" .$row[$i]["j_loc"]. "</td>";
                                                        echo "<td>" .$row[$i]["j_type"]. "</td>";
                                                        echo "<td>" .$row[$i]["j_cat"]. "</td>";
                                                                try
                                                                {
                                                                    $query=$conn->prepare("SELECT q_id FROM quiz WHERE j_id = ? ");
                                                                    $query->bindParam(1, $row[$i]["j_id"]);
                                                                    $query->execute();
                                                                    $num=$query->rowCount();
                                                                    if($num==1)
                                                                    {
                                                                        echo "<td><p class='mb-2 mr-2 badge badge-success'
                                                             >Created</p>  </td>";
                                                                    }
                                                                    else{
                                                                        echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-info'
                                                             href='createskilltest.php?id=". $row[$i]["j_id"] ."'>Create skill test</a>  </td>";
                                                                    }
                                                                }
                                                                catch(Exception $e){
                                                                    $_SESSION["err_email"] = "Something went wrong!";
                                                                    header("location: https://qualifind.rushilshah.in/Auth/loginform.php");
                                                                    exit();
                                                                }
                                                         echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-warning'
                                                             href='skill.php?id=". $row[$i]["j_id"] ."'>Edit Skill</a>  </td>";
                                                        echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-success'
                                                             href='view_post.php?id=". $row[$i]["j_id"] ."'><i style='font-size:25px;' class='pe-7s-next-2'></i></a>  </td>";
                                                        echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-primary'
                                                             href='edit_post.php?id=". $row[$i]["j_id"] ."'><i style='font-size:25px;' class='pe-7s-pen'></i></a>  </td>";
                                                        echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-danger'
                                                        href='delete_post.php?id=". $row[$i]["j_id"] ."'><i style='font-size:25px;' class='pe-7s-trash'></i></a>  </td>";
                                                        
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
                                
                                $sql2=$conn->prepare("SELECT * from `job_details` where r_id=? && j_status=? ");
                                $sql2->bindParam(1,$_SESSION["rid"]);
                                $sql2->bindParam(2,$js);
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
                    ?>    
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>