<?php

require "assets/connection/connection.php";

$S_faculty = $_POST['S_faculty'];
$S_Department = $_POST['S_Department'];
$S_Course = $_POST['S_Course'];
$S_Level = $_POST['S_Level'];
$S_Id = $_POST['S_Id'];



$WhereQuery = "";


if($S_faculty == "Select faculty" &&  $S_Department == "Select Department" && $S_Course == "Select Course" && $S_Level == "Select Level" &&  empty($S_Id)){

    $WhereQuery = "";

}else if ($S_faculty == "Select faculty" &&  $S_Department == "Select Department" && $S_Course == "Select Course" && $S_Level == "Select Level" &&  !empty($S_Id)){

    $WhereQuery = " WHERE `subject`.`id` LIKE '".$S_Id."%' ";

}else if ($S_faculty == "Select faculty" &&  $S_Department == "Select Department" && $S_Course == "Select Course" && $S_Level != "Select Level" &&  empty($S_Id)){

    $WhereQuery = " WHERE `level`.`id` = '".$S_Level."'  ";

}else if ($S_faculty == "Select faculty" &&  $S_Department == "Select Department" && $S_Course == "Select Course" && $S_Level != "Select Level" &&  !empty($S_Id)){

    $WhereQuery = " WHERE `subject`.`id` LIKE '".$S_Id."%' AND `level`.`id` = '".$S_Level."'  ";

}else if ($S_faculty == "Select faculty" &&  $S_Department == "Select Department" && $S_Course != "Select Course" && $S_Level == "Select Level" &&  empty($S_Id)){

    $WhereQuery = " WHERE `cource`.`id` = '".$S_Course."' ";

}else if ($S_faculty == "Select faculty" &&  $S_Department == "Select Department" && $S_Course != "Select Course" && $S_Level == "Select Level" &&  !empty($S_Id)){

    $WhereQuery = " WHERE `subject`.`id` LIKE '".$S_Id."%' AND `cource`.`id` = '".$S_Course."' ";

}else if ($S_faculty == "Select faculty" &&  $S_Department == "Select Department" && $S_Course != "Select Course" && $S_Level != "Select Level" &&  empty($S_Id)){

    $WhereQuery = "WHERE `level`.`id` = '".$S_Level."' AND `cource`.`id` = '".$S_Course."' ";

}else if ($S_faculty == "Select faculty" &&  $S_Department == "Select Department" && $S_Course != "Select Course" && $S_Level != "Select Level" &&  !empty($S_Id)){

    $WhereQuery = " WHERE `subject`.`id` LIKE '".$S_Id."%' AND `level`.`id` = '".$S_Level."'  AND `cource`.`id` = '".$S_Course."' ";

}else if ($S_faculty == "Select faculty" &&  $S_Department != "Select Department" && $S_Course == "Select Course" && $S_Level == "Select Level" &&  empty($S_Id)){

    $WhereQuery = "  WHERE `department`.`id` = '".$S_Department."' ";

}else if ($S_faculty == "Select faculty" &&  $S_Department != "Select Department" && $S_Course == "Select Course" && $S_Level == "Select Level" &&  !empty($S_Id)){

    $WhereQuery = " WHERE `subject`.`id` LIKE '".$S_Id."%' AND `department`.`id` = '".$S_Department."'  ";

}else if ($S_faculty == "Select faculty" &&  $S_Department != "Select Department" && $S_Course == "Select Course" && $S_Level != "Select Level" &&  empty($S_Id)){

    $WhereQuery = " WHERE `level`.`id` = '".$S_Level."'  AND `department`.`id` = '".$S_Department."' ";

}else if ($S_faculty == "Select faculty" &&  $S_Department != "Select Department" && $S_Course == "Select Course" && $S_Level != "Select Level" &&  !empty($S_Id)){

    $WhereQuery = " WHERE `subject`.`id` LIKE '".$S_Id."%'  AND `level`.`id` = '".$S_Level."'  AND `department`.`id` = '".$S_Department."'  ";

}else if ($S_faculty == "Select faculty" &&  $S_Department != "Select Department" && $S_Course != "Select Course" && $S_Level == "Select Level" &&  empty($S_Id)){

    $WhereQuery = "WHERE `cource`.`id` = '".$S_Course."'  AND `department`.`id` = '".$S_Department."' ";

}else if ($S_faculty == "Select faculty" &&  $S_Department != "Select Department" && $S_Course != "Select Course" && $S_Level == "Select Level" &&  !empty($S_Id)){

    $WhereQuery = " WHERE `subject`.`id` LIKE '".$S_Id."%'  AND `cource`.`id` = '".$S_Course."'  AND `department`.`id` = '".$S_Department."'  " ;

}else if ($S_faculty == "Select faculty" &&  $S_Department != "Select Department" && $S_Course != "Select Course" && $S_Level != "Select Level" &&  empty($S_Id)){

    $WhereQuery = "WHERE `level`.`id` = '".$S_Level."' AND `cource`.`id` = '".$S_Course."'  AND `department`.`id` = '".$S_Department."'  ";

}else if ($S_faculty == "Select faculty" &&  $S_Department != "Select Department" && $S_Course != "Select Course" && $S_Level != "Select Level" &&  !empty($S_Id)){

    $WhereQuery = " WHERE `subject`.`id` LIKE '".$S_Id."%' AND `level`.`id` = '".$S_Level."' AND `cource`.`id` = '".$S_Course."'  AND `department`.`id` = '".$S_Department."'  ";

}else if ($S_faculty != "Select faculty" &&  $S_Department == "Select Department" && $S_Course == "Select Course" && $S_Level == "Select Level" &&  empty($S_Id)){

    $WhereQuery = " WHERE `faculty`.`id` = '".$S_faculty."' ";

}else if ($S_faculty != "Select faculty" &&  $S_Department == "Select Department" && $S_Course == "Select Course" && $S_Level == "Select Level" &&  !empty($S_Id)){

    $WhereQuery = " WHERE `subject`.`id` LIKE '".$S_Id."%'  AND `faculty`.`id` = '".$S_faculty."'";

}else if ($S_faculty != "Select faculty" &&  $S_Department == "Select Department" && $S_Course == "Select Course" && $S_Level != "Select Level" &&  empty($S_Id)){

    $WhereQuery = " WHERE `level`.`id` = '".$S_Level."'  AND `faculty`.`id` = '".$S_faculty."' ";

}else if ($S_faculty != "Select faculty" &&  $S_Department == "Select Department" && $S_Course == "Select Course" && $S_Level != "Select Level" &&  !empty($S_Id)){
   
    $WhereQuery = " WHERE `subject`.`id` LIKE '".$S_Id."%' AND `level`.`id` = '".$S_Level."' AND `faculty`.`id` = '".$S_faculty."' ";

}else if ($S_faculty != "Select faculty" &&  $S_Department == "Select Department" && $S_Course != "Select Course" && $S_Level == "Select Level" &&  empty($S_Id)){

    $WhereQuery = " WHERE `cource`.`id` = '".$S_Course."' AND `faculty`.`id` = '".$S_faculty."' ";

}else if ($S_faculty != "Select faculty" &&  $S_Department == "Select Department" && $S_Course != "Select Course" && $S_Level == "Select Level" &&  !empty($S_Id)){

    $WhereQuery = " WHERE `subject`.`id` LIKE '".$S_Id."%' AND `cource`.`id` = '".$S_Course."' AND `faculty`.`id` = '".$S_faculty."' ";

}else if ($S_faculty != "Select faculty" &&  $S_Department != "Select Department" && $S_Course != "Select Course" && $S_Level != "Select Level" &&  !empty($S_Id)){

    $WhereQuery = " WHERE `subject`.`id` LIKE '".$S_Id."%' AND `cource`.`id` = '".$S_Course."'   AND `department`.`id` = '".$S_Department."' AND `level`.`id` = '".$S_Level."' AND `faculty`.`id` = '".$S_faculty."' ";

}

