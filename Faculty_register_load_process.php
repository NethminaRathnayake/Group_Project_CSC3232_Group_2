<?php

require "assets/connection/connection.php";

$f_id = $_POST['f_id'];

$search_f_id = " ORDER BY `id` ASC ";

if(!empty($f_id)){
    $search_f_id = " WHERE `id` LIKE '%".$f_id."%'  ORDER BY `id` DESC ";
}


$rs = DATABASE::search("SELECT * FROM `faculty`  ".$search_f_id."  ");
$n = $rs->num_rows;
    for($i = 0 ; $i < $n ; $i ++){
        $d = $rs->fetch_assoc();

        ?>
         <tr>
      <th><?php echo $i+1 ?></th>
      <td><?php echo $d['id'] ?></td>
      <td><?php echo $d['name'] ?></td>
     
    </tr>
        <?php
    }

?>