<?php
session_start();
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
        <title>Admin Home</title>
    </head>

    <body class="container-fluid" onload="">

        <div class="row mt-2 align-items-center align-content-center  justify-content-center">
            <div class="col-12 mb-2">
                <div class="row">
                    <div class="col-1">

                    </div>
                    <div class="col-10 align-items-center align-content-center  justify-content-center">
                        <div class="row">
                            <img src="assets/img/logo.png" class="image col-2 align-items-center align-content-center  justify-content-center" alt="" />
                <p class=" text-center col-8 fw-bold fs-3 page_name">Student Attendance</p>
                        </div>
                    </div>
                    <div class="col-1">
                        <button class="btn div_bg_color text-light" onclick="logout();">Logout</button>
                    </div>
                </div>
            </div>
            <div class="col-11  div_bg_color rounded-pill">

                <div class="row">
                    <div class="col-12 mb-2">
                        <div class="row text-center ms-5 me-5">

                            <div class="mb-2 mt-3 text-light col-6">
                                <label for="student_id" class="form-label">Admin ID </label>
                                <p class="text-center text-primary bg-light rounded-pill" id="admin_id"><?php echo $data["user_id"]; ?></p>
                            </div>
                            <div class=" mb-2 mt-3 text-light col-6">
                                <label for="student_name" class="form-label">Admin Name </label>
                                <p class="text-center text-primary bg-light rounded-pill" id="admin_name"><?php echo $data["name"]; ?></p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <div class="col-11 mt-3  div_bg_color rounded">

                <div class="row">
                    <div class="col-12 mb-2">
                        <div class="row text-center ms-5 me-5">

                            <div class="mb-2 mt-3 text-light col-3">
                                <a href="admin_student_registration.php">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/icon/Students-pana.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Student Registration</p>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="mb-2 mt-3 text-light col-3">
                            <a href="admin_teacher_registration.php">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/icon/Teacher student-rafiki.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Staff Registration</p>
                                    </div>
                                </div>
                            </a>
                            </div>

                            <div class="mb-2 mt-3 text-light col-3">
                            <a href="admin_Faculty_registration.php">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/icon/college campus-cuate.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Faculty Registration</p>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="mb-2 mt-3 text-light col-3">
                            <a href="admin_depatment_registration.php">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/icon/college class-bro.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Department Registration</p>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="mb-2 mt-3 text-light col-3">
                            <a href="admin_course_registration.php">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/icon/Course app-pana.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Course Registration</p>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="mb-2 mt-3 text-light col-3">
                            <a href="admin_subject_registration.php">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/icon/Marriage counseling-pana.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Subject Registration</p>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="mb-2 mt-3 text-light col-3">
                            <a href="admin_class_shedule.php">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/icon/Classroom-amico.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Class Schedule</p>
                                    </div>
                                </div>
                                </a>
                            </div>

                            <div class="mb-2 mt-3 text-light col-3">
                            <a href="admin_attendance.php">
                                <div class="card" style="width: 18rem;">
                                    <img src="assets/icon/Confirmed attendance-bro.png" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <p class="card-text">Student Attendance </p>
                                    </div>
                                </div>
                                </a>
                            </div>

                            

                        </div>
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