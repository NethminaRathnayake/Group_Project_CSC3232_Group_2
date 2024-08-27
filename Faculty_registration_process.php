<?php

require "assets/connection/connection.php";

$f_id = $_POST['f_id'];
$f_name = $_POST['f_name'];


if(empty($f_id)){
    echo "Please Enter Your Faculty ID.....";
}
else if(empty($f_name)){
    echo "Please Enter Faculty  Name.....";
}
else{


 
    $r = DATABASE::search("SELECT  * FROM `faculty` WHERE `id` = '".$f_id."' ORDER BY `id` ASC ;");
if($r->num_rows>0){
    echo "User with the same details already exists  Please Contact Our Customer Help  .... " ;


}else{


  DATABASE::iud("INSERT INTO `faculty`(`id`,`name`) VALUES('".$f_id."','".$f_name."' )");

  echo'success';

  
}

}


?>