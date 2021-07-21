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
                                        if($_SERVER["REQUEST_METHOD"] == "POST")
                                        {
                                            if(isset($_POST["sub_ac"]))
                                            {
                                                $title = $_POST["title"];
                                                $time = $_POST["time"];
                                                $level = $_POST["level"];
                                                if(!empty($_FILES['certi']['name']))
                                                {
                                                    //it return true of false
                                                    try
                                                    {
                                                        $sql=$conn->prepare("SELECT * from `st_achievement` where s_id=? && sa_title=? ");
                                                        $sql->bindParam(1,$_SESSION["sid"]);
                                                        $sql->bindParam(2,$title);
                                                        $sql->execute();
                                                        $num=$sql->rowCount();
                                                        if($num==1)
                                                        {
                                                           $_SESSION["ach_err"] = "You have already inserted this data"; 
                                                        }
                                                        else
                                                        {
                                                            $pdfname = $_FILES['certi']['name'];
                                                            $tmp_name = $_FILES['certi']['tmp_name'];
                                                            $targetFilePath  = "./uploads/certificate/". $pdfname;
                                                            $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                                                            $path = "./uploads/certificate/" .time(). "_". basename($pdfname);
                                                            $name = time(). "_".basename($pdfname);
                                                            move_uploaded_file($_FILES["certi"]["tmp_name"], $path);
                                                            
                                                            $sql = $conn->prepare("INSERT INTO st_achievement(sa_title,sa_time,sa_level,sa_certificate,s_id) 
                                                            VALUES (:title, :time, :level, :certificate, :id)");
                                                            $sql->bindParam(':title', $title);
                                                            $sql->bindParam(':time', $time);
                                                            $sql->bindParam(':level', $level);
                                                            $sql->bindParam(':certificate', $name);
                                                            $sql->bindParam(':id', $_SESSION["sid"]);
                                                            if($sql->execute())
                                                            {
                                                                $_SESSION["ach"] = "Data inserted successfully";
                                                            }
                                                            else{
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
                                            }
                                            elseif(isset($_POST["sub_pl"]))
                                            {
                                                $ploc = $_POST["ploc"];
                                                try{
                                                        $sql=$conn->prepare("SELECT * from `st_ploc` where s_id=? && sp_name=? ");
                                                        $sql->bindParam(1,$_SESSION["sid"]);
                                                        $sql->bindParam(2,$ploc);
                                                        $sql->execute();
                                                        $num=$sql->rowCount();
                                                        if($num==1)
                                                        {
                                                           $_SESSION["ach_err"] = "You have already inserted this data"; 
                                                        }
                                                        else
                                                        {
                                                            $city = array("Ahmedabad", "Pune", "Mumbai", "Banglore", "Delhi", "Baroda", "Vadodara", "Indore");
                                                            if(in_array($ploc, $city))
                                                            {
                                                                $sql = $conn->prepare("INSERT INTO st_ploc(sp_name,s_id) VALUES (:ploc, :id)");
                                                                $sql->bindParam(':ploc', $ploc);
                                                                $sql->bindParam(':id', $_SESSION["sid"]);
                                                                if($sql->execute())
                                                                {
                                                                    $_SESSION["ach"] = "Data inserted successfully";
                                                                }
                                                                else{
                                                                    $_SESSION["ach_err"]="Something went wrong! Please try again later";
                                                                }
                                                            }
                                                            else
                                                            {
                                                                $_SESSION["ach_err"]="Location not Available";
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
                                                $des = trim($_POST["des"]);
                                                $wsample = $_POST["wsample"];
                                                if(!empty($_POST['lang']))
                                                {
                                                    // Loop to store and display values of individual checked checkbox.
                                                    foreach($_POST['lang'] as $lang)
                                                    {
                                                        $language .= $lang . " ";
                                                    }
                                                }
                                                if(!empty($_FILES['resume']['name']))
                                                {
                                                    
                                                    //it return true of false
                                                    try{
                                                        
                                                        $sql=$conn->prepare("SELECT * from `st_adetails` where s_id=?");
                                                        $sql->bindParam(1,$_SESSION["sid"]);
                                                        $sql->execute();
                                                        $num=$sql->rowCount();
                                                        if($num==1)
                                                        {
                                                            $pdfname = $_FILES['resume']['name'];
                                                            $tmp_name = $_FILES['resume']['tmp_name'];
                                                            $targetFilePath  = "./uploads/resume/". $pdfname;
                                                            $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                                                            $path = "./uploads/resume/" .time(). "_". basename($pdfname);
                                                            $name = time(). "_".basename($pdfname);
                                                            
                                                            move_uploaded_file($_FILES["resume"]["tmp_name"], $path);
                                                            $sql = $conn->prepare("UPDATE `st_adetails` SET sad_desc =:desc,sad_lang = :lang,
                                                            sad_resume= :resume, sad_wsample = :wsample WHERE s_id=:id");
                                                            $sql->bindParam(':desc', $des);
                                                            $sql->bindParam(':lang', $language);
                                                            $sql->bindParam(':resume', $name);
                                                            $sql->bindParam(':wsample', $wsample);
                                                            $sql->bindParam(':id', $_SESSION["sid"]);
                                                            if($sql->execute())
                                                            {
                                                                $_SESSION["ach"] = "Data updated successfully";
                                                            }
                                                            else{
                                                                $_SESSION["ach_err"]="Something went wrong! Please try again later";
                                                            }   
                                                        }
                                                        else
                                                        {
                                                            $pdfname = $_FILES['resume']['name'];
                                                            $tmp_name = $_FILES['resume']['tmp_name'];
                                                            $targetFilePath  = "./uploads/resume/". $pdfname;
                                                           
                                                            $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
                                                            $path = "./uploads/resume/" .time(). "_". basename($pdfname);
                                                            $name = time(). "_".basename($pdfname);
                                                            
                                                            move_uploaded_file($_FILES["resume"]["tmp_name"], $path);
                                                            $sql = $conn->prepare("INSERT INTO st_adetails(sad_desc,sad_lang,sad_resume,sad_wsample,s_id) 
                                                            VALUES (:desc, :lang, :resume, :wsample, :id)");
                                                            $sql->bindParam(':desc', $des);
                                                            $sql->bindParam(':lang', $language);
                                                            $sql->bindParam(':resume', $name);
                                                            $sql->bindParam(':wsample', $wsample);
                                                            $sql->bindParam(':id', $_SESSION["sid"]);
                                                            if($sql->execute())
                                                            {
                                                                $_SESSION["ach"] = "Data inserted successfully";
                                                            }
                                                            else{
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
                                                
                                            }
                                        }
                                    ?>
                                    <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                                        </i>
                                </div>
                                <div>Achievemets & Additional Details
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
                                                echo " Add your achievements and additional details here.";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Achievements</h5>
                            <form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleFile" class="">Title</label>
                                            <input type="text" class="form-control" id="validationCustom03" placeholder="Title Name" name="title" required>   
                                            <div class="invalid-feedback">
                                                Please provide a valid title
                                            </div>
                                        </div> 
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleFile" class="">Time</label>
                                            <input type="month" class="form-control" id="validationCustom03" placeholder="" name="time" required>
                                            <div class="invalid-feedback">
                                                Please provide a valid month
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleFile" class="">Level</label>
                                            <select class="mb-2 form-control" name="level" required>
                                                <option value="" disabled hidden selected>Select Level</option>
                                                <option value="None">None</option>
                                                <option value="Zonal">Zonal</option>
                                                <option value="District">District</option>
                                                <option value="State">State</option>
                                                <option value="National">National</option>
                                                <option value="International">International</option>
                                            </select>   
                                             <div class="invalid-feedback">
                                                Please provide level
                                            </div>
                                        </div> 
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleFile" class="">Certificate</label>
                                            <input name="certi" id="certi" type="file" class="form-control-file" required>
                                            <div class="invalid-feedback">
                                                Please provide Certificate
                                            </div>
                                        </div>
                                    </div>
                                <button class="btn btn-primary" type="submit" name="sub_ac">Submit</button>
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
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Preferred Location</h5>
                            <form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
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
                                    $( "#city" ).autocomplete({
                                      source: availableTags
                                    });
                                  } );
                                  </script>
                                <div class="position-relative form-group">
                                    <label for="tags"class="">Location</label>
                                    <input name="ploc" id="city" placeholder="Preferred Location" type="text" class="form-control" required>
                                    <div class="invalid-feedback">
                                        Please provide City
                                    </div>
                                </div>
                                <button class="btn btn-primary" name="sub_pl" type="submit">Submit</button>
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
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Additional Details</h5>
                            <form role="form" class="needs-validation" name="ad_detail" id="ad_detail" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                            method="post" autocomplete="off" enctype="multipart/form-data">
                                    <div class="position-relative form-group">
                                    <label for="des"class="">About You</label>
                                       <textarea class="form-control" name="des" id="des" form="ad_detail" rows="3" required></textarea>
                                        <div class="invalid-feedback">
                                            Please provide a valid description
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleFile" class="">Work Sample</label>
                                            <input type="text" class="form-control" id="validationCustom03" name="wsample" 
                                            placeholder="Enter the link of google drive which contain your sample" >   
                                        </div> 
                                        <div class="col-md-6 mb-3">
                                            <label for="exampleFile" class="">Resume</label>
                                            <input name="resume" id="exampleFile" type="file" class="form-control-file" required>    
                                        </div>
                                    </div>
                                    <div class="position-relative form-check" style="font-size:15px;">
                                        <label class="form-check-label">
                                            <input type="checkbox" name="lang[]" value="English" class="form-check-input">English&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </label>
                                        <label class="form-check-label">
                                            <input type="checkbox" name="lang[]" value="Hindi" class="form-check-input">Hindi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        </label>
                                        <label class="form-check-label">
                                            <input type="checkbox" name="lang[]" value="Gujarati" class="form-check-input">Gujarati
                                        </label>
                                    </div>
                                    <br>
                                <button class="btn btn-primary" type="submit" name="sub_adetail">Submit</button>
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


<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>