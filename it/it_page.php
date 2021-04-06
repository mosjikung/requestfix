<?php
session_start();
error_reporting(0);
  if($_SESSION['username']==""){
  echo "<script>window.location.href='index.php'</script>";
  }

include_once('function.php');
$showlist = new DB_CON();
$fix_stat = '';
$fix_stat2 = 'working';
$mgr_app = 'approve';
$result = $showlist->alllist($fix_stat,$fix_stat2,$mgr_app);

 ?>
 <?php

     include_once('function.php');
     $updatedata = new DB_CON();
     date_default_timezone_set("Asia/Bangkok");
     $last_update = date('Y-m-d');
     $who_update = $_SESSION['username'];

     if(isset($_GET['update'])){
      $ac_name = $_SESSION['username'];
      $fix_stat = "working";
      $case_id = $_GET['case_id'];
      
     $sql = $updatedata->update($ac_name,$fix_stat,$last_update,$who_update,$case_id);
     if($sql){
      echo "<script>alert('บันทึกสำเร็จ')</script>";
      echo "<script>window.location.href='it_page.php'</script>";
    }else{
      echo "<script>alert('พบข้อผิดพลาด')</script>";
      echo "<script>window.location.href='it_page.php'</script>";
    }
   }

 ?>
 <?php
  include_once('function.php');
  $checkdata = new DB_CON();
   $fix_stat = '';
   $result2 = $checkdata->count_list($fix_stat);
  ?>

  <?php
  include_once('function.php');
  $showdata = new DB_CON();
  $fix_stat = '';
  $result3 = $showdata->show_list($fix_stat);
?>
<?php
include_once('function_ac.php');
$listdata = new DB_CONZ();
$status = '';
$leader_app = '';
$result4 = $listdata->showalljob($status,$leader_app);
?>

<?php
include_once('function_ac.ph');
$selectjobth = new DB_CONZ();
$status = 'working';
$it_user = $_SESSION['username'];
$per_id  = $_GET['per_id'];
$result5 = $selectjobth->selectjob($per_id,$status,$it_user);

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
                    <th class="text-center" scope="col">ผู้แจ้ง</th>
                    <th class="text-center" scope="col">ประเภท</th>
                    <th class="text-center" scope="col">ปัญหา</th>
                    <th class="text-center" scope="col">Acept งาน</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  while($objResult = mysqli_fetch_array($result2)){


                   ?>
                  <tr>

                     <td class="text-center"><?php echo $objResult['username']; ?></td>


                      <td class="text-center"><?php echo $objResult['about']; ?></td>


                      <td class="text-center"><?php echo $objResult['problem']; ?></td>



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
        <div class="container-fluid mt--0">
        <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">List งานใบขอสิทธิ์</h3>
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
                    <th class="text-center" scope="col">ผู้บังคับบัญชา</th>
                    <th class="text-center" scope="col">ประเภท</th>
                    <th class="text-center" scope="col">วันที่แจ้ง</th>
                    <th class="text-center" scope="col">Acept งาน</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  while($objResult4 = mysqli_fetch_array($result4)){


                   ?>
                  <tr>

                    <td class="text-center">  <?php echo $objResult4['username']; ?></td>

                    <td class="text-center">  <?php echo $objResult4['leader1']; ?></td>


                      <td class="text-center"><?php echo $objResult4['action']; ?></td>


                      <td  class="text-center"><?php echo $objResult4['crt_time']; ?></td>



                    <td class="text-center"><a href="it_page.php?per_id=<?php echo $objResult4['per_id']; ?>&select=1" onClick="return confirm('คุณต้องการรับงานนี้หรือไม่ ?');" class="btn btn-success">รับงาน</a></td>
                    
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
