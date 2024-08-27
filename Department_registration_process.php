<?php

require "assets/connection/connection.php";

$D_faculty = $_POST['D_faculty'];
$D_id = $_POST['D_id'];
$D_name = $_POST['D_name'];


if($D_faculty == "Select faculty"){
    echo "Please Select Faculty .....";
}
else if(empty($D_id)){
    echo "Please Enter Your Department ID.....";
}
else if(empty($D_name)){
    echo "Please Enter Department  Name.....";
}
else{


 
    $r = DATABASE::search("SELECT  * FROM `department` WHERE `id` = '".$D_id."' OR `name` = '".$D_name."' ;");
if($r->num_rows>0){
    echo "User with the same details already exists  Please Contact Our Customer Help  .... " ;


}else{




  DATABASE::iud("INSERT INTO `department`(`id`,`name`) VALUES('".$D_id."','".$D_name."' )");


  $r2 = DATABASE::search("SELECT  * FROM `department` WHERE `id` = '".$D_id."' AND `name` = '".$D_name."' ;");
  $department_id = $r2->fetch_assoc();

  $r3 = DATABASE::search("SELECT  * FROM `faculty_has_department` WHERE `faculty_id` = '".$D_faculty."' AND `department_id` = '".$department_id['id']."' ;");
  if($r3->num_rows>0){
   
  }else{
    DATABASE::iud("INSERT INTO `faculty_has_department`(`faculty_id`,`department_id`) VALUES('".$D_faculty."','".$department_id['id']."' )");

  }

  echo'success';

  
}

}


?>