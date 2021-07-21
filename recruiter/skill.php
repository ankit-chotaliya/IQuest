<?php 
ob_start();
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
                                    <i class="pe-7s-monitor icon-gradient bg-mean-fruit"></i>
                                    <?php 
                                    
                                    if(isset($_GET["id"]))
                                    {
                                        $_SESSION["jid"] = $_GET["id"]; 
                                    }
                                    else
                                    {
                                        // header("Location: https://qualifind.rushilshah.in/error.php");
                                        // ob_flush();
                                        // exit();
                                    }
                                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["jid"]) )
                                    {
                                        if(isset($_POST["sub_skill"]))
                                        {
                                           
                                            $skill = $_POST["skill"]; 
                                            try{
                                                $sql=$conn->prepare("SELECT sk_id from `skill` where sk_name = ?");
                                                $sql->bindParam(1,$skill);
                                                $sql->execute();
                                                $num=$sql->rowCount();
                                                if($num==1)
                                                {
                                                    $row=$sql->fetch(PDO::FETCH_ASSOC);
                                                    $skid = $row["sk_id"];
                                                    try
                                                    {
                                                        $sql=$conn->prepare("SELECT sk_id,j_id from `job_skill` where sk_id = ? && j_id = ?");
                                                        $sql->bindParam(1,$skid);
                                                        $sql->bindParam(2,$_SESSION["jid"]);
                                                        $sql->execute();
                                                        $num=$sql->rowCount();
                                                        if($num==1)
                                                        {
                                                            $_SESSION["skill_err"] = "Skill already inserted";
                                                        }
                                                        else
                                                        {
                                                            try
                                                            {
                                                                $sql = $conn->prepare("INSERT INTO job_skill(sk_id,j_id) VALUES (:skid, :jid)");
                                                                $sql->bindParam(':skid', $skid);
                                                                $sql->bindParam(':jid', $_SESSION["jid"]);
                                                                if($sql->execute()){
                                                                    $_SESSION["skill"] = "Data inserted successfully"; 
                                                            }
                                                                else{
                                                                    header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();  
                                                            }}
                                                            catch(Exception $e){
                                                                header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();  
                                                            }
                                                        }
                                                    }
                                                    catch(Exception $e)
                                                    {
                                                     header("location: https://qualifind.rushilshah.in/error.php");
                                                    ob_flush();
                                                    exit();    
                                                    }
                                                }
                                                else
                                                {
                                                    $_SESSION["skill_err"] = "Skill not available";
                                                }
                                            }
                                            catch(Exception $e){
                                                header("location: https://qualifind.rushilshah.in/error.php");
                                                ob_flush();
                                                exit();  
                                            }
                                        }
                                        elseif(isset($_POST["del_skill"]))
                                        {
                                            $skid = $_POST["skid"];
                                            try
                                            {
                                                $sql = $conn->prepare("DELETE FROM job_skill WHERE j_id = ? && sk_id = ?");
                                                $sql->bindParam(1, $_SESSION["jid"]);
                                                $sql->bindParam(2, $skid);
                                                if($sql->execute())
                                                {
                                                    $_SESSION["skill_err"] = "Skill Deleted Successfully";
                                                }
                                                else
                                                {
                                                   header("location: https://qualifind.rushilshah.in/error.php");
                                                    ob_flush();
                                                    exit();  
                                                }
                                            }
                                            catch(Exception $e)
                                            {
                                               header("location: https://qualifind.rushilshah.in/error.php");
                                                ob_flush();
                                                exit();  
                                            }
                                        }
                                        elseif(isset($_POST["sub_post"]))
                                        {
                                            try
                                            {
                                                $jstat = 1;
                                                $sql = $conn->prepare("UPDATE `job_details` SET j_status =:jstatus WHERE j_id=:id");
                                                $sql->bindParam(':jstatus', $jstat);
                                                $sql->bindParam(':id', $_SESSION["jid"]);
                                                if($sql->execute())
                                                {
                                                    $_SESSION["skill"] = "Job Posted Successfully";
                                                    unset($_SESSION["jid"]);
                                                }
                                                else{
                                                   header("location: https://qualifind.rushilshah.in/error.php");
                                                    ob_flush();
                                                    exit();  
                                                } 
                                            }
                                            catch(PDOException $e)
                                            {
                                               header("location: https://qualifind.rushilshah.in/error.php");
                                                ob_flush();
                                                exit();     
                                            }
                                        }
                                        else
                                        {
                                            
                                        }
                                        if(isset($_POST["sub_round"]))
                                        {
                                            $rnum = $_POST["roundnum"];
                                            $rname = $_POST["roundname"];
                                            try
                                            {   
                                                $sql = $conn->prepare("SELECT jr_id FROM job_round WHERE j_id = ? && r_num = ?");
                                                $sql->bindParam(1,$_SESSION["jid"]);
                                                $sql->bindParam(2,$rnum);
                                                $sql->execute();
                                                $num = $sql->rowCount();
                                                if($num == 1)
                                                {
                                                    $_SESSION["skill_err"] = "Round already inserted";    
                                                }
                                                else
                                                {
                                                    $sql = $conn->prepare("INSERT into `job_round`(j_id,r_num,r_title) VALUES(?,?,?)");
                                                    $sql->bindParam(1,$_SESSION["jid"]);
                                                    $sql->bindParam(2,$rnum);
                                                    $sql->bindParam(3,$rname);
                                                    if($sql->execute())
                                                    {
                                                        $_SESSION["skill"] = "Round added successfully";
                                                    }
                                                    else
                                                    {
                                                        $_SESSION["skill_err"] = "Something went wrong! Try again later";
                                                    }
                                                }
                                            }
                                            catch(PDOException $e)
                                            {
                                                
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <div>Skills
                                    <div class="page-title-subheading">
                                        <?php
                                            if(isset($_SESSION["skill"]))
                                                {
                                                    echo "<span style='color:green'>" . $_SESSION["skill"] . "</span>";
                                                    unset($_SESSION["skill"]);
                                                }
                                                elseif(isset($_SESSION["skill_err"]))
                                                {
                                                     echo "<span style='color:red'>" . $_SESSION["skill_err"] . "</span>";
                                                    unset($_SESSION["skill_err"]);
                                                }
                                                else
                                                {
                                                    echo " Add skills relevant to your post. If done press the post button.";
                                                }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Skill</h5>
                            <form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
                                 <script>
                                          $( function() {
                                            
                                            <?php 
                                                echo "var availableTags = [";
                                              include 'include/config.php';
                                                try
                                                {
                                                    $sql=$conn->prepare("SELECT * from `skill` ORDER BY sk_id ASC" );
                                                    $sql->execute();
                                                    $source = array();
                                                    $row = $sql->fetchAll();
                                                    for($i = 0; $i < count($row); $i++)
                                                    {
                                                        $pname = $row[$i]['sk_name'];
                                                        $pro = explode("_", $pname);
                                                        $product = implode(" ", $pro);
                                                        echo '"' . $row[$i]['sk_name'] . '",';
                                                    }
                                                     echo " ];";
                                                    // echo $pass;
                                                    
                                                }
                                                catch(PDOException $e)
                                                {
                                                  header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();      
                                                }
                                              
                                              ?>
                                            
                                            $( "#tags" ).autocomplete({
                                              source: availableTags
                                            });
                                          } );
                                          </script>
                                    <div class="position-relative form-group">
                                    <label for="tags" class="">Name</label>
                                        <input name="skill" id="tags" placeholder="Skill Name" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid name
                                        </div>
                                    </div>
                                    <div style="float:left;"><button class="btn btn-primary" name="sub_skill" type="submit">Add Skill</button></div>
                                
                            </form>
                            <form method="post"><div style="display:inline;float:right;"><button class="mb-2 mr-2 btn-transition btn btn-outline-success" name="sub_post" type="submit">Post Job</button></div></form>
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
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Skills</h5>
                                    <table  class="mb-0 table table-striped">
                                        
                                        <?php 
                                                   
                                            try
                                              {
                                                $sql=$conn->prepare("SELECT sk_id from `job_skill` where j_id = ?");
                                                $sql->bindParam(1,$_SESSION["jid"]);
                                                if($sql->execute())
                                                {
                                                   
                                                    $row = $sql->fetchAll();
                                                    if(count($row) > 0)
                                                    {
                                                        echo "<thead><th>Name</th><th>Option</th></thead><tbody>";
                                                        for($i = 0; $i < count($row); $i++)
                                                        {
                                                            try
                                                            {
                                                                $sk = $row[$i]["sk_id"];
                                                                $query=$conn->prepare("SELECT * from `skill` where sk_id = ?");
                                                                $query->bindParam(1,$sk);
                                                                if($query->execute())
                                                                {
                                                                    
                                                                    $num=$query->rowCount();
                                                                    if($num==1)
                                                                    {
                                                                        $rowass=$query->fetch(PDO::FETCH_ASSOC);
                                                                        echo "<tr>";
                                                                        echo "<td>" . $rowass["sk_name"] ."</td>";
                                                                        echo "<td>
                                                                        <form action=" . htmlspecialchars($_SERVER['PHP_SELF']) ." method='post'>
                                                                        <input type='hidden' value='" . $rowass["sk_id"] ."' name='skid' >
                                                                        <button type='submit' class='mb-2 mr-2 btn-transition btn btn-outline-danger' name='del_skill'>Delete</button>
                                                                        </form>
                                                                        </td>";
                                                                        echo"</tr>";
                                                                       
                                                                    }
                                                                    
                                                                }
                                                                else
                                                                {
                                                                    echo "No Records were Found"; 
                                                                }
                                                            }
                                                            catch(Exception $e)
                                                            {
                                                               header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();  
                                                            }
                                                        }
                                                        echo "</tbody>";
                                                    }
                                                    else
                                                    {
                                                        echo "<p style='font-size:18px;color:grey;font-style:italic;'>No Records were Found</p>";
                                                    }
                                                     
                                                }
                                                else
                                                {
                                                    echo "<p style='font-size:15px;color:grey;font-style:italic;'>No Records were Found</p>";
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
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Rounds of Interview</h5>
                            <form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
                                <div class="form-row">
                                   <div class="col-md-6 mb-3">
                                        <label for="eduex" class="">Number of round</label> 
                                        <select name="roundnum" id="eduex" class="form-control" required>
                                            <option value="" hidden disabled selected>Select Number of Round</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                        </select> 
                                        <div class="invalid-feedback">
                                            Please provide valid round number
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="category">Round Name</label>
                                        <input type="text" class="form-control" id="validationCustom03" name="roundname" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid round name.
                                    </div>   
                                    </div>
                                </div>
                                <button class="btn btn-primary" name="sub_round" type="submit">Add Skill</button>
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
                    <div class="row">
                        <div class="col-lg-12 mt-2">
                            <div class="main-card mb-3 card">
                                <div class="card-body"><h5 class="card-title">Round</h5>
                                    <table  class="mb-0 table table-striped">
                                        
                                        <?php 
                                                   
                                            try
                                              {
                                                $sql=$conn->prepare("SELECT * from `job_round` where j_id = ?");
                                                $sql->bindParam(1,$_SESSION["jid"]);
                                                if($sql->execute())
                                                {
                                                   
                                                    $row = $sql->fetchAll();
                                                    if(count($row) > 0)
                                                    {
                                                        echo "<thead><th>Number</th><th>Name</th></thead><tbody>";
                                                        for($i = 0; $i < count($row); $i++)
                                                        {
                                                            echo "<tr>";
                                                            echo "<td>" . $row[$i]["r_num"] ."</td>";
                                                            echo "<td>" . $row[$i]["r_title"] ."</td>";
                                                            echo"</tr>";
                                                        }
                                                        echo "</tbody>";
                                                    }
                                                    else
                                                    {
                                                        echo "<p style='font-size:18px;color:grey;font-style:italic;'>No Records were Found</p>";
                                                    }
                                                     
                                                }
                                                else
                                                {
                                                    echo "<p style='font-size:15px;color:grey;font-style:italic;'>No Records were Found</p>";
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
                ?> 
            </div>


<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>