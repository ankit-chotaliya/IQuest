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
                                        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub_postadd"]))
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
                                            $postdate = $_POST["postdate"];
                                            $status = 0;
                                            try
                                            {
                                                $query = $conn->prepare("SELECT j_id FROM job_details ORDER BY j_id DESC LIMIT 1");
                                                $query->execute();
                                                $num = $query->rowCount();
                                                if($num == 1)
                                                {
                                                    $row=$query->fetch(PDO::FETCH_ASSOC);
                                                    $count = $row["j_id"];
                                                    if($count > 0)
                                                    {
                                                        $jid = $count + 1;
                                                        $_SESSION["jid"] = $jid;
                                                    }
                                                    else
                                                    {
                                                        $jid = 1;
                                                        $_SESSION["jid"] = $jid;
                                                    }
                                                }
                                            }
                                            catch(Exception $e)
                                            {
                                                 header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();  
                                            }
                                            try
                                            {
                                                $sql = $conn->prepare("INSERT INTO job_details(j_id,j_title,j_desc,j_req,j_eduex,j_deadline,j_loc,j_vacancy,j_type,
                                                j_cat,j_minsalary,j_maxsalary,j_postdate,j_status,r_id) VALUES (:jid,:title, :desc, :req, :eduex, :deadline, :loc, 
                                                :vac, :type, :category, :minsalary, :maxsalary, :postdate, :status ,:id)");
                                                $sql->bindParam(':jid',$jid);
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
                                                $sql->bindParam(':postdate', $postdate);
                                                $sql->bindParam(':status', $status);
                                                $sql->bindParam(':id', $_SESSION["rid"]);
                                                if($sql->execute())
                                                {
                                                    header("Location: https://qualifind.rushilshah.in/recruiter/skill.php");
                                                    ob_flush();
                                                    exit();
                                                }
                                                else{
                                                    $_SESSION["postadd_err"]="Something went wrong! Please try again later";
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
                                <div>Job Post Details
                                    <div class="page-title-subheading">
                                        <?php
                                            if(isset($_SESSION["postadd"]))
                                            {
                                                echo "<span style='color:green'>" . $_SESSION["postadd"] . "</span>";
                                                unset($_SESSION["postadd"]);
                                            }
                                            elseif(isset($_SESSION["postadd_err"]))
                                            {
                                                 echo "<span style='color:red'>" . $_SESSION["postadd_err"] . "</span>";
                                                unset($_SESSION["postadd_err"]);
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
                                    <input name="title" id="jobtitle" type="text" class="form-control" placeholder="Job Title" required>
                                    <div class="invalid-feedback">
                                        Please provide Title
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="desc" class="">Description</label> 
                                    <textarea class="form-control" name="desc" id="desc" form="post_add" rows="3" required></textarea>
                                    <div class="invalid-feedback">
                                        Please provide Description
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="req" class="">Requirements</label> 
                                    <textarea class="form-control" name="req" id="req" form="post_add" rows="3" required></textarea>
                                    <div class="invalid-feedback">
                                        Please provide Requirement
                                    </div>
                                </div>
                                <div class="form-row">
                                   <div class="col-md-6 mb-3">
                                        <label for="eduex" class="">Education / Experience</label> 
                                        <select name="eduex" id="eduex" class="form-control" required>
                                            <option value="" hidden disabled selected>Select Education/ Experience</option>
                                            <option value="10">10TH passout</option>
                                            <option value="12">12TH passout</option>
                                            <option value="diploma">Diploma</option>
                                            <option value="undergraduate">Under Graduate</option>
                                            <option value="postgraduate">Post Graduate</option>
                                        </select> 
                                    <div class="invalid-feedback">
                                        Please provide Education/Experience
                                    </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="category">Category</label>
                                        <select name="category" id="category" class="form-control" required>
                                            <option value="" hidden disabled selected>Select Category</option>
                                            <option value="DesignandCreative">Design & Creative</option>
                                            <option value="DesignandDevelopment">Design & Developement</option>
                                            <option value="SalesandMarketing">Sales & Marketing</option>
                                            <option value="MobileApplication">Mobile Application</option>
                                            <option value="Construction">Construction</option>
                                            <option value="InformationTechnology">Information Technology</option>
                                            <option value="RealEstate">Real Estate</option>
                                            <option value="ContentWriter">Content Writer</option>
                                        </select> 
                                    <div class="invalid-feedback">
                                        Please provide a valid category.
                                    </div>   
                                    </div>
                                </div>
                                <div class="form-row">
                                   <div class="col-md-6 mb-3">
                                        <label for="jobtitle" class="">Deadline</label>
                                        <input name="deadline" id="jobtitle" type="date" class="form-control" required>
                                        <div class="invalid-feedback">
                                            Please provide Deadline
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="loc">Location</label>
                                        <input name="loc" id="loc" placeholder="Location" type="text" class="form-control" required>
                                        <div class="invalid-feedback">
                                             Please provide City
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                   <div class="col-md-6 mb-3">
                                        <label for="validationCustom03">Vacancy</label>
                                        <input type="number" class="form-control" id="validationCustom03" name="vac" required>
                                        <div class="invalid-feedback">
                                            Please provide a Vacancy.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="type">Choose a Jobtype:</label>
                                        <select name="type" id="type" class="form-control" required>
                                            <option value="" selected hidden disabled >Select Job Type</option>
                                            <option value="FullTime">Full-Time</option>
                                            <option value="PartTime">Part-Time</option>
                                            <option value="Internship">Internship</option>
                                        </select> 
                                        <div class="invalid-feedback">
                                            Please provide a valid type.
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                   <div class="col-md-6 mb-3">
                                        <label for="validationCustom03">Minimum Salary</label>
                                        <input type="text" class="form-control" id="validationCustom03" name="minsalary" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Salary.
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom03">Maximum Salary</label>
                                        <input type="text" class="form-control" id="validationCustom03" name="maxsalary" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid Salary.
                                        </div>
                                    </div>
                                    <?php 
                                        date_default_timezone_set("Asia/Kolkata");
                                        $postdate = date("Y-m-d");
                                        echo $postdate;
                                    ?>
                                    <input type="hidden" value="<?php echo $postdate ?>" name="postdate" >
                                </div>
                                <button class="btn btn-primary" name="sub_postadd" type="submit">Submit form</button>
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

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
                        CKEDITOR.replace( 'req' );
                        CKEDITOR.replace( 'desc' );
                        
</script>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>