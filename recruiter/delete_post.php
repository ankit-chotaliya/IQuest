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
                                    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["sub_del"]))
                                    {
                                        try
                                        {
                                            $id = $_POST["delid"];
                                            $sql = $conn->prepare("DELETE FROM job_details WHERE j_id =:id");
                                            $sql->bindParam(":id", $id);
                                            if($sql->execute())
                                            {
                                                header("Location: https://qualifind.rushilshah.in/recruiter/postedjob.php");
                                                ob_flush();
                                                exit();
                                            }
                                        }
                                        catch(PDOException $e)
                                        {
                                           header("location: https://qualifind.rushilshah.in/error.php");
            ob_flush();
            exit();
                                        }
                                    }
                                    ?>
                                </div>
                                <div>Delete Post
                                    <div class="page-title-subheading">
                                        <?php
                                            if(isset($_SESSION["del"]))
                                                {
                                                    echo "<span style='color:green'>" . $_SESSION["del"] . "</span>";
                                                    unset($_SESSION["del"]);
                                                }
                                                elseif(isset($_SESSION["del_err"]))
                                                {
                                                     echo "<span style='color:red'>" . $_SESSION["del_err"] . "</span>";
                                                    unset($_SESSION["del_err"]);
                                                }
                                                else
                                                {
                                                    echo "Delete the post";
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
                                    <div class="position-relative form-group">
                                    <input type="hidden" name="delid" value="<?php echo $_GET["id"]; ?>">
                                    <label for="tags" class="">Are you sure you want to delete this post?</label>
                                    </div>
                                    <div style="float:left;"><button class="mb-2 mr-2 btn-transition btn btn-outline-danger" name="sub_del" type="submit">YES</button> &nbsp;&nbsp;&nbsp;
                                    <a class="mb-2 mr-2 btn-transition btn btn-outline-success" href="postedjob.php">NO</a></div>
                                
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