<?php
session_start();
error_reporting(0);
include_once('function.php');
$detail = new DB_CON();

$case_id = $_GET['case_id'];
$can_fix = "ซ่อมได้";
$fix_stat = "working";
$result = $detail->showmgr($case_id,$can_fix,$fix_stat);
?>

<?php
include_once('function.php');
$updatefinish = new DB_CON();
date_default_timezone_set("Asia/Bangkok");
$last_update = date('Y-m-d');
echo $last_update;
$who_update = $_SESSION['username'];

if(isset($_POST['update'])){
$case_id = $_GET['case_id'];
$notice = $_POST['notice'];
$part_id = $_POST['part'];
$mgr_app = 'approve';

  $updatefinish = $updatefinish->mgrapp($case_id,$notice,$part_id,$mgr_app,$last_update,$who_update);
  if($updatefinish){
    echo "<script>alert('บันทึกสำเร็จ');</script>";
    echo "<script>window.location.href='app_fix.php'</script>";
  }else{
    echo "<script>alert('เกิดข้อผิดพลาด');</script>";
    echo "<script>window.location.href='app_fix.php'</script>";
  }
}


 ?>
 <?php
include_once('function.php');
$showmgrs = new DB_CON();
$fix_stat =  'working';
$can_fix = 'ซ่อมได้';
$mgr_app = '';
$result3 = $showmgrs->nottification_mgr($can_fix,$fix_stat,$mgr_app);
?>
<?php
include_once('function_spare.php');
$show_data  = new DB_COND();
$status = 'not used';
$result6 = $show_data->spare_not_used($status);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Requset Fix Nutritionsc</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
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
    <!-- Header -->
    <!-- Header -->

    <!-- Page content -->
    <div class="container-fluid mt--12">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-12 order-lg-12">
                <div class="card-profile-image">

                  <h6>วิธีการใช้งาน</h6>

                </div>
              </div>
            </div>

            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center">

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">ใบแจ้งซ่อมฝ่าย IT</h3>
                </div>
                <div class="col-4 text-right">

                </div>
              </div>
            </div>

            <div class="card-body">

              <?php
            while($objResult=mysqli_fetch_array($result)){
               ?>
               <?php
                 
                ?>
              <form name='form1' method="post">
                <h6 class="heading-small text-muted mb-4">โปรดใส่ข้อมูลให้ครบ</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">

                      <div class="form-group">
                          <label><?php echo $objResult['about'];?></label>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">

                        <label><?php echo $objResult['number'];?></label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label><?php echo $objResult['problem'];?></label>

                      </div>
                    </div>

                  </div>
                  <div class="row">


                  <div class="col-lg-12">

                      <div class="form-group">
                        <label class="form-control-label">หมายเหตุ</label>
                        <textarea rows="4" id="notice" name="notice" class="form-control" value="<?php echo $objResult['notice'];?>"><?php echo $objResult['notice'];?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                      <select class="form-control" name="can_fix" id="can_fix">
                          <option class="hidden"  value="<?php echo $objResult['can_fix'];?>"  selected disabled><?php echo $objResult['can_fix'];?></option>

                          <option value="ซ่อมได้">ซ่อมได์</option>
                          <option value="ซ่อมได้โดยเปลี่ยนอุปกรณ์">ซ่อมได้โดยเปลี่ยนอุปกรณ์</option>
                          <option value="ซ่อมไม่ได้">ซ่อมไม่ได้</option>
                          <option value="ส่งซ่อมภายนอก">ส่งซ่อมภายนอก</option>


                      </select>
                  </div>
                  <div class="form-group">
                      <select class="form-control" name="part" id="part" onchange="myfunction()">
                          <option class="hidden"  value=""  selected disabled></option>
                          <?php
                          while($objResult6 = mysqli_fetch_array($result6)){
                            ?>

                          <option value="<?php echo $objResult6['part_id'];?>"><?php echo $objResult6['part_name'];?></option>

                          <?php
                          }
                         ?>


                      </select>
                  </div>
                        
                 

                  <div class="form-group">

                    <input type="text" id="item" name="item" class="form-control" placeholder = "อุปกรณ์ที่เปลี่ยน" value=<?php echo $objResult['item'];?>>
                  </div>
                  

                </div>
                <center><button type="submit" name="update" class="btn btn-success">อนุมัติ</button></center>
              </form>
            <?php

          }
  
         ?>
      </div>

      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">nutritionsc</a>
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
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
