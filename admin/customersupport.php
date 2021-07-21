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
                                        <div class="page-title-subheading">Basic details about your company
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            
                             <div class="col-lg-12 mt-2">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Feedback</h5>
                                        <div class="table-responsive" style="overflow-x:auto;">
                                        <table class="col-lg-12 col-sm-12 table table-striped" cellspacing="0" style="width:100%">
                                            <?php 
                                                
                                                try
                                                {
                                                    $js = 1;
                                                    $sql=$conn->prepare("SELECT * from `contact` ORDER BY c_id DESC");
                                                    $sql->execute();
                                                    $row = $sql->fetchAll();
                                                    if(count($row) > 0)
                                                    {
                                                        echo "
                                                        <thead>
                                                            <th>N0.</th>
                                                            <th>feedback_id</th>
                                                            <th>U-email</th>
                                                            <th>Feedback</th>
                                                            <th>Reply</th>
                                                            
                                                        </thead>
                                                        <tbody>
                                                        ";
                                                        for($i = 0; $i < count($row); $i++)
                                                        {
                                                        $c = $i + 1;
                                                        echo "<tr>";
                                                        echo "<td>" . $c . "</td>";
                                                        echo "<td>" .$row[$i]["c_id"]. "</td>";
                                                        echo "<td>" .$row[$i]["c_email"]. "</td>";
                                                        echo "<td>" .$row[$i]["c_cmnt"]. "</td>";
                                                         echo "<td>  <a class='mb-2 mr-2 btn-transition btn btn-outline-warning'
                                                             href='mailto:". $row[$i]["c_email"] ."'>Reply</a>  </td>";
                                                    
                                                                
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
   
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
