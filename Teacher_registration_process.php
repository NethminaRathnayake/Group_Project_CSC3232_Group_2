<?php

require "assets/connection/connection.php";

$t_id = $_POST['t_id'];
$t_name = $_POST['t_name'];
$t_password = $_POST['t_password'];
$t_cm_password = $_POST['t_cm_password'];


if(empty($t_id)){
    echo "Please Enter Your User ID.....";
}
else if(empty($t_name)){
    echo "Please Enter Your  Name.....";
}
else if(empty($t_password)){
    echo "Please Enter Your t_password .....";
}
else if (strlen($t_password)<=5||strlen($t_password)>=20){
    echo "t_password must be less than 20 characters AND at least 6 characters .....";
}
else if($t_password != $t_cm_password){
    echo "Please Check Conform t_password ....";
}else{

   
    
    $r = DATABASE::search("SELECT  * FROM `teacher` WHERE `user_id` = '".$t_id."' ;");
if($r->num_rows>0){
    echo "User with the same details already exists  Please Contact Our Customer Help  .... " ;


}else{


  DATABASE::iud("INSERT INTO `teacher`(`user_id`,`password`,`name`) VALUES('".$t_id."','".$t_password."','".$t_name."' )");

  echo'success';

  
}
}
?>