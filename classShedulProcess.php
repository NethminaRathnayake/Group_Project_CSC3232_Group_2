<?php

$ft = $_POST["ft"];
$dp = $_POST["dp"];
$cu = $_POST["cu"];
$su = $_POST["su"];
$lv = $_POST["lv"];
$from = $_POST["from"];
$to = $_POST["to"];

$selectrs = DATABASE::search("SELECT `student`.`reg_no`,`subject`.`id`,`cource`.`id`,`class_shedule`.`id` AS `class_id`,`student`.`name` 
AS `st_name`,`student`.`email`,`faculty`.`name` AS `ft_name`,`department`.`name` AS `dp_name`,`cource`.`name` 
AS `co_name`,`subject`.`name` AS `sb_name`,`level`.`level`,`cource_has_subject_id`.`co_has_s_id` FROM `student` INNER JOIN `faculty_has_department` 
ON `student`.`faculty_has_department_id`=`faculty_has_department`.`id` INNER JOIN `department` 
ON `faculty_has_department`.`department_id`=`department`.`id` INNER JOIN `faculty` 
ON `faculty_has_department`.`faculty_id`=`faculty`.`id` INNER JOIN `cource_has_subject` 
ON `cource_has_subject`.`faculty_has_department_id`=`faculty_has_department`.`id` INNER JOIN `subject` 
ON `cource_has_subject`.`subject_id`=`subject`.`id` INNER JOIN `cource` 
ON `cource_has_subject`.`cource_id`=`cource`.`id` INNER JOIN `class_shedule` 
ON `class_shedule`.`cource_has_subject_id`=`cource_has_subject`.`id` INNER JOIN `level` 
ON `cource_has_subject`.`level_id`=`level`.id WHERE `subject`.`id`= '" . $sb . "' AND `cource`.`id`='" . $cu . "' 
AND `student`.`reg_no`='" . $st_id . "' 
AND `department`.`id`='" . $dp . "' AND `faculty`.`id`='" . $ft . "' ");


if (($selectrs->num_rows) > 0) {

    $sr = $selectrs->fetch_assoc();

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d");


    DATABASE::iud("INSERT INTO `class_shedule` (`date`,`time_to`,`time_from`,`cource_has_subject_id`,`hours`) 
VALUES('" . $date . "','" . $to . "','" . $from . "','" . $sr["co_has_s_id"] . "','10')");

    echo "ok";
}
