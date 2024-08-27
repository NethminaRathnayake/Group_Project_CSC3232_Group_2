<?php
session_start();
$data = "";
require "assets/connection/connection.php";
if (isset($_SESSION["student"])) {

    $data = $_SESSION["student"];
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

    <body class="container-fluid" onload="tableload();">

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

                            <div class="mb-2 mt-3 text-light col-4">
                                <label for="student_id" class="form-label">Student ID </label>
                                <input type="text" class="form-control" value="<?php echo $data["reg_no"]; ?>" id="student_id" placeholder="Studen ID" disabled>
                            </div>
                            <div class=" mb-2 mt-3 text-light col-4">
                                <label for="student_name" class="form-label">Student Name </label>
                                <input type="text" class="form-control" value="<?php echo $data["name"]; ?>" id="student_name" placeholder="name" disabled>
                            </div>
                            <div class=" mb-2 mt-3 text-light col-4">
                                <label for="student_faculty" class="form-label">Department Name </label>
                                <?php
                                    $r = Database::search(" SELECT * FROM `faculty_has_department` INNER JOIN `department` ON `faculty_has_department`.`department_id` = `department`.`id` WHERE `faculty_has_department`.`id` ='".$data["faculty_has_department_id"]."' ");
                                    $n = $r->num_rows;
                                    if ($n >0) {
                                        $d = $r->fetch_assoc();
                                    ?>
                                         <input type="text" class="form-control" value="<?php echo $d["name"]; ?>" id="student_faculty" placeholder="Faculty" disabled>
                                    <?php
                                    }else{
                                        ?>
                                        <input type="text" class="form-control" value="" id="student_faculty" placeholder="Faculty" disabled>
                                        <?php
                                    }
                                    ?>
                               
                            </div>
                            <div class=" text-light col-4">
                                <label for="cource_name" class="form-label">Course Name </label>
                                <select class="form-select  mb-3" id="cource_name" aria-label=".form-select example">

                                    <?php
                                    $r = Database::search("SELECT `cource`.`name`,`cource`.`id` FROM `cource_has_subject` INNER JOIN `cource` ON `cource_has_subject`.`cource_id` = `cource`.`id` WHERE `faculty_has_department_id` = '".$data["faculty_has_department_id"]."' GROUP BY `cource`.`id` ");
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
                           
                            <div class="mb-3 mt- text-light col-4">
                                <label for="date_from" class="form-label">Date From </label>
                                <input class="coc-input form-control" type="date" id="date_from">
                            </div>
                            <div class="mb-3 mt- text-light col-4">
                                <label for="date_to" class="form-label">Date To </label>
                                <input class="coc-input form-control" type="date"  id="date_to">
                            </div>

                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 offset-4">
                                <button class="btn btn-primary col-12" onclick="tableload();">Search</button>
                                </div>
                            </div>
                        </div>
                           
                    </div>
                </div>


            </div>
            <div class="col-11  bg-light mt-2 " id="viewattendance">

  


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