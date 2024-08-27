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
        <title>Subject Registartion</title>
    </head>

    <body class="container-fluid" onload="loadSubjects();">

        <div class="row mt-2 ">
            <div class="col-12 ">
                <div class="row align-items-center align-content-center text-center  justify-content-center">

                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Subject Registration</li>
                        </ol>
                    </nav>

                    <img src="assets/img/logo.png" class="image col-3" alt="" />

                    <h2 class="title">Subject Registration </h2>

                    <div class="col-11 rounded-5 div_bg_color">
                        <div class="row">
                        <div class=" col-3  mt-2  mb-3 ">
                            <i class="bi bi-house-gear-fill text-light"></i>
                                <select class=" col-6 form-select  " id="S_faculty" onchange="loadSubjects();">
                                    <option class="fw-lighter">Select faculty</option>
                                    <?php
                                    $r = Database::search("SELECT `faculty`.`id` , `faculty`.`name` FROM `faculty_has_department` INNER JOIN `faculty` ON `faculty_has_department`.`faculty_id` = `faculty`.`id` GROUP BY `faculty`.`id` ORDER BY `faculty`.`name` ASC ;");
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
                        <div class=" col-3  mt-2  mb-3 ">
                        <i class="bi bi-border-style text-light"></i>
                                <select class=" col-6 form-select  " id="S_Department" onchange="loadSubjects();">
                                    <option class="fw-lighter">Select Department</option>
                                    <?php
                                    $r = Database::search("SELECT `department`.`id` , `department`.`name` FROM `faculty_has_department` INNER JOIN `department` ON `faculty_has_department`.`department_id` = `department`.`id` GROUP BY `department`.`id` ORDER BY `department`.`name` ASC ;");
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
                            <div class=" col-3  mt-2  mb-3 ">
                            <i class="bi bi-building text-light"></i>
                                <select class=" col-6 form-select  " id="S_Course" onchange="loadSubjects();">
                                    <option class="fw-lighter">Select Course</option>
                                    <?php
                                    $r = Database::search("SELECT * FROM `cource` ORDER BY `name` ASC ;");
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
                        <div class=" col-3  mt-2  mb-3 ">
                        <i class="bi bi-calendar-range text-light"></i>
                                <select class=" col-6 form-select  " id="S_Level" onchange="loadSubjects();">
                                    <option class="fw-lighter">Select Level</option>
                                    <?php
                                    $r = Database::search("SELECT * FROM `level` ORDER BY `level` ASC ;");
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
                            <div class=" col-3  mt-2  mb-3 ">
                                <i class="bi bi-list-ol text-light"></i>
                                <input class="form-control text-center" type="text" placeholder="Subject ID" id="S_Id" oninput="loadSubjects();" />
                            </div>

                            <div class="  col-3 mt-2 ">
                            <i class="bi bi-align-bottom text-light"></i>
                                <input class="form-control text-center" type="text" placeholder="Subject Name" id="S_Name" />
                            </div>

                            <div class="  col-3 mt-2 ">
                            <i class="bi bi-backpack-fill text-light"></i>
                                <input class="form-control text-center" type="text" placeholder="Subject Hours" id="S_Hours" />
                            </div>

                            <div class="  col-3 mt-2 ">
                            <i class="bi bi-body-text text-light"></i>
                                <input class="form-control text-center" type="text" placeholder="Subject Credit" id="S_Credit" />
                            </div>

                    
                        </div>
                        <button type="submit" class="btn btn-primary solid col-3  mb-3 " onclick="adminSubjectRegistration();">Register </button>
                    </div>
                    

                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-10 offset-1">

                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col ">Subject ID</th>
                                    <th scope="col ">Subject Name</th>
                                    <th scope="col ">subject Hours</th>
                                    <th scope="col ">subject Credit</th>
                                    <th scope="col ">Faculty</th>
                                    <th scope="col">Department </th>
                                    <th scope="col">Course </th>
                                    <th scope="col ">Level</th>
                                </tr>
                            </thead>
                            <tbody id="View_subjects">

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