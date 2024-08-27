<?php

require "assets/connection/connection.php";

$stdSearch = $_POST["std_search"];
$get_classSheduleId = $_POST["get_classSheduleId"];

// echo ($stdSearch);

$rs = DATABASE::search(" SELECT * FROM `student`  WHERE  `student`.reg_no = '".$stdSearch."' OR `student`.email LIKE '".$stdSearch."%'  ");
$num = $rs->num_rows;

$c = 0;
for ($i = 0; $i < $num; $i++) {
    $d2 = $rs->fetch_assoc();
    $c = $c + 1;
?>
    <tr>
        <th><?php echo $c; ?></th>
        <th><?php echo $d2["reg_no"]; ?></th>
        <th><?php echo $d2["name"]; ?></th>
        <th><?php echo $d2["email"]; ?></th>
        <th>
            
            <?php
            $rs2 = DATABASE::search(" SELECT * FROM `attendance` WHERE `class_shedule_id` = '".$get_classSheduleId."' AND `student_reg_no` = '".$d2["reg_no"]."' ");
            $num_rows2 = $rs2->num_rows;


            if ($num_rows2 > 0) {
                ?>
                    <?php echo $num_rows2; ?>
                <?php
            } else{
                
            ?>
                <button class="btn btn-dark" onclick="markAttendence('<?php echo $d2['reg_no']; ?>');">Click To Mark</button>
            <?php
            }
            ?>
        </th>
    </tr>
<?php
}








?>