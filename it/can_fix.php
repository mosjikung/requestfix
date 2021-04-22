<?php
session_start();
  if($_SESSION['username']==""){
  echo "<script>window.location.href='index.php'</script>";
  }

include_once('function.php');
$showlist = new DB_CON();
$username = $_SESSION['username'];
$fix_stat = 'working';
$result = $showlist->canfixit($username,$fix_stat);

 ?>






<!DOCTYPE html>
  
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Argon Dashboard - Free Dashboard for Bootstrap 4</title>
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
  }elseif($_SESSION['username']=="akkaluk" || $_SESSION['username']=="tiwakorn"){
  include_once('main_akkaluk.php');
  include_once('top_akkaluk.php');
  }elseif($_SESSION['section']=="hr" && $_SESSION['level_job']=="ผู้จัดการ"){
  include_once('main_hr_mgr.php');
  include_once('top_hr_mgr.php');
  }elseif($_SESSION['level_job']=="ผู้จัดการ"){
  include_once('main_mgr.php');
  include_once('top_mgr.php');
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
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">


          </div>
          <!-- Card stats -->

        </div>
      </div>
    </div>
    <!-- Page content -->
    
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">List งาน IT</h3>
                </div>

              </div>
            </div>
            <div class="table-responsive">
              <form name="1" method="post">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th class="text-center" scope="col">ผู้แจ้ง</th>
                    <th class="text-center" scope="col">ประเภท</th>
                    <th class="text-center" scope="col">ปัญหา</th>
                    <th class="text-center" scope="col">สถานะงาน</th>
                    <th class="text-center" scope="col">ผู้รับงาน</th></th></th>
                    <th class="text-center" scope="col">Acept งาน</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  while($objResult = mysqli_fetch_array($result)){


                   ?>
                  <tr>

                    <td class="text-center"> <?php echo $objResult['username']; ?></td>


                      <td class="text-center"><?php echo $objResult['about']; ?></td>


                      <td class="text-center"><?php echo $objResult['problem']; ?></td>
                    <?php
                      if($objResult['fix_stat']==""){
                        ?>
                        <td class="text-center">ยังไม่มีผู้รับงาน</td>
                        <?php
                      }else{ 
                        ?>                    
                      <td class="text-center"><?php echo $objResult['fix_stat']; ?></td>
                      <?php
                      }
                      ?>
                       <?php
                      if($objResult['ac_name']==""){
                        ?>
                        <td class="text-center">ยังไม่มีผู้รับงาน</td>
                        <?php
                      }else{ 
                        ?>                    
                      <td class="text-center"><?php echo $objResult['ac_name']; ?></td>
                      <?php
                      }
                      ?>



                    <td class="text-center"><a href="fullview_canfix.php?case_id=<?php echo $objResult['case_id'];?>" class="btn btn-success">ดูรายละเอียดงาน</a></td>
                <?php

                 ?>
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
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
