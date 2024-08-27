<?php
session_start();
if (isset($_SESSION["admin"])) {

    $data = $_SESSION["admin"];

    require "assets/connection/connection.php";
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/login_style.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <title>Admin Class Schedule</title>
    </head>

    <body class="container-fluid" onload="">

        



            
        <div class="row mt-2 ">
        <div class="col-12 ">
                <div class="row align-items-center align-content-center text-center  justify-content-center">

                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Admin Class Schedule</li>
                        </ol>
                    </nav>

                    <img src="assets/img/logo.png" class="image col-3" alt="" />

                    <h2 class="title">Class Schedule </h2>

                    <div class="col-11 rounded-5 div_bg_color">
                        <div class="row">

                            <div class=" col-3  mt-2  mb-3 ">
                            <i class="bi bi-building text-light"></i>
                                <select class=" col-6 form-select  " id="S_Course" onchange="loadSubjects();">
                                    <option value="0" class="fw-lighter">Select Course</option>
                                    <?php
                                    $r = Database::search("SELECT * FROM `cource` ORDER BY `name` ASC ;");
                                    $n = $r->num_rows;
                                    
                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $r->fetch_assoc();
                                    ?>
                                        <option  value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>        
                        </div>
                        <div class=" col-3  mt-2  mb-3 ">
                        <i class="bi bi-calendar-range text-light"></i>
                                <select class=" col-6 form-select  " id="S_Level" onchange="loadSubjects();">
                                    <option value="0" class="fw-lighter">Select Level</option>
                                    <?php
                                    $r = Database::search("SELECT * FROM `level` ORDER BY `level` ASC ;");
                                    $n = $r->num_rows;
                                    
                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $r->fetch_assoc();
                                    ?>
                                        <option  value="<?php echo $d['id']; ?>"><?php echo $d['level']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>        
                        </div>


                        <div class=" col-3  mt-2  mb-3 ">
                        <i class="bi bi-calendar-range text-light"></i>
                                <select class=" col-6 form-select  " id="S_subject" onchange="loadSubjects();">
                                    <option value="0" class="fw-lighter">Select Subject</option>
                                    <?php
                                    $r = Database::search("SELECT * FROM `subject` ORDER BY `name` ASC ;");
                                    $n = $r->num_rows;
                                    
                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $r->fetch_assoc();
                                    ?>
                                        <option  value="<?php echo $d['id']; ?>"><?php echo $d['name']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>        
                        </div>



                        <div class=" col-3  mt-2  mb-3 ">
                                <i class="bi bi-list-ol text-light"></i>
                                <input class="form-control text-center"  type="date" placeholder="Date" id="date"  />
                            </div>

                            <div class="  col-3 mt-2 ">
                            <i class="bi bi-align-bottom text-light"></i>
                                <input class="form-control text-center" type="time" placeholder="Time From" id="t_From" />
                            </div>

                            <div class="  col-3 mt-2 ">
                            <i class="bi bi-backpack-fill text-light"></i>
                                <input class="form-control text-center" type="time" placeholder="Time To" id="t_To" />
                            </div>

                            <div class="  col-3 mt-2 ">
                            <i class="bi bi-body-text text-light"></i>
                                <input class="form-control text-center" type="text" placeholder="Lecture Hours" id="hours" />
                            </div>

                    
                        </div>
                        <button type="submit" class="btn btn-primary solid col-3 mt-3 mb-3 " onclick="adminClassShedule();">Register </button>
                    </div>
                    

                </div>
            </div>
        </div>
   



        <script src="assets/js/login_js.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </body>

    </html>

<?php
} else {
?>
    <script>
        window.location = "index.php";
    </script>
<?php
}
?>