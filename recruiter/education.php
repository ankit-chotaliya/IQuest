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
                                        <i class="pe-7s-monitor icon-gradient bg-mean-fruit">
                                        </i>
                                    </div>
                                    <div>Job Seeker Dashboard
                                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>            
                        <div class="row">
                            <div class="col-md-12">
                                    <div id="accordion" class="accordion-wrapper mb-3">
                                        <div class="card">
                                            <div id="headingOne" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne1" aria-expanded="true" aria-controls="collapseOne" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <h5 class="mb-2 mr-2 border-0 btn-transition btn btn-outline-focus" style="font-size:18px;">SSC</h5>
                                                </button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne1" aria-labelledby="headingOne" class="collapse show">
                                                <div class="card-body">
                                                    <form class="needs-validation" novalidate>
                                                        <div class="form-row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationCustom03">School</label>
                                                                <input type="text" class="form-control" id="validationCustom03" placeholder="School's Name" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid name.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="validationCustom04">Passing Year</label>
                                                                <input type="month" class="form-control" id="validationCustom04" placeholder="Passing Year" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid year.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="validationCustom05">Percentage</label>
                                                                <input type="text" class="form-control" id="validationCustom05" placeholder="Percentage" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid percentage.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                                    </form>
                                                    <script>
                                                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                                                        (function() {
                                                            'use strict';
                                                            window.addEventListener('load', function() {
                                                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                                var forms = document.getElementsByClassName('needs-validation');
                                                                // Loop over them and prevent submission
                                                                var validation = Array.prototype.filter.call(forms, function(form) {
                                                                    form.addEventListener('submit', function(event) {
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
                                        <div class="card">
                                            <div id="headingTwo" class="b-radius-0 card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="false" aria-controls="collapseTwo" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <h5 class="mb-2 mr-2 border-0 btn-transition btn btn-outline-focus" style="font-size:18px;">HSC / Diploma</h5>
                                                    </button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne2" class="collapse">
                                                <div class="card-body">
                                                    <form class="needs-validation" novalidate>
                                                        <div class="form-row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationCustom03">School / College</label>
                                                                <input type="text" class="form-control" id="validationCustom03" placeholder="School's Name" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid name.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="validationCustom04">Passing Year</label>
                                                                <input type="month" class="form-control" id="validationCustom04" placeholder="Passing Year" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid year.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="validationCustom05">Percentage / CGPA</label>
                                                                <input type="text" class="form-control" id="validationCustom05" placeholder="Percentage" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid percentage.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                                    </form>
                                                    <script>
                                                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                                                        (function() {
                                                            'use strict';
                                                            window.addEventListener('load', function() {
                                                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                                var forms = document.getElementsByClassName('needs-validation');
                                                                // Loop over them and prevent submission
                                                                var validation = Array.prototype.filter.call(forms, function(form) {
                                                                    form.addEventListener('submit', function(event) {
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
                                        <div class="card">
                                            <div id="headingThree" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne3" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <h5 class="mb-2 mr-2 border-0 btn-transition btn btn-outline-focus" style="font-size:18px;">Under Graduate</h5>
                                                    </button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne3" class="collapse">
                                                <div class="card-body">
                                                   <form class="needs-validation" novalidate>
                                                        <div class="form-row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationCustom03">College</label>
                                                                <input type="text" class="form-control" id="validationCustom03" placeholder="School's Name" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid name.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="validationCustom04">Passing Year</label>
                                                                <input type="month" class="form-control" id="validationCustom04" placeholder="Passing Year" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid year.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="validationCustom05">CGPA</label>
                                                                <input type="text" class="form-control" id="validationCustom05" placeholder="Percentage" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid percentage.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                                    </form>
                                                    <script>
                                                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                                                        (function() {
                                                            'use strict';
                                                            window.addEventListener('load', function() {
                                                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                                var forms = document.getElementsByClassName('needs-validation');
                                                                // Loop over them and prevent submission
                                                                var validation = Array.prototype.filter.call(forms, function(form) {
                                                                    form.addEventListener('submit', function(event) {
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
                                        <div class="card">
                                            <div id="headingFour" class="card-header">
                                                <button type="button" data-toggle="collapse" data-target="#collapseOne4" aria-expanded="false" aria-controls="collapseThree" class="text-left m-0 p-0 btn btn-link btn-block">
                                                    <h5 class="mb-2 mr-2 border-0 btn-transition btn btn-outline-focus" style="font-size:18px;">Post Graduate</h5>
                                                </button>
                                            </div>
                                            <div data-parent="#accordion" id="collapseOne4" class="collapse">
                                                <div class="card-body">
                                                    <form class="needs-validation" novalidate>
                                                        <div class="form-row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="validationCustom03">College</label>
                                                                <input type="text" class="form-control" id="validationCustom03" placeholder="School's Name" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid name.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="validationCustom04">Passing Year</label>
                                                                <input type="month" class="form-control" id="validationCustom04" placeholder="Passing Year" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid year.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 mb-3">
                                                                <label for="validationCustom05">CGPA</label>
                                                                <input type="text" class="form-control" id="validationCustom05" placeholder="Percentage" required>
                                                                <div class="invalid-feedback">
                                                                    Please provide a valid percentage.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Submit form</button>
                                                    </form>
                                                    <script>
                                                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                                                        (function() {
                                                            'use strict';
                                                            window.addEventListener('load', function() {
                                                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                                var forms = document.getElementsByClassName('needs-validation');
                                                                // Loop over them and prevent submission
                                                                var validation = Array.prototype.filter.call(forms, function(form) {
                                                                    form.addEventListener('submit', function(event) {
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
                                    </div>
                                </div>
                        </div>
                    </div>
                    <?php 
                        include "include/footer.php";
                    ?>    </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
</html>