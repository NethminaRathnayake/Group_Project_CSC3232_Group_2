<?php

require "assets/connection/connection.php";

$D_faculty = $_POST['D_faculty'];
$D_id = $_POST['D_id'];

$search_f_id = " ";



if(empty($D_id)  && $D_faculty == "Select faculty" ){  
    $search_f_id = "";

}elseif(!empty($D_id)  && $D_faculty == "Select faculty"){
  
    $search_f_id = " WHERE `department`.`id` LIKE '%".$D_id."%' ";

}elseif(empty($D_id)  && $D_faculty != "Select faculty"){

    $search_f_id = " WHERE `faculty`.`id` = '".$D_faculty."' ";
}else{
    $search_f_id = " WHERE `faculty`.`id` = '".$D_faculty."'  AND `department`.`id`  LIKE '%".$D_id."%' ";
}

$rs = DATABASE::search("SELECT `faculty`.`name` AS `faculty`,`department`.`id` ,`department`.`name` FROM  `faculty_has_department` INNER JOIN `department` ON `faculty_has_department`.`department_id` = `department`.`id` INNER JOIN `faculty` ON `faculty_has_department`.`faculty_id` = `faculty`.`id` ".$search_f_id." ");
$n = $rs->num_rows;
    for($i = 0 ; $i < $n ; $i ++){
        $d = $rs->fetch_assoc();
        ?>
         <tr>
      <th><?php echo $i+1 ?></th>
      <td><?php echo $d['faculty'] ?></td>
      <td><?php echo $d['id'] ?></td>
      <td><?php echo $d['name'] ?></td>
    
    </tr>
        <?php
       
    }




?>