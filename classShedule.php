<?php require "assets/connection/connection.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/attendance.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <title>Class Shedule</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-10 offset-1 bg-danger mt-4 p-3">
                <div class="row">

                    <div class="col-md-4 col-lg-3">
                        <select id="ft" class="form-select" aria-label="Default select example">
                            <option value="0" selected>Select Faculty</option>

                            <?php
                            $resultset = DATABASE::search("select * from `faculty`");
                            for ($x = 0; $x < $resultset->num_rows; $x++) {
                                $r = $resultset->fetch_assoc();
                                ?>
                                <option value="<?php echo $r["id"] ?>"><?php echo $r["name"] ?></option>
                                <?php
                            }
                            ?>

                        </select>
                    </div>

                    <div class="col-md-4 col-lg-3">
                        <select id="dp" class="form-select" aria-label="Default select example">
                            <option value="0" selected>Select Department</option>
                            <?php
                            $resultset = DATABASE::search("select * from `department`");
                            for ($x = 0; $x < $resultset->num_rows; $x++) {
                                $r = $resultset->fetch_assoc();
                                ?>
                                <option value="<?php echo $r["id"] ?>"><?php echo $r["name"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-4 col-lg-3">
                        <select id="cu" class="form-select" aria-label="Default select example">
                            <option value="0" selected>Select Cource</option>
                            <?php
                            $resultset = DATABASE::search("select * from `cource`");
                            for ($x = 0; $x < $resultset->num_rows; $x++) {
                                $r = $resultset->fetch_assoc();
                                ?>
                                <option value="<?php echo $r["id"] ?>"><?php echo $r["name"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-12 col-lg-3 mt-md-2 mt-lg-0">
                        <select id="sb" class="form-select" aria-label="Default select example">
                            <option value="0" selected>Select Subject</option>
                            <?php
                            $resultset = DATABASE::search("select * from `subject`");
                            for ($x = 0; $x < $resultset->num_rows; $x++) {
                                $r = $resultset->fetch_assoc();
                                ?>
                                <option value="<?php echo $r["id"] ?>"><?php echo $r["name"] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>


                    <div class="col-4">
                        <label for="exampleFormControlInput1" class="form-label m-0" style="font-size: 13px">Time
                            From</label>
                        <input type="text" class="form-control" id="from" placeholder="Enter From"
                            style="font-size: 14px; padding: 5px 20px" />
                    </div>

                    <div class="col-4">
                        <label for="exampleFormControlInput1" class="form-label m-0" style="font-size: 13px">Time
                            To</label>
                        <input type="text" class="form-control" id="to" placeholder="Enter To"
                            style="font-size: 14px; padding: 5px 20px" />
                    </div>

                    <div class="col-4 btndiv d-lg-grid mt-2">
                        <button onclick="classShedul();">Add</button>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="assets/js/at.js"></script>

</body>

</html>