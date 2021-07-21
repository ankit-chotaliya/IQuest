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
                                    <?php
                                        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub_pedit"]) && isset($_SESSION["editid"]))
                                        {
                                            $title = $_POST["title"];
                                            $desc = trim($_POST["desc"]);
                                            $req = trim($_POST["req"]);
                                            $eduex = trim($_POST["eduex"]);
                                            $deadline = $_POST["deadline"];
                                            $loc = $_POST["loc"];
                                            $vac = $_POST["vac"];
                                            $type= $_POST["type"];
                                            $category = $_POST["category"];
                                            $minsalary = $_POST["minsalary"];
                                            $maxsalary = $_POST["maxsalary"];
                                            try
                                            {
                                                $sql = $conn->prepare("UPDATE job_details SET j_title=:title, j_desc=:desc, j_req=:req, j_eduex=:eduex, 
                                                j_deadline=:deadline, j_loc=:loc, j_vacancy=:vac, j_type=:type, j_cat=:category, j_minsalary=:minsalary,
                                                j_maxsalary=:maxsalary WHERE j_id=:id ");
                                                $sql->bindParam(':title', $title);
                                                $sql->bindParam(':desc', $desc);
                                                $sql->bindParam(':req', $req);
                                                $sql->bindParam(':eduex', $eduex);
                                                $sql->bindParam(':deadline', $deadline);
                                                $sql->bindParam(':loc', $loc);
                                                $sql->bindParam(':vac', $vac);
                                                $sql->bindParam(':type', $type);
                                                $sql->bindParam(':category', $category);
                                                $sql->bindParam(':minsalary', $minsalary);
                                                $sql->bindParam(':maxsalary', $maxsalary);
                                                $sql->bindParam(':id', $_SESSION["editid"]);
                                                if($sql->execute())
                                                {
                                                    unset($_SESSION["editid"]);
                                                    header("Location: https://qualifind.rushilshah.in/recruiter/postedjob.php");
                                                    exit();
                                                }
                                                else{
                                                   header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();
                                                }
                                                
                                            }
                                            catch(Exception $e)
                                            {
                                                $header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();
                                            }
                                        }
                                        elseif(isset($_GET["id"]))
                                        {
                                            $_SESSION["editid"] = $_GET["id"];
                                            try
                                            {
                                                $sql = $conn->prepare("SELECT * FROM job_details WHERE j_id = ?");
                                                $sql->bindParam(1,$_GET["id"]);
                                                $sql->execute();
                                                $num = $sql->rowCount();
                                                if($num == 1)
                                                {
                                                    $row = $sql->fetch(PDO::FETCH_ASSOC);
                                    ?>
                                </div>
                                <div>Job Post Details
                                    <div class="page-title-subheading">
                                        <?php
                                            if(isset($_SESSION["pedit"]))
                                            {
                                                echo "<span style='color:green'>" . $_SESSION["pedit"] . "</span>";
                                                unset($_SESSION["pedit"]);
                                            }
                                            elseif(isset($_SESSION["pedit_err"]))
                                            {
                                                 echo "<span style='color:red'>" . $_SESSION["pedit_err"] . "</span>";
                                                unset($_SESSION["pedit_err"]);
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
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Create A Job Post</h5>
                            <form class="needs-validation" role="form" name="post_add" id="post_add" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
                                <script>
                                      $( function() {
                                        var availableTags = [
                                          "Ahmedabad",
                                          "Pune",
                                          "Mumbai",
                                          "Banglore",
                                          "Delhi",
                                          "Baroda",
                                          "Vadodara",
                                          "Indore",
                                        ];
                                        $( "#loc" ).autocomplete({
                                          source: availableTags
                                        });
                                      } );
                                      </script>
                                <div class="position-relative form-group">
                                    <label for="jobtitle" class="">Title</label>
                                    <input name="title" id="jobtitle" type="text" class="form-control" value="<?php echo $row["j_title"]; ?>" placeholder="Job Title" required>
                                    <div class="invalid-feedback">
                                        Please provide Title
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="desc" class="">Description</label> 
                                    <textarea class="form-control" name="desc" id="desc" form="post_add" rows="3" required><?php echo $row["j_desc"]; ?></textarea>
                                    <div class="invalid-feedback">
                                        Please provide Description
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="req" class="">Requirements</label> 
                                    <textarea class="form-control" name="req" id="req" form="post_add" rows="3" required><?php echo $row["j_req"]; ?></textarea>
                                    <div class="invalid-feedback">
                                        Please provide Requirement
                                    </div>
                                </div>
                                <div class="form-row">
                                   <div class="col-md-6 mb-3">
                                        <label for="eduex" class="">Education / Experience </label> 
                                        <select name="eduex" id="eduex" class="form-control" required>
                                            <option value="10" <?php if($row["j_eduex"] == "10"){ echo "selected"; } ?> >10TH passout</option>
                                            <option value="12" <?php if($row["j_eduex"] == "12"){ echo "selected"; } ?>>12TH passout</option>
                                            <option value="diploma" <?php if($row["j_eduex"] == "diploma"){ echo "selected"; } ?>>Diploma</option>
                                            <option value="undergraduate" <?php if($row["j_eduex"] == "undergraduate"){ echo "selected"; } ?>>Under Graduate</option>
                                            <option value="postgraduate" <?php if($row["j_eduex"] == "postgraduate"){ echo "selected"; } ?>>Post Graduate</option>
                                        </select> 
                                    <div class="invalid-feedback">
                                        Please provide Education/Experience
                                    </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="category">Category</label>
                                        <select name="category" id="category" class="form-control" required>
                                            <option value="DesignandCreative" <?php if($row["j_cat"] == "DesignandCreative"){ echo "selected"; } ?>>Design & Creative</option>
                                            <option value="DesignandDevelopement" <?php if($row["j_cat"] == "DesignandDevelopement"){ echo "selected"; } ?>>Design & Developement</option>
                                            <option value="SalesandMarketing" <?php if($row["j_cat"] == "SalesandMarketing"){ echo "selected"; } ?>>Sales & Marketing</option>
                                            <option value="MobileApplication" <?php if($row["j_cat"] == "MobileApplication"){ echo "selected"; } ?>>Mobile Application</option>
                                            <option value="Construction" <?php if($row["j_cat"] == "Construction"){ echo "selected"; } ?>>Construction</option>
                                            <option value="InformationTechnology" <?php if($row["j_cat"] == "InformationTechnology"){ echo "selected"; } ?>>Information Technology</option>
                                            <option value="RealEstate" <?php if($row["j_cat"] == "RealEstate"){ echo "selected"; } ?>>Real Estate</option>
                                            <option value="ContentWriter" <?php if($row["j_cat"] == "ContentWriter"){ echo "selected"; } ?>>Content Writer</option>
                                        </select> 
                                    <div class="invalid-feedback">
                                        Please provide a valid category.
                                    </div>   
                                    </div>
                                </div>
                                <div class="form-row">
                                   <div class="col-md-6 mb-3">
                                        <label for="jobtitle" class="">Deadline</label>
                                        <input name="deadline" id="jobtitle" type="date" value="<?php echo $row["j_deadline"]; ?>" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please provide Deadline
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="loc">Location</label>
                                        <input name="loc" id="loc" placeholder="Location" value="<?php echo $row["j_loc"]; ?>" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                             Please provide City
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                   <div class="col-md-6 mb-3">
                                        <label for="validationCustom03">Vacancy</label>
                                        <input type="number" class="form-control" id="validationCustom03" value="<?php echo $row["j_vacancy"]; ?>" name="vac" required>
                                        <div class="invalid-feedback">
                                            Please provide a Vacancy.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="type">Choose a Jobtype:</label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="FullTime" <?php if($row["j_type"] == "FullTime"){ echo "selected"; } ?>>Full-Time</option>
                                            <option value="PartTime" <?php if($row["j_type"] == "PartTime"){ echo "selected"; } ?>>Part-Time</option>
                                            <option value="Internship" <?php if($row["j_type"] == "Internship"){ echo "selected"; } ?>>Internship</option>
                                        </select> 
                                        <div class="invalid-feedback">
                                            Please provide a valid type.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                   <div class="col-md-6 mb-3">
                                        <label for="validationCustom03">Minimum Salary</label>
                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $row["j_minsalary"]; ?>" name="minsalary" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Salary.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom03">Maximum Salary</label>
                                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $row["j_maxsalary"]; ?>" name="maxsalary" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Salary.
                                        </div>
                                    </div>
                                    <?php 
                                        date_default_timezone_set("Asia/Kolkata");
                                        $postdate = date("d-m-Y");
                                    ?>
                                    <input type="hidden" value="<?php echo $postdate ?>" name="postdate" >
                                </div>
                                <button class="btn btn-primary" name="sub_pedit" type="submit">Submit form</button>
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
                                           header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();
                                        }
                    
                ?>
                <?php 
                        include "include/footer.php";
                    ?> 
            </div>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
                        CKEDITOR.replace( 'req' );
                         CKEDITOR.replace( 'desc' );
</script>

<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>