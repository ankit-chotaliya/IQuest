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
                                    <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <?php
                                    //unset($_SESSION["count"]);
                                    if(!isset($_SESSION["count"]))
                                    {
                                        $_SESSION["count"] = 0;
                                    }
                                    if(isset($_POST["sub_add"]) && $_SERVER["REQUEST_METHOD"] == "POST")
                                    {
                                        if($_SESSION["count"] <= $_SESSION["qno"])
                                        {
                                            if(!isset($_SESSION["qnoleft"]))
                                            {
                                                $_SESSION["qnoleft"] = $_SESSION["qno"];
                                            }
                                            $quesn =$_POST["quesn"];
                                            $_SESSION["qnoleft"] -= 1;
                                            $_SESSION["count"] += 1;
                                            $que = $_POST["que"];
                                            $opta = $_POST["opta"];
                                            $optb = $_POST["optb"];
                                            $optc = $_POST["optc"];
                                            $optd = $_POST["optd"];
                                            $ans = $_POST["ans"];
                                            $qid = $_SESSION["qid"];
                                            
                                            try
                                            {
                                                $query = $conn->prepare("SELECT qu_id FROM quiz_question ORDER BY qu_id DESC LIMIT 1");
                                                $query->execute();
                                                $num = $query->rowCount();
                                                if($num == 1)
                                                {
                                                    $row=$query->fetch(PDO::FETCH_ASSOC);
                                                    $count = $row["qu_id"];
                                                    if($count > 0)
                                                    {
                                                        $quid = $count + 1;
                                                    }
                                                    else
                                                    {
                                                        $quid = 1;
                                                    }
                                                }
                                                else
                                                {
                                                    $quid = 1;
                                                }
                                            }
                                            catch(PDOException $e)
                                            {
                                               header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();  
                                            }
                                            try
                                            {
                                                $sql = $conn->prepare("INSERT INTO quiz_question(qu_id,qu_sn,qu_que,qu_opta,qu_optb,qu_optc,qu_optd,qu_ans,q_id) 
                                                VALUES (:quid,:quesn,:que,:opta,:optb,:optc,:optd,:ans,:qid)");
                                                $sql->bindParam(":quid", $quid);
                                                $sql->bindParam(":quesn", $quesn);
                                                $sql->bindParam(":que", $que);
                                                $sql->bindParam(":opta", $opta);
                                                $sql->bindParam(":optb", $optb);
                                                $sql->bindParam(":optc", $optc);
                                                $sql->bindParam(":optd", $optd);
                                                $sql->bindParam(":ans", $ans);
                                                $sql->bindParam(":qid", $qid);
                                                if($sql->execute())
                                                {
                                                    
                                                    $_SESSION["queadd"] = "Data Added Successfully";
                                                }
                                                else{
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
                                    }
                                    if($_SESSION["count"] <= $_SESSION["qno"])
                                    {
                                    
                                     
                                ?>
                                <div>Create Aptitude Skill Test
                                <div class="page-title-subheading">
                                        <?php
                                            if(isset($_SESSION["queadd"]))
                                            {
                                                echo "<span style='color:green'>" . $_SESSION["queadd"] . "</span>";
                                                unset($_SESSION["queadd"]);
                                            }
                                            elseif(isset($_SESSION["queadd_err"]))
                                            {
                                                 echo "<span style='color:red'>" . $_SESSION["queadd_err"] . "</span>";
                                                unset($_SESSION["queadd_err"]);
                                            }
                                            else
                                            {
                                                echo " Add your Job Post Details here.";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php  
                    ?>
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Create Aptitude Skill Test</h5>
                            <form class="needs-validation" role="form" name="qu_add" id="qu_add" novalidate 
                            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method="post" autocomplete="off">
                                <div class="position-relative form-group" >
                            <label for="name" class="">Serial No.</label>
                                        <input name="quesn" id="name" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please provide valid Option
                                        </div> 
                                        </div>
                                <div class="position-relative form-group">
                                    <label for="que" class="">Question</label>
                                    <textarea class="form-control" name="que" id="que" form="qu_add" rows="3" required></textarea>
                                    <div class="invalid-feedback">
                                        Please provide valid Question
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="">Option A</label>
                                        <input name="opta" id="name" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please provide valid Option
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="">Option B</label>
                                        <input name="optb" id="name" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please provide valid Option
                                        </div>
                                    </div>    
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="">Option C</label>
                                        <input name="optc" id="name" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please provide valid Option
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="">Option D</label>
                                        <input name="optd" id="name" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please provide valid Option
                                        </div>
                                    </div>    
                                </div>
                                <div class="position-relative form-group">
                                    <label for="name" class="">Answer</label>
                                    <select name="ans" id="eduex" class="form-control" required>
                                        <option value="" hidden disabled selected>Select Answer</option>
                                        <option value="1">Option A</option>
                                        <option value="2">Option B</option>
                                        <option value="3">Option C</option>
                                        <option value="4">Option D</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a valid Option
                                    </div>
                                        
                                </div>
                                <button class="btn btn-primary" type="submit" name="sub_add">Next</button>
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
                            <?php 
                                    }
                                    else
                                    {
                                        unset($_SESSION["qid"]);
                                        unset($_SESSION["count"]); 
                                        unset($_SESSION["qno"]);
                                        header("Location: https://qualifind.rushilshah.in/recruiter/postedjob.php");
                                        exit();
                                    }
                            ?>
                        </div>
                    </div>
                </div>
                <?php 
                        include "include/footer.php";
                    ?>   
            </div>


<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>