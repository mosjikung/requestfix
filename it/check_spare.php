<?php
session_start();

error_reporting(0);
  if($_SESSION['username']==''){
  echo "<script>window.location.href='../index.php'</script>";
  }
  if($_SESSION['section']!=='it'){
    echo "<script>alert('คุณไม่มีสิทธิ์เข้าใช้งานหน้านี้');</script>";
    echo "<script>window.location.href='../index.php'</script>";
  }
?>
<?php
include_once ('function_spare.php');
$detaildata = new DB_COND();
$result2 = $detaildata->show_spare();
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Nutritionsc Request Fix</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="stable.css" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <?php
  if($_SESSION['section']=="it"){
  include_once('main_it.php');
  include_once('top_it.php');
  }elseif($_SESSION['username']=="akkaluk"){
  include_once('main_akkaluk.php');
  include_once('top_akkaluk.php');
  }elseif($_SESSION['section']=="hr" && $_SESSION['level_job']=="ผู้จัดการ"){
  include_once('main_hr_mgr.php');
  include_once('top_hr_mgr.php');
  }elseif($_SESSION['section']=="hr"){
  include_once('main_ma.php');
  include_once('top_ma.php');
  }elseif($_SESSION['section']=="hr"){
  include_once('main_hr.php');
  include_once('top_hr.php');
  }else{
  include_once('main_user.php');
  include_once('top_user.php');
  }
  ?>

  <!-- Main content -->
 
    <!-- Header -->
    <!-- Header -->

    <!-- Page content -->
    <div class="container-fluid mt--0">
     
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">List งานซ่อม IT</h3>
                </div>

              </div>
            </div>
            <div class="table-responsive">
              <form name="1" method="post">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                  <th class="text-center" scope="col">ID</th>
                    <th class="text-center" scope="col">ชื่อไอเทม</th>
                    <th class="text-center" scope="col">ประเภทไอเทม</th>
                    <th class="text-center" scope="col">สถานะ</th>
                    <th class="text-center" scope="col">รหัสไอเทม</th>
                    <th class="text-center" scope="col">Acept งาน</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  while($objResult = mysqli_fetch_array($result2)){


                   ?>
                  <tr>
                  <td class="text-center"><?php echo $objResult['part_id']; ?></td>

                     <td class="text-center"><?php echo $objResult['part_name']; ?></td>


                      <td class="text-center"><?php echo $objResult['kind_part']; ?></td>


                      <td class="text-center"><?php echo $objResult['status']; ?></td>

                      
                      <td class="text-center"><?php echo $objResult['serial_number']; ?></td>



                    <td class="text-center"><a href="it_page.php?case_id=<?php echo $objResult['case_id']; ?>&update=1" onClick="return confirm('คุณต้องการรับงานนี้หรือไม่ ?');" class="btn btn-success">รับงาน</a></td>
                    
                </form>
                  </tr>
                  <?php
                  }
                  ?>
                  <tr>


                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
       
        
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">

          </div>

        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/stable.js"></script>
</body>

</html>