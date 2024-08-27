<?php

require "assets/connection/connection.php";

$t_search_id = $_POST['t_search_id'];
$t_search_text = $_POST['t_search_text'];

$t_deatils= "";

if(empty($t_search_text)){

 if(!empty($t_search_id)){
   
    $t_deatils  =  $t_deatils  = " WHERE `user_id`   LIKE '%".$t_search_id."%' ORDER BY `id` ASC ";

 }

}elseif(empty($t_search_id)){

    if(!empty($t_search_text)){
        $t_deatils  = " WHERE `name` LIKE '%".$t_search_text."%' OR  `user_id` LIKE '%".$t_search_text."%' ORDER BY `id` DESC";
    }
}


$rs = DATABASE::search("SELECT * FROM `teacher`  ".$t_deatils."   ");
$n = $rs->num_rows;
    for($i = 0 ; $i < $n ; $i ++){
        $d = $rs->fetch_assoc();

 


?>
<tr>
      <th > <?php echo $d['id'] ?></th>
      <td><?php echo $d['user_id'] ?></td>
      <td><?php echo $d['name'] ?></td>
      <td>********</td>
    </tr>

    <?php
       }

?>