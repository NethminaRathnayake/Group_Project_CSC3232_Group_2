<?php
session_start();
require "assets/connection/connection.php";
if (isset($_SESSION["admin"])) {

    $data = $_SESSION["admin"];
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
        <title>Student Registartion</title>
    </head>

    <body class="container-fluid">

        <div class="row mt-2 ">
            <div class="col-12 mb-2">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb ">
    <li class="breadcrumb-item ms-2"><a href="admin.php">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Student Registration</li>
  </ol>
</nav>
                <div class="row align-items-center align-content-center  justify-content-center">

             
                <form action="#">
               
                <img src="assets/img/logo.png" class="image col-5" alt="" />

                    <h2 class="title">Student Registration </h2>

                    <div class="row">
                        <div class="col-10 offset-1">
                            <div class="row">

                                <div class=" col-6 mt-3  ">
                                <i class="bi bi-list-ol"></i>
                                    <input  class="form-control"  type="text" placeholder="User ID" id="reg_no" />
                                </div>

                                <div class=" col-6 mt-3 ">
                                <i class="bi bi-file-earmark-text-fill"></i>
                                    <input  class="form-control" type="text" placeholder="Name" id="name" />
                                </div>

                                <div class=" col-6 mt-3 ">
                                    <i class="bi bi-envelope-at-fill"></i>
                                    <input  class="form-control" type="text" placeholder="Email" id="email" />
                                </div>

                                <div class=" col-6 mt-3 ">
                                    <i class="bi bi-phone-fill"></i>
                                    <input  class="form-control" type="text" placeholder="Contact No:" id="contact" />
                                </div>

                                <div class=" col-6 mt-3 ">
                                    <i class="bi bi-lock-fill"></i>
                                    <input  class="form-control" type="password" placeholder="Password " id="password" />
                                </div>

                                <div class=" col-6 mt-3 ">
                                <i class="bi bi-file-lock2"></i>
                                    <input  class="form-control" type="password" placeholder="Confirm Password" id="cm_password" />
                                </div>

                                <div class=" col-6 mt-3 ">
                                    <i class="bi bi-geo-alt-fill"></i>
                                    <input  class="form-control" type="text" placeholder="Address " id="address" />
                                </div>

                                <div class=" col-6 mt-3  ">
                                <i class="bi bi-house-gear-fill"></i>
                                <select class=" col-6 form-select  " id="faculty">
                                    <option class="fw-lighter">Select faculty</option>
                                    <?php
                                    $r = Database::search("SELECT * FROM `faculty`");
                                    $n = $r->num_rows;
                                    
                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $r->fetch_assoc();
                                    ?>
                                        <option  value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </div>

                                <div class=" col-6 mt-3 mb-3">
                                <i class="bi bi-layout-sidebar-inset"></i>
                                <select class=" col-6 form-select  " id="department">
                                    <option class="fw-lighter" >Select department</option>
                                    <?php
                                    $r = Database::search("SELECT * FROM `department`");
                                    $n = $r->num_rows;
                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $r->fetch_assoc();
                                    ?>
                                        <option  value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </div>

                                <div class=" col-6 mt-3 mb-3 ">
                                <i class="bi bi-water"></i>
                                <select class=" col-6 form-select  " id="level">
                                    <option class="fw-lighter">Select level</option>
                                    <?php
                                    $r = Database::search("SELECT * FROM `level`");
                                    $n = $r->num_rows;
                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $r->fetch_assoc();
                                    ?>
                                        <option  value="<?php echo $d['id']; ?>"><?php echo $d['level']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                                </div>

                            </div>
                        </div>
                    </div>




                    <button type="submit" class="btn2 solid mt-3 col-3" onclick="adminStudentRegistration();">Register</button>
                    

                </form>

                </div>
            </div>
        </div>
        <script src="assets/js/login_js.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </body>

    </html>

<?php
} else {
    ?>
        <script>
            window.location = "index.php";
        </script>
    <?php
    }
    ?>