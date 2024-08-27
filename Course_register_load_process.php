<?php

require "assets/connection/connection.php";

$C_id = $_POST['C_id'];

$search_c_id = " ORDER BY `id` ASC ";

if(!empty($C_id)){
    $search_c_id = " WHERE `cid` LIKE '%".$C_id."%'  ";
}


$rs = DATABASE::search("SELECT * FROM `cource`  ".$search_c_id."  ");
$n = $rs->num_rows;
    for($i = 0 ; $i < $n ; $i ++){
        $d = $rs->fetch_assoc();

        ?>
         <tr>
      <th><?php echo $i+1 ?></th>
      <td><?php echo $d['cid'] ?></td>
      <td><?php echo $d['name'] ?></td>
      <td><?php echo $d['credit'] ?></td>
     
    </tr>
        <?php
    }

?>