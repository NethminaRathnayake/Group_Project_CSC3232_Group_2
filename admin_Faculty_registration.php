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

    <body class="container-fluid" onload="loadFaculty();">

        <div class="row mt-2 ">
            <div class="col-12 ">
                <div class="row align-items-center align-content-center text-center  justify-content-center">

                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Faculty Registration</li>
                        </ol>
                    </nav>

                    <img src="assets/img/logo.png" class="image col-3" alt="" />

                    <h2 class="title">Faculty Registration </h2>

                    <div class="col-11 rounded-5 div_bg_color">
                        <div class="row">
                            <div class=" col-5  mt-2  mb-4 ">
                                <i class="bi bi-list-ol text-light"></i>
                                <input class="form-control text-center" type="text" placeholder="Faculty ID" id="f_id" oninput="loadFaculty();" />
                            </div>

                            <div class="  col-5 mt-2 ">
                                <i class="bi bi-list-ol text-light"></i>
                                <input class="form-control text-center" type="text" placeholder="Faculty Name" id="f_name" />
                            </div>

                            <div class="col-2 mt-2">
                                <i class="bi bi-subtract text-light"></i>
                                <button type="submit" class="btn btn-primary solid col-12  mb-3 " onclick="adminFacultyRegistration();">Register </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-10 offset-1">


                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col ">#</th>
                                    <th scope="col">Faculty ID</th>
                                    <th scope="col">Faculty NAME</th>

                                </tr>
                            </thead>
                            <tbody id="View_faculty">

                            </tbody>
                        </table>

                    </div>
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