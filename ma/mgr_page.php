<?php
session_start();
error_reporting(0);
  if($_SESSION['username']==""){
  echo "<script>window.location.href='index.php'</script>";
  }
 ?>

 <?php
  include_once ('function.php');
  $user_show_list = new DB_CON();
  $username = $_SESSION['username'];
  $fix_stat = 'working';
  $fix_stat2 = '';
  $user_app = '';
  $result = $user_show_list->user_show_list($username,$user_app,$fix_stat,$fix_stat2);
 ?>
 <?php
  include_once ('function.php');
  
  $showdata = new DB_CON();
  $fix_stat = 'end work';
  $username = $_SESSION['username'];
  $user_app = '';
  $result2 = $showdata->show_end($fix_stat,$username,$user_app);
 ?>
 <?php
  require_once ('function_sp.php');
  $user_show_list_ma = new DB_CONS();
  $username = $_SESSION['username'];
  $fix_stat = 'working';
  $fix_stat2 = '';
  $user_app = '';
  $result3 = $user_show_list_ma->user_show_list_ma($username,$user_app,$fix_stat,$fix_stat2);
 ?>
 <?php
  require_once ('function_sp.php');
  $showdata_ma = new DB_CONS();
  $fix_stat = 'end work';
  $username = $_SESSION['username'];
  $user_app = '';
  $result4 = $showdata_ma->show_end_ma($fix_stat,$username,$user_app);
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Request Fix Nutritionsc</title>
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
  }elseif($_SESSION['section']=="hr" && $_SESSION['level_job']=="???????????????????????????"){
  include_once('main_hr_mgr.php');
  include_once('top_hr_mgr.php');
  }elseif($_SESSION['level_job']=="???????????????????????????"){
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
 
    <!-- Page content -->
    <div class="container-fluid mt--0">
     
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">List ?????????????????????????????? IT</h3>
                </div>

              </div>
            </div>
            <div class="table-responsive">
              <form name="1" method="post">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">?????????????????????</th>
                    <th scope="col">??????????????????</th>
                    <th scope="col">???????????????</th>
                    <th scope="col">?????????????????????????????????</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  while($objResult = mysqli_fetch_array($result)){


                   ?>
                  <tr>

                    <td >  <?php echo $objResult['username']; ?></td>


                      <td ><?php echo $objResult['about']; ?></td>


                      <td ><?php echo $objResult['problem']; ?></td>



                    <td><a href="fullview_finish.php?case_id=<?php echo $objResult['case_id']; ?>"  class="btn btn-success">???????????????????????????????????????</a></td>
                    
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
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">List ????????????????????????????????????????????????</h3>
                </div>

              </div>
            </div>
            <div class="table-responsive">
              <form name="1" method="post">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">?????????????????????</th>
                    <th scope="col">??????????????????</th>
                    <th scope="col">???????????????</th>
                    <th scope="col">???????????????????????????????????????</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  while($objResult2 = mysqli_fetch_array($result2)){


                   ?>
                  <tr>

                    <td >  <?php echo $objResult2['username']; ?></td>


                      <td ><?php echo $objResult2['about']; ?></td>


                      <td ><?php echo $objResult2['problem']; ?></td>



                    <td><a href="fullview_end_work.php?case_id=<?php echo $objResult2['case_id']; ?>"class="btn btn-success">????????????????????????????????????</a></td>
                    
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
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">List ???????????????????????????????????????????????????????????????</h3>
                </div>

              </div>
            </div>
            <div class="table-responsive">
              <form name="1" method="post">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">?????????????????????</th>
                    <th scope="col">??????????????????</th>
                    <th scope="col">???????????????</th>
                    <th scope="col">???????????????????????????????????????</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  while($objResult3 = mysqli_fetch_array($result3)){


                   ?>
                  <tr>

                    <td >  <?php echo $objResult3['username']; ?></td>


                      <td ><?php echo $objResult3['about']; ?></td>


                      <td ><?php echo $objResult3['problem']; ?></td>



                    <td><a href="fullview_end_work.php?case_id=<?php echo $objResult3['case_id']; ?>"class="btn btn-success">????????????????????????????????????</a></td>
                    
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
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">List ????????????????????????????????????????????????????????????</h3>
                </div>

              </div>
            </div>
            <div class="table-responsive">
              <form name="1" method="post">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">?????????????????????</th>
                    <th scope="col">??????????????????</th>
                    <th scope="col">???????????????</th>
                    <th scope="col">???????????????????????????????????????</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  while($objResult4 = mysqli_fetch_array($result4)){


                   ?>
                  <tr>

                    <td >  <?php echo $objResult4['username']; ?></td>


                      <td ><?php echo $objResult4['about']; ?></td>


                      <td ><?php echo $objResult4['problem']; ?></td>



                    <td><a href="fullview_end_work.php?case_id=<?php echo $objResult4['case_id']; ?>"class="btn btn-success">????????????????????????????????????</a></td>
                    
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
            <div class="copyright text-center  text-lg-left  text-muted">
               <a href="https://www.nutritionsc.co.th" class="font-weight-bold ml-1" target="_blank">Nutritionsc</a>
            </div>
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
