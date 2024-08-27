<?php
session_start();
require "assets/connection/connection.php";
if (isset($_SESSION["admin"])) {

    $data = $_SESSION["admin"];
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
        <title>Department Registartion</title>
    </head>

    <body class="container-fluid" onload="loadDepartment();">

        <div class="row mt-2 ">
            <div class="col-12 ">
                <div class="row align-items-center align-content-center text-center  justify-content-center">

                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item"><a href="admin.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Department Registration</li>
                        </ol>
                    </nav>

                    <img src="assets/img/logo.png" class="image col-3" alt="" />

                    <h2 class="title">Department Registration </h2>

                    <div class="col-11 rounded-5 div_bg_color">
                        <div class="row">
                            <div class=" col-3  mt-2  mb-3 ">
                            <i class="bi bi-house-gear-fill text-light"></i>
                                <select class=" col-6 form-select  " id="D_faculty" onchange="loadDepartment();">
                                    <option class="fw-lighter">Select faculty</option>
                                    <?php
                                    $r = Database::search("SELECT * FROM `faculty`");
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
                                <input class="form-control text-center" type="text" placeholder="Department ID" id="D_id" oninput="loadDepartment();" />
                            </div>

                            <div class="  col-4 mt-2 ">
                            <i class="bi bi-list-ol text-light"></i>
                                <input class="form-control text-center" type="text" placeholder="Department Name" id="D_name" />
                            </div>

                            <div class="col-2 mt-2">
                                <i class="bi bi-subtract text-light "></i>
                                <button type="submit" class="btn btn-primary solid col-12  mb-3 " onclick="adminDepartmentRegistration();">Register </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-10 offset-1">


                        <table class="table table-striped text-center">
                            <thead>
                                <tr>
                                    <th scope="col ">#</th>
                                    <th scope="col ">Faculty Name</th>
                                    <th scope="col">Department ID</th>
                                    <th scope="col">Department Name</th>

                                </tr>
                            </thead>
                            <tbody id="View_Department">



                            </tbody>
                        </table>

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