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
                                    <?php
                                    
                                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["c_info"]))
                                    {
                                        $name = trim($_POST["name"]);
                                        $email = trim($_POST["email"]);
                                        $desc = trim($_POST["desc"]);
                                        if(empty($_POST["wblink"]) || $_POST["wblink"] == " ")
                                        {
                                            $wblink = null;
                                        }
                                        else
                                        {
                                            $wblink = $_POST["wblink"];   
                                        }
                                        try{
                                            
                                            $sql=$conn->prepare("SELECT * FROM rc_details WHERE r_id = ? && r_cname IS NOT NULL");
                                            $sql->bindParam(1,$_SESSION["rid"]);
                                            $sql->execute();
                                            $num=$sql->rowCount();
                                            if($num==1)
                                            {
                                                $_SESSION["cinfo_err"]= "You have already inserted the data";
                                            }
                                            else
                                            {
                                                $sql = $conn->prepare("UPDATE `rc_details` SET r_cemail=:email, r_cname=:name, r_cdesc =:desc,r_cwblink = :wblink
                                                WHERE r_id=:id");
                                                $sql->bindParam(':email', $email);
                                                $sql->bindParam(':name', $name);
                                                $sql->bindParam(':desc', $desc);
                                                $sql->bindParam(':wblink', $wblink);
                                                $sql->bindParam(':id', $_SESSION["rid"]);
                                                if($sql->execute())
                                                {
                                                    $_SESSION["cinfo"] = "Data inserted successfully";
                                                }
                                                else{
                                                    $_SESSION["cinfo_err"]="Something went wrong! Please try again later";
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
                                    
                                    ?>
                                </div>
                                <div>Company Information
                                    <div class="page-title-subheading">
                                        <?php
                                            if(isset($_SESSION["cinfo"]))
                                            {
                                                echo "<span style='color:green'>" . $_SESSION["cinfo"] . "</span>";
                                                unset($_SESSION["cinfo"]);
                                            }
                                            elseif(isset($_SESSION["cinfo_err"]))
                                            {
                                                 echo "<span style='color:red'>" . $_SESSION["cinfo_err"] . "</span>";
                                                unset($_SESSION["cinfo_err"]);
                                            }
                                            else
                                            {
                                                echo " Add your Company details here.";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Company Information</h5>
                            <form role="form" name="companyinfo" id="companyinfo" class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Name</label>
                                    <input name="name" id="name" placeholder="Company's Name" type="text" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid name.
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="email" class="">Email</label>
                                    <input name="email" id="email" placeholder="Company's Email" type="email" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please provide a valid Email.
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="desc">Description</label> 
                                    <textarea name="desc" id="desc" rows="3" form="companyinfo" class="form-control" required></textarea>
                                    <div class="invalid-feedback">
                                        Please provide a valid name.
                                    </div>
                                </div>
                                <div class="position-relative form-group">
                                    <label for="wblink" class="">Website Link</label>
                                    <input name="wblink" id="wblink" placeholder="Company's Website Link if any" type="text" class="form-control">
                                    
                                </div>
                                
                                <button class="btn btn-primary" name="c_info" type="submit">Submit form</button>
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