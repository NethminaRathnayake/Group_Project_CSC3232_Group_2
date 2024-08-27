<?php
session_start();
require "assets/connection/connection.php";

if (isset($_SESSION["admin"])) {


?>
    <script>
        window.location = "admin.php";
    </script>
<?php

} elseif (isset($_SESSION["student"])) {
?>
    // <script>
        window.location = "home.php";
    </script>
    // <?php
    } else {
        ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/login_style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <title>Sign in & Sign up Form</title>
    </head>

    <body class="">
        <div class="containe">
            <div class="forms-containe">

                <div class="signin-signup">





                    <!-- sign in -->
                    <form action="#" class="sign-in-form">
                        <img src="assets/img/logo.png" class="image" alt="" />
                        <h2 class="title">Sign in</h2>
                        <div class="">
                            <i class="fas fa-user"></i>

                            <?php

                            $e = "";
                            $p = "";

                            if (isset($_COOKIE["e"])) {
                                $e = $_COOKIE["e"];
                            }
                            if (isset($_COOKIE["p"])) {
                                $p = $_COOKIE["p"];
                            }


                            ?>

                            <input class="form-control" type="text" value="<?php echo $e ?>" placeholder="User ID" id="lg_reg_no" />
                        </div>
                        <div class="mt-2">
                            <i class="fas fa-lock"></i>
                            <input class="form-control" type="password" value="<?php echo $p ?>" placeholder="Password" id="lg_password" />
                        </div>

                        <div class="form-check mt-2">
                            <!-- <input type="checkbox" class="form-check-input" value="" id="remember" checked> -->
                            <input  class="form-check-input"  type="checkbox" value="" id="remember" checked>
                            <label class="form-check-label" for="form-label" >
                                Remeber Me
                            </label>
                        </div>
                        <button type="submit" class="btn2 solid" onclick="login();">Login </button>
                        <!-- <p class="fs-6 text-start"><a href="#" onclick="forgotPassword();">Forget Password ?</a></p> -->


                    </form>


                    <!-- sign up -->

                    <form action="#" class="sign-up-form">
                        <img src="assets/img/logo.png" class="image" alt="" />

                        <h2 class="title">Sign up</h2>

                        <div class="row">
                            <div class="col-12">
                                <div class="row">

                                    <div class=" col-6 mt-3  ">
                                        <i class="fas fa-user"></i>
                                        <input class="form-control" type="text" placeholder="User ID" id="reg_no" />
                                    </div>

                                    <div class=" col-6 mt-3 ">
                                        <i class="fas fa-user"></i>
                                        <input class="form-control" type="text" placeholder="Name" id="name" />
                                    </div>

                                    <div class=" col-6 mt-3 ">
                                        <i class="bi bi-envelope-at-fill"></i>
                                        <input class="form-control" type="text" placeholder="Email" id="email" />
                                    </div>

                                    <div class=" col-6 mt-3 ">
                                        <i class="bi bi-phone-fill"></i>
                                        <input class="form-control" type="text" placeholder="Contact No:" id="contact" />
                                    </div>

                                    <div class=" col-6 mt-3 ">
                                        <i class="bi bi-lock-fill"></i>
                                        <input class="form-control" type="text" placeholder="Password " id="password" />
                                    </div>

                                    <div class=" col-6 mt-3 ">
                                        <i class="bi bi-lock-fill"></i>
                                        <input class="form-control" type="text" placeholder="Confirm Password" id="cm_password" />
                                    </div>

                                    <div class=" col-6 mt-3 ">
                                        <i class="bi bi-geo-alt-fill"></i>
                                        <input class="form-control" type="text" placeholder="Address " id="address" />
                                    </div>

                                    <div class=" col-6 mt-3  ">
                                        <select class=" col-6 form-select  " id="faculty">
                                            <option class="fw-lighter">Select Faculty</option>
                                            <?php
                                            $r = Database::search("SELECT * FROM `faculty`");
                                            $n = $r->num_rows;

                                            for ($x = 0; $x < $n; $x++) {
                                                $d = $r->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class=" col-6 mt-3 mb-3">
                                        <select class=" col-6 form-select  " id="department">
                                            <option class="fw-lighter">Select Department</option>
                                            <?php
                                            $r = Database::search("SELECT * FROM `department`");
                                            $n = $r->num_rows;
                                            for ($x = 0; $x < $n; $x++) {
                                                $d = $r->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <div class=" col-6 mt-3 mb-3 ">
                                        <select class=" col-6 form-select  " id="level">
                                            <option class="fw-lighter">Select Level</option>
                                            <?php
                                            $r = Database::search("SELECT * FROM `level`");
                                            $n = $r->num_rows;
                                            for ($x = 0; $x < $n; $x++) {
                                                $d = $r->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $d['id']; ?>"><?php echo $d['level']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>




                        <button type="submit" class="btn2 solid mt-3" onclick="signup();">Sign up</button>
                        <p class="social-text"> ... </p>

                    </form>



                </div>
            </div>

            <div class="panels-containe">

                <div class="panel left-panel">

                    <div class="content">
                        <p class="text-end"></p>
                        <h3>New here ?</h3>
                        <button class="btn2 transparent" id="sign-up-btn">
                            Sign up
                        </button>
                    </div>
                    <img src="assets/img/" class="image" alt="" />
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <p>
                            Do You Have Account ? Login Now ....!
                        </p>
                        <button class="btn2 transparent" id="sign-in-btn" onclick="login();">
                            Login
                        </button>
                    </div>
                    <img src="assets/img/" class="image" alt="" />
                </div>



                <!-- //model 1 open -->
                <div class="modal fade" tabindex="-1" id="forgetPasswordModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-12">
                                        <label class="form-label"> Enter Your Valid Email Address</label>
                                        <input class="form-control" type="text" class="form-control" id="forgetEmail" />
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="sendemail();">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- //model end -->


            </div>
        </div>



        <script src="assets/js/login_js.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </body>

    </html>
<?php
    }
?>