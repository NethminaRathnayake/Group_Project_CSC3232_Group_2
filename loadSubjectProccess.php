<?php
require "assets/connection/connection.php";

// if (isset($_GET['cource'])) {
//     $cource_id = $_GET['cource'];

//     $model_rs = Database::search("SELECT `subject_id` FROM `cource_has_subject` WHERE `cource_id` = '$cource_id'");
//     $models = [];

//     while ($model_data = $model_rs->fetch_assoc()) {

//         $models[] = $model_data;
//     }

//     echo json_encode($models);
// }



$courceId = $_GET["cource"];
// echo($courceId);

$rs = DATABASE::search("SELECT `subject_id` FROM `cource_has_subject` WHERE `cource_id` = '".$courceId."' ");
$subjectModel = [];
if ($num > 0) {
        while ($d = $rs->fetch_assoc()) {
            $subjectModel[] = $d;
        }
     echo json_encode($subjectModel);

}



?>