<?php

require "assets/connection/connection.php";

$C_id = $_POST['C_id'];
$C_name = $_POST['C_name'];
$C_credit = $_POST['C_credit'];


if(empty($C_id)){
    echo "Please Enter Course ID.....";
}
else if(empty($C_name)){
    echo "Please Enter Course  Name.....";
}
else if(empty($C_credit)){
    echo "Please Enter Course Credit .....";

}else{

   
    
    $r = DATABASE::search("SELECT  * FROM `cource` WHERE `cid` = '".$C_id."' AND `name` = '".$C_name."' AND `credit` = '".$C_credit."'  ;");
if($r->num_rows>0){
    echo "User with the same details already exists  Please Contact Our Customer Help  .... " ;


}else{


  DATABASE::iud("INSERT INTO `cource`(`cid`,`name`,`credit`) VALUES('".$C_id."','".$C_name."','".$C_credit."' )");

  echo'success';

  
}
}
?>