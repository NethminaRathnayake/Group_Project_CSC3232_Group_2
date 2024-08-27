<?php

session_start();

require "assets/connection/connection.php";

$reg_no = $_POST['reg_no'];
$password = $_POST['password'];
$r = $_POST["remember"];

// echo($reg_no);
// echo($password);
// echo($r);

if(empty($reg_no)){
    echo "Please Enter Your User ID.....";

// }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
//     echo "Invalid email address.....";

// }elseif(strlen($email)>100){
//     echo "Invalid email address.....";

}else if(empty($password)){
    echo "Please Enter Your Password.....";

}else if (strlen($password)<=5||strlen($password)>=20){
    echo "password must be less than 20 characters AND at least 6 characters.....";
}else{

   

    $rs = Database:: search( "SELECT * FROM `student` WHERE `reg_no` ='".$reg_no."' AND  `password` ='".$password."' ");

    $n = $rs->num_rows;

    if($n==1){
          
        echo "student";
            $d = $rs->fetch_assoc();

            $_SESSION["student"] = $d;

            if($r=="true"){
                setcookie("e",$reg_no,time()+(60*60*24*365));
                setcookie("p",$password,time()+(60*60*24*365));
            }else{
                setcookie("e","",-1);
                setcookie("p","",-1);
            }


        }else{


            $rs2 = Database:: search( "SELECT * FROM `admin` WHERE `user_id` ='".$reg_no."' AND  `password` ='".$password."' ");

            $n2 = $rs2->num_rows;

            if($n2==1){
                    echo "admin";
        
                    $d = $rs2->fetch_assoc();
        
                    $_SESSION["admin"] = $d;

                    if($r=="true"){
                        setcookie("e",$reg_no,time()+(60*60*24*365));
                        setcookie("p",$password,time()+(60*60*24*365));
                    }else{
                        setcookie("e","",-1);
                        setcookie("p","",-1);
                    }
            }else{
                echo "Invalid details";
            }

            

    }

}

?>