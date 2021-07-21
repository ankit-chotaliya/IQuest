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
                                </div>
                                <div>Skills
                                    <div class="page-title-subheading">
                                        <?php
                                            echo " Add your skills here.";
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
                                    <?php 

                                              include 'include/config.php';
                                                try
                                                {
                                                    $sql=$conn->prepare("SELECT * from `skill` ORDER BY sk_id ASC" );
                                                    $sql->execute();
                                                    $source = array();
                                                    $row = $sql->fetchAll();
                                                   
                                                    for($i = 0; $i < count($row); $i++)
                                                    {
                                                        array_push($source, $row[$i]["sk_name"]);
                                                    }
                                                    for($i = 0; $i < count($source); $i++)
                                                    {
                                                       echo $source[$i];
                                                    }
                                                    // echo $pass;
                                                    
                                                                                                }
                                                catch(Exception $e){
                                                    
                                                }
                                              
                                              ?>
                                      
                                         <div class="ui-widget">
                                                <label for="tags">Tags: </label>
                                                 <input id="tags">
                                        </div>
                                       <script>
                                            
                                          $( function() {
                                              
                                            var availableTags =["html","ankit","kishan"] ;
                                            console.log("hello");
                                            $( "#tags" ).autocomplete({
                                              source: availableTags
                                            });
                                          } );
                                          </script>
                                            <?php
                                                
                                                            
                                                /* Attempt select query execution
                                                 $sql = "SELECT * FROM skill ORDER BY sk_id ASC";
                                                $result = mysqli_query($link, $sql);
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    $_SESSION['poid'] = $row['sk_id'];
                                                    $skname = $row['sk_name'];
                                                    $skillnm = explode("_", $skname);
                                                    $skill = implode(" ", $skillnm);
                                                    echo "<option value='" . $skill . "' </option>";
                                                }
                                                    mysqli_free_result($result);
                                                        mysqli_close($link);*/
                                            ?>
                                            
                                        <div class="invalid-feedback">
                                            Please provide a valid skill
                                        </div>
                                </div>
                                <div class="form-row">
                                    
                                    
                                    
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
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