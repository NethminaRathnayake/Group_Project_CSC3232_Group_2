<?php
require "assets/connection/connection.php";

$course = $_POST["course"];
$level = $_POST["level"];
$subject = $_POST["subject"];
$date = $_POST["date"];
$timeFrom = $_POST["timeFrom"];
$timeTo = $_POST["timeTo"];
$hours = $_POST["hours"];


if (empty($course)) {
    echo "Please select a course...";
} elseif (empty($level)) {
    echo "Please select the level";
} elseif (empty($subject)) {
    echo "Please select the Subject";
} elseif (empty($date)) {
    echo "Please enter date";
} elseif (empty($timeFrom)) {
    echo "Please enter start time";
} elseif (empty($timeTo)) {
    echo "Please end time";
} elseif (empty($hours)) {
    echo "Please select duration";
} else {
    $rs = DATABASE::search("SELECT `cource_has_subject`.`id` FROM `cource_has_subject` INNER JOIN `cource` 
ON `cource_has_subject`.`cource_id` = `cource`.`id` INNER JOIN `level`
ON `cource_has_subject`.`level_id` = `level`.`id` INNER JOIN `subject` ON
`subject`.`id` = `cource_has_subject`.subject_id  
WHERE `cource`.`id` = '".$course."' AND `level`.`id` = '".$level."' AND `subject`.`id` = '".$subject."' ");

    $num = $rs->num_rows;
    // echo($num);

    if ($num > 0) {
        $d = $rs->fetch_assoc();
        // echo($d["id"]);

        DATABASE::iud(" INSERT INTO `class_shedule` (`date`,`time_to`,`time_from`,`cource_has_subject_id`,`hours`) 
        VALUES ('" . $date . "' , '" . $timeTo . "' , '" . $timeFrom . "' , '" . $d["id"] . "' , '" . $hours . "' ) ");

        echo "Success";
    } else {
        echo ("No matching courses and levels");
    }
}
