<?php
session_start();
if (isset($_SESSION["admin"])) {

    $data = $_SESSION["admin"];

    require "assets/connection/connection.php";
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
        <title>Admin Student Attendance</title>
    </head>

    <body class="container-fluid" onload="loadStudents();">

        <div class="row mt-2">
            <div class="col-12">
                <div class="row align-items-center align-content-center text-center justify-content-center">

                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Student Attendance</li>
                        </ol>
                    </nav>

                    <img src="assets/img/logo.png" class="image col-3" alt="" />

                    <h2 class="title mt-2">Student Attendance </h2>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <table class="table table-striped text-center">
                        <thead>
                            <caption></caption>
                            <h3 class="text-center mt-4">Class Schedule</h3>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Date</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Subject</th>
                                <th scope="col">Level</th>
                                <th scope="col">Duration (Hours)</th>
                            </tr>
                        </thead>
                        <tbody id="classSchedule">
                            <?php
                            $rs = DATABASE::search("SELECT `class_shedule`.`id`, `class_shedule`.`date`, `class_shedule`.`time_to`, `class_shedule`.`time_from`, `subject`.`name`, `level`.`level`, `class_shedule`.`hours` FROM `class_shedule` INNER JOIN `cource_has_subject` ON `class_shedule`.`cource_has_subject_id` = `cource_has_subject`.`id` INNER JOIN `level` ON `cource_has_subject`.`level_id` = `level`.`id` INNER JOIN `subject` ON `cource_has_subject`.`subject_id` = `subject`.`id` ORDER BY `class_shedule`.`date` DESC");
                            $num = $rs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $d = $rs->fetch_assoc();
                            ?>
                                <tr onclick="getClassSheduleId(<?php echo $d['id'] ?>);">
                                    <td><?php echo $d["id"] ?></td>
                                    <td><?php echo $d["date"] ?></td>
                                    <td><?php echo $d["time_from"] ?></td>
                                    <td><?php echo $d["time_to"] ?></td>
                                    <td><?php echo $d["name"] ?></td>
                                    <td><?php echo $d["level"] ?></td>
                                    <td><?php echo $d["hours"] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-12 col-md-6">
                    <table class="table table-striped text-center">
                        <thead>
                            <caption></caption>
                            <h3 class="text-center mt-3">Student Details</h3>
                            <form class="d-flex mb-5" role="search">
                                <input class="form-control me-2 mb-3" type="search" placeholder="Search by Student Name" aria-label="Search" oninput="loadStudents();" id="stuShedule">

                            </form>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Student Id</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Attendance</th>
                            </tr>
                        </thead>
                        <tbody id="stScheduId">


                        </tbody>
                    </table>
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