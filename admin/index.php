<?php 
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
                                    <div>Admin Dashboard
                                        <div class="page-title-subheading">Basic details about you & your company
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
                                       
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab-eg7-0" role="tabpanel">
                                            <table class="mb-0 table table-striped">
                                                <tbody>
                                                <tr>
                                                    <td scope="row"><strong>Name</strong> </td>
                                                    <td><?php echo $_SESSION["admin"]; ?></td>
                                                   
                                                </tr>
                                                <tr>
                                                    <td scope="row"><strong>Email</strong> </td>
                                                    <td><?php echo $_SESSION["aemail"]; ?></td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td scope="row"><strong>Mobile Number</strong></td>
                                                    <td><?php echo $_SESSION["ambno"]; ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                         <div class="col-lg-12 mt-2">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Seeker Details</h5>
                                        <div class="table-responsive" style="overflow-x:auto;">
                                        <table class="col-lg-12 col-sm-12 table table-striped" cellspacing="0" style="width:100%">
                                            <?php 
                                                
                                                try
                                                {
                                                    $js = 1;
                                                    $sql=$conn->prepare("SELECT * from `st_details` ORDER BY s_id DESC");
                                                    $sql->execute();
                                                    $row = $sql->fetchAll();
                                                    if(count($row) > 0)
                                                    {
                                                        echo "
                                                        <thead>
                                                            <th>No.</th>
                                                            <th>Name</th>
                                                            <th>E-Mail</th>
                                                            <th>Mobile No.</th>
                                                            
                                                            <th>View Profile</th>
                                                            <th>Delete Profile</th>
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
                                                       echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-success'
                                                             href='../profile_seeker.php?sid=". $row[$i]["s_id"] ."'><i style='font-size:25px;' class='pe-7s-next-2'></i></a>  </td>";
                                                      echo "<td>  <button data-id='".$row[$i]["s_id"]."' class='mb-2 mr-2 btn-transition btn btn-outline-danger duser' 
                                                        ><i style='font-size:25px;' class='pe-7s-trash'></i></button>  </td>";
                                                               
                                                         
                                                        
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
                                                    // $_SESSION["err_email"] = "Something went wrong!";
                                                }
                                                
                                            ?>
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mt-2">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Recruiter Details</h5>
                                        <div class="table-responsive" style="overflow-x:auto;">
                                        <table class="col-lg-12 col-sm-12 table table-striped" cellspacing="0" style="width:100%">
                                            <?php 
                                                
                                                try
                                                {
                                                    $js = 1;
                                                    $sql=$conn->prepare("SELECT * from `rc_details` ORDER BY r_id DESC");
                                                    $sql->execute();
                                                    $row = $sql->fetchAll();
                                                    if(count($row) > 0)
                                                    {
                                                        echo "
                                                        <thead>
                                                            <th>No.</th>
                                                            <th>Name</th>
                                                            <th>E-Mail</th>
                                                            <th>Mobile No.</th>
                                                            
                                                            <th>View Profile</th>
                                                            <th>Delete Profile</th>
                                                        </thead>
                                                        <tbody>
                                                        ";
                                                        for($i = 0; $i < count($row); $i++)
                                                        {
                                                        $c = $i + 1;
                                                        echo "<tr>";
                                                        echo "<td>" . $c . "</td>";
                                                        echo "<td>" .$row[$i]["r_name"]. "</td>";
                                                        echo "<td>" .$row[$i]["r_email"]. "</td>";
                                                        echo "<td>" .$row[$i]["r_mobno"]. "</td>";
                                                       echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-success'
                                                             href='../profile_recruiter.php?rid=". $row[$i]["r_id"] ."'><i style='font-size:25px;' class='pe-7s-next-2'></i></a>  </td>";
                                                      echo "<td>  <button data-id='".$row[$i]["r_id"]."' class='mb-2 mr-2 btn-transition btn btn-outline-danger druser' 
                                                        ><i style='font-size:25px;' class='pe-7s-trash'></i></button>  </td>";
                                                               
                                                         
                                                        
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
                                                    // $_SESSION["err_email"] = "Something went wrong!";
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
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
 <script type="text/javascript" src="./assets/scripts/deleteuser.js"></script></body>  
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
