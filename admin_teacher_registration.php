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
        <title>Staff Registartion</title>
    </head>

    <body class="container-fluid" onload="loadTeachers();">

        <div class="row mt-2 ">
            <div class="col-5 mb-2 position-fixed">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Staff Registration</li>
                    </ol>
                </nav>
                <div class="row align-items-center align-content-center  justify-content-center">


                    <form action="#">

                        <img src="assets/img/logo.png" class="image col-5" alt="" />

                        <h2 class="title">Staff Registration </h2>

                        <div class="row    ">
                            <div class="col-10 offset-1 div_bg_color rounded-4">
                                <div class="row">

                                    <div class=" col-10 offset-1 mt-5 ">
                                        <i class="bi bi-list-ol text-light"></i>
                                        <input class="form-control" type="text" placeholder="User ID" id="t_id" oninput="loadTeachers();" />
                                    </div>

                                    <div class="  col-10 offset-1 mt-5 ">
                                        <i class="fas fa-user text-light"></i>
                                        <input class="form-control" type="text" placeholder="Name" id="t_name" />
                                    </div>

                                    <div class="  col-10 offset-1 mt-5 ">
                                        <i class="bi bi-lock-fill text-light"></i>
                                        <input class="form-control" type="password" placeholder="Password " id="t_password" />
                                    </div>

                                    <div class="  col-10 offset-1 mt-5 mb-5">
                                        <i class="bi bi-file-lock2 text-light"></i>
                                        <input class="form-control" type="password" placeholder="Confirm Password" id="t_cm_password" />
                                    </div>


                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn2 solid mt-3 col-6" onclick="adminTeacherRegistration();">Register </button>

                    </form>




                </div>
            </div>

            <div class="col-7 div_bg_color offset-5">
                <div class="row align-items-center align-content-center  justify-content-center">

                    <div class="col-10 ">
                        <div class="row">
                            <div class="input-group col-5 mb-3 mt-3 position-fixed">
                                <span class="input-group-text" id="inputGroup-sizing-default">Search Staff </span>
                                <input type="text" class=" col-5 text-center" aria-label="Sizing example input" oninput="loadTeachers();" aria-describedby="inputGroup-sizing-default" placeholder="Search Staff Details " id="t_search">
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">

                        <table class="table table-striped mt-5 text-center">
                            <thead>
                                <tr class="">
                                    <th scope="col">#</th>
                                    <th scope="col">Teacher ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Password</th>
                                </tr>
                            </thead>
                            <tbody id="View_teachers">


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