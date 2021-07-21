<?php 
    include "include/header.php";
    include "include/sidebar.php";
?>
 <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="lnr-picture text-danger">
                                    </i>
                                </div>
                                <div>Form Validation
                                    <div class="page-title-subheading">Inline validation is very easy to implement using
                                        the Architect Framework.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Projects</h5>
                            <form class="needs-validation" novalidate>
                                <div class="position-relative form-group"><label for="exampleAddress"
                                        class="">Address</label><input name="address" id="exampleAddress"
                                        placeholder="1234 Main St" type="text" class="form-control"></div>
                                <div class="form-row">

                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="Startdate"
                                                class="">Start-Date</label><input name="sdate" id="Startdate"
                                                type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="enddate"
                                                class="">End-Date</label><input name="edate" id="enddate"
                                                 type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="Designation"
                                                class="">Designation</label><input name="sdeg" id="Designation"
                                                placeholder="Project Role" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group"><label for="slink"
                                                class="">Link</label><input name="slink" id="slink"
                                                placeholder="Project Link" type="text" class="form-control">
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