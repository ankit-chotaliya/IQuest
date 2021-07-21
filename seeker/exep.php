<?php 
ob_start();
    include "include/session.php";
    include "include/header.php";
    include "include/sidebar.php";
?>
 <div class="app-main__outer">
                <div class="app-main__inner">
                    <?php
                        
                        if($_SERVER["REQUEST_METHOD"] == "POST")
                        {
                            $cname = $_POST["cname"];
                            $sdate = $_POST["sdate"];
                            $edate = $_POST["edate"];
                            $cdeg = $_POST["cdeg"];
                            if(empty($_POST["clink"]) || $_POST["clink"] == " ")
                            {
                                $link = null;
                            }
                            else
                            {
                                $link = $_POST["clink"];
                            }
                            $id = $_SESSION["sid"];
                            try{
                                
                                $sql=$conn->prepare("SELECT * from `st_workexp` where s_id=? && sw_name = ?");
                                $sql->bindParam(1,$_SESSION["sid"]);
                                $sql->bindParam(2,$cname);
                                $sql->execute();
                                $num=$sql->rowCount();
                                if($num==1)
                                {
                                   $_SESSION["exp_err"] = "You have already inserted this data"; 
                                }
                                else
                                {
                                    $sql = $conn->prepare("INSERT INTO st_workexp(sw_name,sw_stime,sw_etime,sw_desg,sw_link,s_id) VALUES (:cname, :sdate, :edate, :cdeg, :clink, :id)");
                                    $sql->bindParam(':cname', $cname);
                                    $sql->bindParam(':sdate', $sdate);
                                    $sql->bindParam(':edate', $edate);
                                    $sql->bindParam(':cdeg', $cdeg);
                                    $sql->bindParam(':clink', $link);
                                    $sql->bindParam(':id', $id);
                                    $sql->execute();
                                    $_SESSION["exp"] = "Data inserted successfully";
                                }
                            }
                            catch(Exception $e){
                                header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit(); 
                            }
                        }
                        ?>
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                                        </i>
                                </div>
                                <div>Work-Exeperince
                                    <div class="page-title-subheading">
                                        <?php
                                                if(isset($_SESSION["exp"]))
                                                {
                                                    echo "<span style='color:green'>" . $_SESSION["exp"] . "</span>";
                                                    unset($_SESSION["exp"]);
                                                }
                                                elseif(isset($_SESSION["exp_err"]))
                                                {
                                                     echo "<span style='color:red'>" . $_SESSION["exp_err"] . "</span>";
                                                    unset($_SESSION["exp_err"]);
                                                }
                                                else
                                                {
                                                    echo " Give your past work exeperince details here.";
                                                }
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Experience</h5>
                            <form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                <div class="position-relative form-group">
                                    <label for="exampleAddress"class="">Name</label>
                                        <input name="cname" id="exampleAddress"placeholder="Company Name" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid name
                                        </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="Startdate"class="">Start-Date</label>
                                            <input name="sdate" id="Startdate" type="month" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid month.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="enddate" class="">End-Date</label>
                                            <input name="edate" id="enddate" type="month" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid month.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="Designation" class="">Designation</label>
                                            <input name="cdeg" id="Designation" placeholder="Project Role" type="text" class="form-control" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid designation.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="slink" class="">Link</label>
                                            <input name="clink" id="slink" placeholder="Link If any" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit form</button>
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
                </div>
                <?php 
                    include "include/footer.php";
                ?> 
            </div>


<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>