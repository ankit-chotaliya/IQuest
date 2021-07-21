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
                                
                                if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub_add"]))
                                {
                                    $title = $_POST["title"];
                                    $number = $_POST["number"];
                                    $postdate = $_POST["postdate"];
                                    $jid = $_POST["jid"];
                                    
                                    try
                                    {
                                        $query = $conn->prepare("SELECT q_id FROM quiz ORDER BY q_id DESC LIMIT 1");
                                        $query->execute();
                                        $num = $query->rowCount();
                                        if($num == 1)
                                        {
                                            $row=$query->fetch(PDO::FETCH_ASSOC);
                                            $count = $row["q_id"];
                                            if($count > 0)
                                            {
                                                $qid = $count + 1;
                                                $_SESSION["qid"] = $qid;
                                            }
                                            else
                                            {
                                                $qid = 1;
                                                $_SESSION["qid"] = $qid;
                                            }
                                        }
                                        else
                                        {
                                            $qid = 1;
                                            $_SESSION["qid"] = $qid;   
                                        }
                                    }
                                    catch(PDOEXCEPTION $e)
                                    {
                                       header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();    
                                    }
                                    
                                    try
                                    {
                                        $_SESSION["qno"] = $number;
                                        $sql = $conn->prepare("INSERT INTO quiz(q_id,q_title,q_total,q_date,j_id) VALUES (:qid,:title,:number,:postdate,:jid) ");
                                        $sql->bindParam(":qid", $qid);
                                        $sql->bindParam(":title", $title);
                                        $sql->bindParam(":number", $number);
                                        $sql->bindParam(":postdate", $postdate);
                                        $sql->bindParam(":jid", $jid);
                                        if($sql->execute())
                                        {
                                            header("Location: https://qualifind.rushilshah.in/recruiter/quiz_question.php");
                                            ob_flush();
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
                                      header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();
                                    }
                                 }
                                
                                ?>
                                <div>Create Aptitude Skill Test
                                <div class="page-title-subheading">
                                        <?php
                                            if(isset($_SESSION["quizadd"]))
                                            {
                                                echo "<span style='color:green'>" . $_SESSION["quizadd"] . "</span>";
                                                unset($_SESSION["quizadd"]);
                                            }
                                            elseif(isset($_SESSION["quizadd_err"]))
                                            {
                                                 echo "<span style='color:red'>" . $_SESSION["quizadd_err"] . "</span>";
                                                unset($_SESSION["quizadd_err"]);
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
                            <h5 class="card-title">Create Aptitude Skill Test</h5>
                            <form class="needs-validation" novalidate action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" autocomplete="off">
                                <div class="position-relative form-group">
                                    <label for="name" class="">Title</label>
                                    <input name="title" id="name" type="text" class="form-control" placeholder="Title">
                                </div>
                                <div class="position-relative form-group">
                                    <label for="email" class="">Total number of questions</label>
                                    <input name="number" id="email" type="number" min="5" max="20" placeholder="Enter number between 5 to 20" class="form-control">
                                </div>
                                    <?php 
                                        date_default_timezone_set("Asia/Kolkata");
                                        $postdate = date("Y-m-d");
                                    ?>
                                    <input type="hidden" value="<?php echo $postdate ?>" name="postdate" >
                                    <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="jid" >
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
                        </div>
                    </div>
                </div>
                <?php 
                        include "include/footer.php";
                    ?>   
            </div>


<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>