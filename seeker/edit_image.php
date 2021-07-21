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
                                        <?php 
                                            
                                            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub_img"]))
                                            {
                                                if(!empty($_FILES['image']['name']))
                                                {
                                                    
                                                    //it return true of false
                                                    try
                                                    {
                                                        
                                                        $pdfname = $_FILES['image']['name'];
                                                        $tmp_name = $_FILES['image']['tmp_name'];
                                                        $targetFilePath  = "./uploads/". $pdfname;
                                                        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                                                        $path = "./uploads/" .time(). "_". basename($pdfname);
                                                        $name = time(). "_".basename($pdfname);
                                                        move_uploaded_file($_FILES["image"]["tmp_name"], $path);
                                                        
                                                        $sql = $conn->prepare("UPDATE st_details SET s_img=:img WHERE s_id=:id");
                                                        $sql->bindParam(':img', $name);
                                                        $sql->bindParam(':id', $_SESSION["sid"]);
                                                        if($sql->execute())
                                                        {
                                                            $_SESSION["img"] = "Image updated successfully";
                                                        }
                                                        else{
                                                            $_SESSION["img_err"]="Something went wrong! Please try again later";
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
                                                    echo $_FILES['image']['name']; 
                                                }
                                            }
                                            
                                        ?>
                                    </div>
                                    <div>Job Seeker Dashboard
                                        <div class="page-title-subheading">
                                            <?php
                                            if(isset($_SESSION["img"]))
                                            {
                                                echo "<span style='color:green'>" . $_SESSION["img"] . "</span>";
                                                unset($_SESSION["img"]);
                                            }
                                            elseif(isset($_SESSION["img_err"]))
                                            {
                                                 echo "<span style='color:red'>" . $_SESSION["img_err"] . "</span>";
                                                unset($_SESSION["img_err"]);
                                            }
                                            else
                                            {
                                                echo "Edit your image.";
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-lg-12 mt-2">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Edit Image</h5>
                                        <form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                                                <div class="position-relative form-group">
                                                <label for="image" class="">Image</label>
                                                    <input name="image" type="file" id="image" class="form-control" required  accept="image/jpeg, image/png, image/jpg">
                                                    <div class="invalid-feedback">
                                                        Please provide a valid image
                                                    </div>
                                                </div>
                                                <div style="float:left;"><button class="btn btn-primary" name="sub_img" type="submit">Upload Image</button></div>
                                        </form>
                                    </div>
                                </div>  
                            </div>
                        </div>
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
                        include "include/footer.php";
                    ?>
                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>
