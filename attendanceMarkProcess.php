<?php
require "assets/connection/connection.php";

$st_id = $_POST["sid"];
$su = $_POST["su"];
$cu = $_POST["cu"];
$lv = $_POST["lv"];
$ft = $_POST["ft"];
$dp = $_POST["dp"];


if ($ft == 0) {
    echo "Please select faculty";
} else if ($dp == 0) {
    echo "Please select Department";
} else if ($cu == 0) {
    echo "Please select Cource";
} else if ($su == 0) {
    echo "Please select Subject";
} else if ($lv == 0) {
    echo "Please select Student Level";
} else {

    $selectrs = DATABASE::search("SELECT `student`.`reg_no`,`subject`.`id`,`cource`.`id`,`class_shedule`.`id` AS `class_id`,`student`.`name` 
AS `st_name`,`student`.`email`,`faculty`.`name` AS `ft_name`,`department`.`name` AS `dp_name`,`cource`.`name` 
AS `co_name`,`subject`.`name` AS `sb_name`,`level`.`level` FROM `student` INNER JOIN `faculty_has_department` 
ON `student`.`faculty_has_department_id`=`faculty_has_department`.`id` INNER JOIN `department` 
ON `faculty_has_department`.`department_id`=`department`.`id` INNER JOIN `faculty` 
ON `faculty_has_department`.`faculty_id`=`faculty`.`id` INNER JOIN `cource_has_subject` 
ON `cource_has_subject`.`faculty_has_department_id`=`faculty_has_department`.`id` INNER JOIN `subject` 
ON `cource_has_subject`.`subject_id`=`subject`.`id` INNER JOIN `cource` 
ON `cource_has_subject`.`cource_id`=`cource`.`id` INNER JOIN `class_shedule` 
ON `class_shedule`.`cource_has_subject_id`=`cource_has_subject`.`id` INNER JOIN `level` 
ON `cource_has_subject`.`level_id`=`level`.id WHERE `subject`.`id`= '" . $su . "' AND `cource`.`id`='" . $cu . "' 
AND `student`.`reg_no`='" . $st_id . "' 
AND `department`.`id`='" . $dp . "' AND `faculty`.`id`='" . $ft . "' ");

    // echo $selectrs->num_rows;

    if (($selectrs->num_rows) > 0) {

        $sr = $selectrs->fetch_assoc();

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d");

        $atrs = DATABASE::search("SELECT * FROM `atattendance` where `student_reg_no`='" . $st_id . "' AND `class_shedule_id`='" . $sr["class_id"] . "' ");
        if (($atrs->num_rows) > 0) {
            $at = $atrs->fetch_assoc();
            if ($at["mark"] == 0) {
                DATABASE::iud("INSERT INTO `attendance` (`date`,`mark`,`student_reg_no`,`class_shedule_id`) 
                VALUES('" . $date . "','1','" . $st_id . "','" . $sr["class_id"] . "')");
                echo "ok";

            } else {
                echo "Already Marked this record";
            }

        }

    }
}

?>