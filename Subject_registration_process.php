<?php

require "assets/connection/connection.php";

$S_faculty = $_POST['S_faculty'];
$S_Department = $_POST['S_Department'];
$S_Course = $_POST['S_Course'];
$S_Level = $_POST['S_Level'];
$S_Id = $_POST['S_Id'];
$S_Name = $_POST['S_Name'];
$S_Hours = $_POST['S_Hours'];
$S_Credit = $_POST['S_Credit'];



if($S_faculty == "Select faculty"){
    echo "Please Select Faculty .....";
}
else if($S_Department == "Select Department"){
    echo "Please Select Department.....";
}
else if($S_Course == "Select Course"){
    echo "Please Select Course .....";
}
else if($S_Level == "Select Level"){
    echo "Please Select Level .....";
}
else if(empty($S_Id)){
    echo "Please Enter Your Subject ID.....";
}
else if(empty($S_Name)){
    echo "Please Enter Subject  Name.....";
}
else if(empty($S_Hours)){
    echo "Please Enter Subject Hours.....";
}
else if(empty($S_Credit)){
    echo "Please Enter Subject Credits ....";
}
else{

    $check = DATABASE::search(" SELECT * FROM `subject` WHERE `id` = '".$S_Id."' OR  `name`  = '".$S_Name."' ");
    if($check->num_rows < 1){


 
    $r = DATABASE::search("SELECT `faculty_has_department`.`id` AS `id` FROM `faculty_has_department` WHERE `faculty_has_department`.`faculty_id` = '".$S_faculty."' AND `faculty_has_department`.`department_id` = '".$S_Department."'  ;");
if($r->num_rows>0){
   
    $faculty_has_department_id = $r->fetch_assoc();

  $r2 = DATABASE::search("SELECT * FROM `subject` WHERE `id` = '".$S_Id."' AND  `name`  = '".$S_Name."'  ;");
  if($r2->num_rows>0){

    echo "This Subject Already Exixts";
  }else{

    DATABASE::iud("INSERT INTO `subject`(`id`,`name`,`subject_hours`,`subject_credit`) VALUES('".$S_Id."','".$S_Name."' , '".$S_Hours."','".$S_Credit."' )");
  
 
  $r3 = DATABASE::search("SELECT  `subject`.`id` AS `sub_id` FROM `subject` WHERE `id` = '".$S_Id."' AND `name` = '".$S_Name."' AND `subject_hours` = '".$S_Hours."' AND `subject_credit` = '".$S_Credit."' ;");
  $Subject_table_data = $r3->fetch_assoc();


  $r4 = DATABASE::search("SELECT  * FROM `cource_has_subject` WHERE `subject_id` = '".$Subject_table_data['sub_id']."' AND `level_id` = '".$S_Level."' AND `faculty_has_department_id` = '".$faculty_has_department_id['id']."' AND `cource_id` = '".$S_Course."' ;");
  if($r4->num_rows>0){

  }else{
    DATABASE::iud("INSERT INTO `cource_has_subject`(`subject_id`,`level_id`,`faculty_has_department_id`,`cource_id`) VALUES('".$Subject_table_data['sub_id']."','".$S_Level."','".$faculty_has_department_id['id']."','".$S_Course."' )");

  }

  

  echo'success';



}
  

}else {
    echo "Faculty And Department Not matching ... Please Select Valid Details ...!!!";
}


}else{
    echo "This Subject Already Exixts" ;
}

}


?>