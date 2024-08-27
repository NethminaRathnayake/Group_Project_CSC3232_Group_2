<?php
session_start();
$data = "";
require "assets/connection/connection.php";
if (isset($_SESSION["student"])) {

    $data = $_SESSION["student"];
}


$student_id = $_POST["student_id"];
$cources_name = $_POST["cources_name"];
$date_from = $_POST["date_from"];
$date_to = $_POST["date_to"];

$assign_from_date = " ";
$assign_to_date = " ";

// echo($student_id);
// echo($cources_name);
// echo($date_from);
// echo($date_to);


$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d");
$query = "";
if(!empty($date_from ) && !empty($date_to)){
}else if (!empty($date_from) && empty($date_to) ) {  
   
$query = "";
}else if (empty($date_from) && !empty($date_to) ) { 
    $assign_to_date = $date;
} else {
    $assign_to_date = $date_to;
    $query = "";
}


?>

<div class="accordion accordion-flush" id="accordionFlushExample">

    <?php
    $rs1 = DATABASE::search("SELECT `level`.`level`  AS  `level` , `level`.`id`  AS `level_id` FROM `level` INNER JOIN `student` ON `student`.`level_id` = `level`.`id` WHERE `student`.`reg_no` = '" . $student_id . "'");
    
    $ds1 = $rs1->fetch_assoc();
    ?>
    <p class="col-12 text-center fw-bold bg-warning "> <?php echo $ds1["level"] ?></p>

    <?php

    $rs2 = DATABASE::search(" SELECT `subject`.`name`,`subject`.`id` AS `subject_id` FROM `student` inner JOIN `faculty_has_department` ON `student`.`faculty_has_department_id` =
`faculty_has_department`.`id` INNER JOIN
`cource_has_subject` ON `faculty_has_department`.`id` = `cource_has_subject`.`faculty_has_department_id`
INNER JOIN subject ON `cource_has_subject`.`subject_id` = `subject`.`id`  WHERE `student`.`reg_no`='" . $student_id . "'
AND `cource_has_subject`.`faculty_has_department_id` ='" . $data["faculty_has_department_id"] . "'
GROUP BY subject.`id`
   ");

    $num = $rs2->num_rows;

    for ($i = 0; $i < $num; $i++) {
        $d = $rs2->fetch_assoc();

    ?>

        <p>
            <button class="btn btn-primary col-12" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?php echo $i; ?>" aria-expanded="false" aria-controls="collapseExample<?php echo $i; ?>">
                <?php echo $d["name"]; ?>
            </button>
        </p>
        <div class="collapse" id="collapseExample<?php echo $i; ?>">
            <div class="card card-body">
                <div class="progress">
                    <?php
                    $rs3 = DATABASE::search("  SELECT  subject.subject_hours AS subject_hours,SUM( class_shedule.hours)  AS class_schedule_hours  
FROM attendance  
INNER JOIN class_shedule ON  attendance.class_shedule_id = class_shedule.id
INNER JOIN cource_has_subject ON class_shedule.cource_has_subject_id 
INNER JOIN subject ON cource_has_subject.subject_id = subject.id  
INNER JOIN `level` ON cource_has_subject.level_id = `level`.id 
WHERE subject.id = '" . $d["subject_id"] . "'  
AND `level`.`level` = '" . $ds1["level"] . "'  AND 
attendance.student_reg_no = '" . $student_id . "'   ");

                    $d3 = $rs3->fetch_assoc();
                    $fullHours = $d3["subject_hours"] / $d3["subject_hours"] * 100;
                    $lecture_hours = $d3["class_schedule_hours"] / $d3["subject_hours"] * 100;
                    $attendenceHours = ($d3["subject_hours"] - $d3["class_schedule_hours"]) / $d3["subject_hours"] * 100;

                    ?>

                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: <?php echo $lecture_hours; ?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width:<?php echo $attendenceHours; ?>%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar  shadow p-3 mb-5 bg-body rounded" style="width: <?php echo $fullHours ?>%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>





                </div>
                <p class="mt-2">Full Hours : <?php echo $d3["subject_hours"]; ?></p>
                <p>Attendence Mark Hours : <?php echo $d3["class_schedule_hours"]; ?></p>
                <p>Lecture Hours : <?php echo $d3["subject_hours"] - $d3["class_schedule_hours"]; ?></p>
            </div>
        </div>

    <?php

    }
    ?>





</div>

<?php


?>