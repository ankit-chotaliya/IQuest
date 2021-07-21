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
                                    
                                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub_skill"]))
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
                                                try{
                                                    $sql=$conn->prepare("SELECT sk_id, s_id from `st_skill` where sk_id = ? && s_id = ?");
                                                    $sql->bindParam(1,$skid);
                                                    $sql->bindParam(2,$_SESSION["sid"]);
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
                                                            $sql = $conn->prepare("INSERT INTO st_skill(s_id,sk_id) VALUES (:sid, :skid)");
                                                            $sql->bindParam(':sid', $_SESSION["sid"]);
                                                            $sql->bindParam(':skid', $skid);
                                                            if($sql->execute())
                                                                $_SESSION["skill"] = "Data inserted successfully";  
                                                            else{
                                                               header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit(); }
                                                        }
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
                                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["del_skill"]))
                                    {
                                        $skid = $_POST["skid"];
                                        try
                                        {
                                            $sql = $conn->prepare("DELETE FROM st_skill WHERE s_id = ? && sk_id = ?");
                                            $sql->bindParam(1, $_SESSION["sid"]);
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
                                                    echo " Add your skills here.";
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
                                                catch(Exception $e){
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
                                <button class="btn btn-primary" name="sub_skill" type="submit">Submit</button>
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
                                <div class="card-body"><h5 class="card-title">Skills</h5>
                                    <table  class="mb-0 table table-striped">
                                        
                                        <?php 
                                                   
                                            try
                                              {
                                                $sql=$conn->prepare("SELECT sk_id from `st_skill` where s_id = ?");
                                                $sql->bindParam(1,$_SESSION["sid"]);
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
                </div>
                <?php 
                    include "include/footer.php";
                ?> 
            </div>


<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>