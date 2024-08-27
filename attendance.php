<!-- <?php require "assets/connection/connection.php" ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="assets/css/attendance.css" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
  <title>Attendance</title>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-11 mt-5 m-auto p-4 Main_box">
        <div class="row">
          <h4 class="mb-4">Mark Attendance</h4>

          <!-- Facuilty -->
          <div class="col-md-4 col-lg-3 select_my">
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

          <!-- Department -->
          <div class="col-md-4 col-lg-3 select_my">
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

          <!-- Cource -->
          <div class="col-md-4 col-lg-3 select_my">
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

          <!-- subject -->
          <div class="col-md-4 col-lg-3 mt-md-2 mt-lg-0 select_my">
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

          <div class="col-4 mt-2 offset-1">
            <label for="exampleFormControlInput1" class="form-label m-0" style="font-size: 13px">Search Student</label>
            <input type="text" class="form-control" id="search" placeholder="Enter Student Name"
              style="font-size: 12px; padding: 5px 20px" />
          </div>

          <!-- Level -->
          <div class="col-4 offset-1 mt-4 select_my">
            <select id="lv" class="form-select" aria-label="Default select example">
              <option value="0" selected>Select Level</option>
              <?php
              $resultset = DATABASE::search("select * from `level`");
              for ($x = 0; $x < $resultset->num_rows; $x++) {
                $r = $resultset->fetch_assoc();
                ?>
                <option value="<?php echo $r["id"] ?>"><?php echo $r["level"] ?></option>
                <?php
              }
              ?>
            </select>
          </div>

          <div class="col-lg-11 mt-5 mb-3 Main_table m-auto">
            <table class="table mt-3">
              <thead>
                <tr style="font-size: 12px">
                  <th scope="col">St Id</th>
                  <th scope="col">Student Name</th>
                  <th scope="col">Course</th>
                  <th scope="col">Level</th>
                  <th scope="col">Attendance Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody id="table_row">

              </tbody>
            </table>
          </div>

          <div class="col-4 btndiv d-lg-grid">
            <button onclick="attendance();">Submit</button>
          </div>

          <!-- pagination -->
          <div class="col-12 mb-2 d-flex justify-content-center">
            <div class="pagination">
              <a onclick="advancedSearch();">&laquo;</a>
              <a onclick="advancedSearch();" class="ms-1 active">1</a>
              <a onclick="advancedSearch();" class="ms-1">2</a>
              <a onclick="advancedSearch();" class="ms-1">3</a>
              <a onclick="advancedSearch();">&raquo;</a>
            </div>
          </div>
          <!-- pagination -->
        </div>
      </div>
    </div>
  </div>

  <script src="assets/js/at.js"></script>
</body>

</html>