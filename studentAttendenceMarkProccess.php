<?php
session_start();
require "assets/connection/connection.php";

$attenId = $_POST["attnId"];
$get_classSheduleId = $_POST["get_classSheduleId"];
echo($attenId);
echo($get_classSheduleId);

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d");

DATABASE::iud("INSERT INTO `attendance` (`date`,`mark`,`student_reg_no`,`class_shedule_id`) VALUES ('".$date."' , '1', '".$attenId."','".$get_classSheduleId."')  ");


?>