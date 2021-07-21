<?php 
ob_start();
    include "include/session.php";
    include "include/config.php";
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
                                    <div>Job Seeker Dashboard
                                        <div class="page-title-subheading">Your all basic details and performance given here
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            
                        <div class="row">
                            
                            <div class="col-md-6 col-xl-6">
                                <a href="jobsection.php" style="text-decoration:none;">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Applied-Jobs</div>
                                            <div class="widget-subheading">Total Jobs Applied</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <?php 
                                            
                                                try
                                                {
                                                    $sql = $conn->prepare("SELECT ja_id FROM job_apply WHERE s_id = ?");
                                                    $sql->bindParam(1,$_SESSION["sid"]);
                                                    $sql->execute();
                                                    $num = $sql->rowCount();
                                                    echo "<div class='widget-numbers text-white'><span>" . $num . "</span></div>";
                                                }
                                                catch(PDOException $e)
                                                {
                                                    header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit(); 
                                                }
                                            
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <a href="jobsection.php" style="text-decoration:none;">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Saved Jobs</div>
                                            <div class="widget-subheading">Total Jobs Saved</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <?php 
                                            
                                                try
                                                {
                                                    $sql = $conn->prepare("SELECT js_id FROM job_saved WHERE s_id = ?");
                                                    $sql->bindParam(1,$_SESSION["sid"]);
                                                    $sql->execute();
                                                    $num = $sql->rowCount();
                                                    echo "<div class='widget-numbers text-white'><span>" . $num . "</span></div>";
                                                }
                                                catch(PDOException $e)
                                                {
                                                    header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit(); 
                                                }
                                            
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                            <div class="mb-3 card">
                                <div class="card-header">
                                    <ul class="nav nav-justified">
                                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link">Basic Details</a></li>
                                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link">Background Details</a></li>
                                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-2" class="nav-link">Experience / Work Sample</a></li>
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
                                                    $sql=$conn->prepare("SELECT * from `st_background` where s_id=?");
                                                    $sql->bindParam(1,$_SESSION["sid"]);
                                                    $sql->execute();
                                                    $row = $sql->fetchAll();
                                                    if(count($row) > 0)
                                                    {
                                                        echo "  
                                                        <thead>
                                                            <th>Qualification</th>
                                                            <th>School / College Name</th>
                                                            <th>Passout Year</th>
                                                            <th>Result</th>
                                                        </thead>
                                                        <tbody>    ";
                                                        for($i = 0; $i < count($row); $i++)
                                                        {
                                                        echo " <tr>";
                                                        echo "<td>" .$row[$i]["sb_qualify"]. "</td>";
                                                        echo "<td>" .$row[$i]["sb_clg"]. "</td>";
                                                        echo "<td>" .$row[$i]["sb_passyr"]. "</td>";
                                                        echo "<td>" .$row[$i]["sb_result"]. "</td>";
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
                                        <div class="tab-pane" id="tab-eg7-2" role="tabpanel">
                                            <table class="mb-0 table table-striped">
                                            <?php 
                                                
                                                try
                                                {
                                                    $sql=$conn->prepare("SELECT * from `st_workexp` where s_id=?");
                                                    $sql->bindParam(1,$_SESSION["sid"]);
                                                    $sql->execute();
                                                    $row = $sql->fetchAll();
                                                    if(count($row) > 0)
                                                    {
                                                        echo "
                                                        <thead>
                                                            <th>Company Name</th>
                                                            <th>Duration</th>
                                                            <th>Designation</th>
                                                            <th>Link</th>
                                                        </thead>
                                                        <tbody>
                                                        ";
                                                        for($i = 0; $i < count($row); $i++)
                                                        {
                                                        echo " <tr>";
                                                        echo "<td>" .$row[$i]["sw_name"]. "</td>";
                                                        echo "<td>" .$row[$i]["sw_stime"]. " to " . $row[$i]["sw_etime"]. "</td>";
                                                        echo "<td>" .$row[$i]["sw_desg"]. "</td>";
                                                        if($row[$i]["sw_link"] != null)
                                                            echo "<td><a target='_blank' href='" .$row[$i]["sw_link"]. "'>Check out</a></td>";
                                                        else
                                                            echo "<td>None</td>";
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
                        </div>
                    </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Additional Details</h5>
                                    <div class="collapse" id="collapseExample123">
                                        <?php
                                            try
                                            {
                                                $sql=$conn->prepare("SELECT * from `st_adetails` where s_id=?");
                                                $sql->bindParam(1,$_SESSION["sid"]);
                                                $sql->execute();
                                                $num=$sql->rowCount();
                                                if($num==1)
                                                {
                                                    $row=$sql->fetch(PDO::FETCH_ASSOC);
                                                    echo "<table class='mb-0 table table-striped'>
                                                            <tbody>
                                                            <tr>
                                                            <td scope='row'><strong>About Me</strong> </td>
                                                            <td>" . $row["sad_desc"] ."</td>
                                                            </tr>
                                                            <tr>
                                                                <td scope='row'><strong>WorkSample</strong> </td>
                                                                <td><a target='_blank' href='" .$row["sad_wsample"]. "'>Check out</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td scope='row'><strong>Language</strong></td>
                                                                <td>".$row["sad_lang"]."</td>
                                                            </tr>
                                                            <tr>
                                                                <td scope='row'><strong>Resume</strong> </td>
                                                                <td><a target='_blank' href='uploads/resume/" .$row["sad_resume"]. "'>Check out</a></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>";
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
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="mb-2 mr-2 btn-transition btn btn-outline-primary"
                                    data-toggle="collapse" href="#collapseExample123">View</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <h5 class="card-title">Achievements</h5>
                                    <div class="collapse" id="collapseExample1234">
                                        <table class="mb-0 table table-striped">
                                            <?php 
                                                
                                                try
                                                {
                                                    $sql=$conn->prepare("SELECT * from `st_achievement` where s_id=?");
                                                    $sql->bindParam(1,$_SESSION["sid"]);
                                                    $sql->execute();
                                                    $row = $sql->fetchAll();
                                                    if(count($row) > 0)
                                                    {
                                                        echo "
                                                        <thead>
                                                            <th>Title</th>
                                                            <th>Time</th>
                                                            <th>Level</th>
                                                            <th>Certificate</th>
                                                        </thead>
                                                        <tbody>
                                                        ";
                                                        for($i = 0; $i < count($row); $i++)
                                                        {
                                                        echo " <tr>";
                                                        echo "<td>" .$row[$i]["sa_title"]. "</td>";
                                                        echo "<td>" .$row[$i]["sa_time"]. "</td>";
                                                        echo "<td>" .$row[$i]["sa_level"]. "</td>";
                                                        echo "<td><a target='_blank' href='uploads/certificate/" .$row[$i]["sa_certificate"]. "'>Check out</a></td>";
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
                                <div class="card-footer">
                                    <button type="button" class="mb-2 mr-2 btn-transition btn btn-outline-primary"
                                    data-toggle="collapse" href="#collapseExample1234">View</button>
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
