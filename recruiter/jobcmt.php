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
                                    <?php
                                        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub_cmnt"]) )
                                        {
                                           $cmnt = trim($_POST["cmnt"]);
                                                
                                                    
                                                    //it return true of false
                                                    try{

                                                        {
                                                            $sql = $conn->prepare("UPDATE `job_apply` SET j_cmt=? WHERE s_id=? AND j_id=?");
                                                            $sql->bindParam(1,$cmnt);
                                                            $sql->bindParam(2,$_GET["sid"]);
                                                            $sql->bindParam(3,$_GET["jid"]);
                                                            if($sql->execute())
                                                            {
                                                                $_SESSION["ach"] = "Data updated successfully";
                                                            }
                                                            else{
                                                                $_SESSION["ach_err"]="Something went wrong! Please try again later";
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
                                        if(isset($_GET["sid"]) && isset($_GET["jid"])){
                                            $sql = $conn->prepare("SELECT j_cmt WHERE s_id=? AND j_id=?");
                                                            $sql->bindParam(1,$_GET["sid"]);
                                                            $sql->bindParam(2,$_GET["jid"]);
                                                            if($sql->execute()){
                                                            $row=$sql->fetch(PDO::FETCH_ASSOC);
                                                            $cmnt=$row["j_cmt"];
                                                            
                                                            }
                                        }           
                                    ?>
                                    <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                                        </i>
                                </div>
                                <div>Job comments
                                    <div class="page-title-subheading">
                                        <?php
                                            if(isset($_SESSION["ach"]))
                                            {
                                                echo "<span style='color:green'>" . $_SESSION["ach"] . "</span>";
                                                unset($_SESSION["ach"]);
                                            }
                                            elseif(isset($_SESSION["ach_err"]))
                                            {
                                                 echo "<span style='color:red'>" . $_SESSION["ach_err"] . "</span>";
                                                unset($_SESSION["ach_err"]);
                                            }
                                            else
                                            {
                                                echo " Add your comments details here.";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Job comments</h5>
                            <form class="needs-validation" novalidate action="#" method="post" autocomplete="off" name="jobcmnt" id="jobcmnt" role="form" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <label for="exampleFile" class="">Title</label>
                                            <!--<input type="textarea" class="form-control" id="validationCustom03" placeholder="Title Name" name="title" required>-->
                                            <textarea class="form-control" id="cmnt" name="cmnt" form="jobcmnt"><?php echo $cmnt; ?></textarea>
                                            <div class="invalid-feedback">
                                                Please provide a valid title
                                            </div>
                                        </div> 
                                    </div>
                                 
                                <button class="btn btn-primary" type="submit" name="sub_cmnt">Submit</button>
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
                   
                <?php 
                    include "include/footer.php";
                ?> 
            </div>


<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
                        CKEDITOR.replace( 'cmnt' );
                      
                        
</script>
</body>
</html>