$rs = DATABASE::search("SELECT `faculty`.`name` AS `faculty`, `department`.`name` AS `department` ,`cource`.`name` AS `course`, `level`.`level` AS `level`, `subject`.`id` AS `subject_id`,`subject`.`name` AS `subject` , `subject`.`subject_hours` , `subject`.`subject_credit` FROM `subject` INNER JOIN `cource_has_subject` ON `subject`.`id` = `cource_has_subject`.`subject_id` INNER JOIN `level`  ON `cource_has_subject`.`level_id` = `level`.`id` INNER JOIN `cource` ON `cource_has_subject`.`cource_id` = `cource`.`id` INNER JOIN `faculty_has_department` ON `cource_has_subject`.`faculty_has_department_id` = `faculty_has_department`.`id` INNER JOIN `department` ON `faculty_has_department`.`department_id` =  `department`.`id`  INNER JOIN `faculty` ON `faculty_has_department`.`faculty_id` = `faculty`.`id` ".$WhereQuery." ORDER BY `subject`.`id` ASC");
$n = $rs->num_rows; 
for($i = 0 ; $i < $n ; $i ++){
    $d = $rs->fetch_assoc();




    ?>
    <tr>
          <th > <?php echo $d['subject_id'] ?></th>
          <th > <?php echo $d['subject'] ?></th>
          <th > <?php echo $d['subject_hours'] ?></th>
          <td><?php echo $d['subject_credit'] ?></td>
          <td><?php echo $d['faculty'] ?></td>
          <td><?php echo $d['department'] ?></td>
          <td><?php echo $d['course'] ?></td>
          <td><?php echo $d['level'] ?></td>

          
        </tr>
    
        <?php
           }


?>