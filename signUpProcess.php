<?php

require "assets/connection/connection.php";

$reg_no = $_POST['reg_no'];
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$password = $_POST['password'];
$cm_password = $_POST['cm_password'];
$address = $_POST['address'];
$faculty = $_POST['faculty'];
$department = $_POST['department'];
$level = $_POST['level'];


if (empty($reg_no)) {
    echo "Please Enter Your User ID.....";
} else if (empty($name)) {
    echo "Please Enter Your  Name.....";
} else if (empty($email)) {
    echo "Please Enter Your Email.....";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.....";
} elseif (strlen($email) > 100) {
    echo "Invalid email address.....";
} else if (empty($contact)) {
    echo "Please Enter Your Mobile Number.....";
} else if (strlen($contact) != 10) {
    echo "mobile number must be at least 10 characters.....";
} else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $contact) == 0) {
    echo "Invalid Mobile Number.....";
} else if (empty($password)) {
    echo "Please Enter Your Password .....";
} else if (strlen($password) <= 5 || strlen($password) >= 20) {
    echo "password must be less than 20 characters AND at least 6 characters .....";
} else if ($password != $cm_password) {
    echo "Please Check Conform Password .....";
} else if (empty($address)) {
    echo "Please enter your address...";
} else if ($faculty == "Select faculty") {
    echo "Please Select  faculty  .....";
} else if ($department == "Select department") {
    echo "Please Select department .....";
} else if ($level == "Select level") {
    echo "Please Select level .....";
} else {


    // echo $reg_no . " " . $name. " " .$email. " " .$contact. " " .$password. " " .$cm_password. " " .$address. " " .$faculty. " " .$department. " " .$level;


    $r = DATABASE::search("SELECT * FROM `student` WHERE `reg_no` = '" . $reg_no . "' OR `email`='" . $email . "' OR `contact`='" . $contact . "'");
    if ($r->num_rows > 0) {
        echo "User with the same details already exists  Please Contact Our Customer Help  .... ";
    } else {

        // echo ($reg_no." ".$name." ".$email." ".$contact." ".$password." ".$level." ".$faculty." ".$department);

        $rs3 = DATABASE::search("SELECT * FROM `faculty_has_department` WHERE `faculty_id` = '" . $faculty . "' AND `department_id`='" . $department . "' ");
        if ($rs3->num_rows > 0) {
            
            $data =  $rs3->fetch_assoc();

            DATABASE::iud("INSERT INTO `student`(`reg_no`,`name`,`email`,`contact`,`password`,`address`,`level_id`,`faculty_has_department_id`) 
            VALUES('" . $reg_no . "','" . $name . "','" . $email . "','" . $contact . "','" . $password . "','".$address."','" . $level . "','" . $data['id'] . "')");

            echo 'success';
        } else {
            echo "Check Your department OR faculty ..";
        }
    }
}
