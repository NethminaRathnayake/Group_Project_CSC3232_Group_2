<?php

require "assets/connection/connection.php";

if (isset($_POST["aaa"])) {
}

$ft = $_POST["ft"];
$dp = $_POST["dp"];
$cu = $_POST["cu"];
$sb = $_POST["sb"];
$lv = $_POST["lv"];
$search = $_POST["search"];

$selectrs;

if ($ft != 0 && $dp != 0 && $cu != 0 && $sb != 0 && $lv != 0 && !empty($search)) {

    $selectrs = DATABASE::search("SELECT `student`.`reg_no`,`student`.`name` AS `st_name`,`student`.`email`,`faculty`.`name` 
    AS `ft_name`,`department`.`name` AS `dp_name`,`cource`.`name` AS `co_name`,`subject`.`name` 
    AS `sb_name`,`level`.`level` FROM `student` INNER JOIN `faculty_has_department` 
    ON `student`.`faculty_has_department_id`=`faculty_has_department`.`id` INNER JOIN `department` 
    ON `faculty_has_department`.`department_id`=`department`.`id` INNER JOIN `faculty` 
    ON `faculty_has_department`.`faculty_id`=`faculty`.`id` INNER JOIN `cource_has_subject` 
    ON `cource_has_subject`.`faculty_has_department_id`=`faculty_has_department`.`id` 
    INNER JOIN `subject` ON `cource_has_subject`.`subject_id`=`subject`.`id` INNER JOIN `cource` 
    ON `cource_has_subject`.`cource_id`=`cource`.`id` INNER JOIN `class_shedule` 
    ON `class_shedule`.`cource_has_subject_id`=`cource_has_subject`.`id` INNER JOIN `level` 
    ON `cource_has_subject`.`level_id`=`level`.id
    where `faculty`.`id`= '" . $ft . "' AND `department`.`id`= '" . $dp . "' AND `cource`.`id`= '" . $cu . "' 
    AND `subject`.`id`= '" . $sb . "' AND `cource_has_subject`.`level_id`='" . $lv . "' AND `student`.`st_name` LIKE '" . $search . "%' ");


} else if ($ft != 0) {
    $selectrs = DATABASE::search("SELECT `student`.`reg_no`,`student`.`name` AS `st_name`,`student`.`email`,`faculty`.`name` 
    AS `ft_name`,`department`.`name` AS `dp_name`,`cource`.`name` AS `co_name`,`subject`.`name` 
    AS `sb_name`,`level`.`level` FROM `student` INNER JOIN `faculty_has_department` 
    ON `student`.`faculty_has_department_id`=`faculty_has_department`.`id` INNER JOIN `department` 
    ON `faculty_has_department`.`department_id`=`department`.`id` INNER JOIN `faculty` 
    ON `faculty_has_department`.`faculty_id`=`faculty`.`id` INNER JOIN `cource_has_subject` 
    ON `cource_has_subject`.`faculty_has_department_id`=`faculty_has_department`.`id` 
    INNER JOIN `subject` ON `cource_has_subject`.`subject_id`=`subject`.`id` INNER JOIN `cource` 
    ON `cource_has_subject`.`cource_id`=`cource`.`id` INNER JOIN `class_shedule` 
    ON `class_shedule`.`cource_has_subject_id`=`cource_has_subject`.`id` INNER JOIN `level` 
    ON `cource_has_subject`.`level_id`=`level`.id
    where `faculty`.`id`= '" . $ft . "' ");

} else
    if ($dp != 0) {
        $selectrs = DATABASE::search("SELECT `student`.`reg_no`,`student`.`name` AS `st_name`,`student`.`email`,`faculty`.`name` 
AS `ft_name`,`department`.`name` AS `dp_name`,`cource`.`name` AS `co_name`,`subject`.`name` 
AS `sb_name`,`level`.`level` FROM `student` INNER JOIN `faculty_has_department` 
ON `student`.`faculty_has_department_id`=`faculty_has_department`.`id` INNER JOIN `department` 
ON `faculty_has_department`.`department_id`=`department`.`id` INNER JOIN `faculty` 
ON `faculty_has_department`.`faculty_id`=`faculty`.`id` INNER JOIN `cource_has_subject` 
ON `cource_has_subject`.`faculty_has_department_id`=`faculty_has_department`.`id` 
INNER JOIN `subject` ON `cource_has_subject`.`subject_id`=`subject`.`id` INNER JOIN `cource` 
ON `cource_has_subject`.`cource_id`=`cource`.`id` INNER JOIN `class_shedule` 
ON `class_shedule`.`cource_has_subject_id`=`cource_has_subject`.`id` INNER JOIN `level` 
ON `cource_has_subject`.`level_id`=`level`.id
where `department`.`id`= '" . $dp . "' ");

    } else if ($cu != 0) {
        $selectrs = DATABASE::search("SELECT `student`.`reg_no`,`student`.`name` AS `st_name`,`student`.`email`,`faculty`.`name` 
AS `ft_name`,`department`.`name` AS `dp_name`,`cource`.`name` AS `co_name`,`subject`.`name` 
AS `sb_name`,`level`.`level` FROM `student` INNER JOIN `faculty_has_department` 
ON `student`.`faculty_has_department_id`=`faculty_has_department`.`id` INNER JOIN `department` 
ON `faculty_has_department`.`department_id`=`department`.`id` INNER JOIN `faculty` 
ON `faculty_has_department`.`faculty_id`=`faculty`.`id` INNER JOIN `cource_has_subject` 
ON `cource_has_subject`.`faculty_has_department_id`=`faculty_has_department`.`id` 
INNER JOIN `subject` ON `cource_has_subject`.`subject_id`=`subject`.`id` INNER JOIN `cource` 
ON `cource_has_subject`.`cource_id`=`cource`.`id` INNER JOIN `class_shedule` 
ON `class_shedule`.`cource_has_subject_id`=`cource_has_subject`.`id` INNER JOIN `level` 
ON `cource_has_subject`.`level_id`=`level`.id
where `cource`.`id`= '" . $cu . "' ");

    } else if ($sb != 0) {
        $selectrs = DATABASE::search("SELECT `student`.`reg_no`,`student`.`name` AS `st_name`,`student`.`email`,`faculty`.`name` 
AS `ft_name`,`department`.`name` AS `dp_name`,`cource`.`name` AS `co_name`,`subject`.`name` 
AS `sb_name`,`level`.`level` FROM `student` INNER JOIN `faculty_has_department` 
ON `student`.`faculty_has_department_id`=`faculty_has_department`.`id` INNER JOIN `department` 
ON `faculty_has_department`.`department_id`=`department`.`id` INNER JOIN `faculty` 
ON `faculty_has_department`.`faculty_id`=`faculty`.`id` INNER JOIN `cource_has_subject` 
ON `cource_has_subject`.`faculty_has_department_id`=`faculty_has_department`.`id` 
INNER JOIN `subject` ON `cource_has_subject`.`subject_id`=`subject`.`id` INNER JOIN `cource` 
ON `cource_has_subject`.`cource_id`=`cource`.`id` INNER JOIN `class_shedule` 
ON `class_shedule`.`cource_has_subject_id`=`cource_has_subject`.`id` INNER JOIN `level` 
ON `cource_has_subject`.`level_id`=`level`.id
where `subject`.`id`= '" . $sb . "' ");

    } else if (!empty($search)) {
        echo "search";
        $selectrs = DATABASE::search("SELECT `student`.`reg_no`,`student`.`name` AS `st_name`,`student`.`email`,`faculty`.`name` 
AS `ft_name`,`department`.`name` AS `dp_name`,`cource`.`name` AS `co_name`,`subject`.`name` 
AS `sb_name`,`level`.`level` FROM `student` INNER JOIN `faculty_has_department` 
ON `student`.`faculty_has_department_id`=`faculty_has_department`.`id` INNER JOIN `department` 
ON `faculty_has_department`.`department_id`=`department`.`id` INNER JOIN `faculty` 
ON `faculty_has_department`.`faculty_id`=`faculty`.`id` INNER JOIN `cource_has_subject` 
ON `cource_has_subject`.`faculty_has_department_id`=`faculty_has_department`.`id` 
INNER JOIN `subject` ON `cource_has_subject`.`subject_id`=`subject`.`id` INNER JOIN `cource` 
ON `cource_has_subject`.`cource_id`=`cource`.`id` INNER JOIN `class_shedule` 
ON `class_shedule`.`cource_has_subject_id`=`cource_has_subject`.`id` INNER JOIN `level` 
ON `cource_has_subject`.`level_id`=`level`.id
where `student`.`name` LIKE '" . $search . "%' ");

    } else {
        $selectrs = DATABASE::search("SELECT `student`.`reg_no`,`student`.`name` AS `st_name`,`student`.`email`,`faculty`.`name` 
AS `ft_name`,`department`.`name` AS `dp_name`,`cource`.`name` AS `co_name`,`subject`.`name` 
AS `sb_name`,`level`.`level` FROM `student` INNER JOIN `faculty_has_department` 
ON `student`.`faculty_has_department_id`=`faculty_has_department`.`id` INNER JOIN `department` 
ON `faculty_has_department`.`department_id`=`department`.`id` INNER JOIN `faculty` 
ON `faculty_has_department`.`faculty_id`=`faculty`.`id` INNER JOIN `cource_has_subject` 
ON `cource_has_subject`.`faculty_has_department_id`=`faculty_has_department`.`id` 
INNER JOIN `subject` ON `cource_has_subject`.`subject_id`=`subject`.`id` INNER JOIN `cource` 
ON `cource_has_subject`.`cource_id`=`cource`.`id` INNER JOIN `class_shedule` 
ON `class_shedule`.`cource_has_subject_id`=`cource_has_subject`.`id` INNER JOIN `level` 
ON `cource_has_subject`.`level_id`=`level`.id");

    }

while ($srow = $selectrs->fetch_assoc()) {

    ?>
    <tr style="font-size: 12px">
        <td><?php echo $srow["reg_no"] ?></td>
        <td><?php echo $srow["st_name"] ?></td>
        <td><?php echo $srow["co_name"] ?></td>
        <td><?php echo $srow["level"] ?></td>

        <?php
        if ($srow["level"] == 1) {
            ?>
            <td>
                <span class="bg-success p-1 text-white" id="status">Present</span>
            </td>
            <?php

        } else {
            ?>
            <td>
                <span class="bg-danger p-1 text-white" id="status">Absent</span>
            </td>
            <?php

        }
        ?>


        <?php
        if ($srow["level"] == 1) {
            ?>
            <td><button class="btn-succes" onclick="submit('<?php echo $srow['reg_no'] ?>');">Marked</button></td>
            <?php

        } else {
            ?>
            <td><button class="btn-secondary" onclick="submit('<?php echo $srow['reg_no'] ?>');">Submit</button></td>
            <?php

        }
        ?>

    </tr>
    <?php

}

?>