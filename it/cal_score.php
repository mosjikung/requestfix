<?php
session_start();
error_reporting(0);
include_once('function.php');
$cal_score_date = new DB_CON();
if(isset($_POST['cal'])){
if($_POST['strdate'] !== "" && $_POST['lastdate']!== ""){
    $crt_date = $_POST['strdate'];
    $crt_date2 = $_POST['lastdate'];
    $result = $cal_score_date->calscore($crt_date,$crt_date2);
    
}
    $objResult2 = mysqli_num_rows($result);
    while($objResult = mysqli_fetch_array($result)){
        $objResult['summary_score'];
        $score = $objResult['summary_score'] + $score;
       
    }
    if($objResult2!='0'){
   $max_score = 25*$objResult2;
   
   $cal_score = ($score*100)/$max_score;
    }
   
   
}
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Request Fix</title>
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

                  <h3>วิธีการใช้งาน</h3>

                </div>
              </div>
            </div>

            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  
                <p id="test"></p>
                  <label id="1">1.ใส่วันเริ่มคำนวณ และวันสุดท้ายที่จะเริ่มคำนวณ</label><br>
                  <label id="2">2.กดคำนวณตัวเลขจะแสดงในช่อง </label><br>
             

                 

                  
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
              <form name='form1' method="post">
         
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <h6 class="heading-small text-muted mb-4">ใส่วันที่เริ่มคำนวณ</h6>
                    <input type="date" class="form-control" name="strdate" id="strdate"  >
                    </div>
                    </div>
              

                     
               
                    <div class="col-lg-6">
                    <div class="form-group">
                    <h6 class="heading-small text-muted mb-4">วันสุดท้ายที่คำนวณ</h6>
                      <input type="date" class="form-control" name="lastdate" id="lastdate" >
                      </div>
                      
                    </div>
                  </div>
                  <div class = "row">
                  <div class = "col-lg-12">
                  <div class = "form-group">
                  <input type="text" class="form-control" name="cal_score" id="cal_score"  value="<?php echo number_format($cal_score,2,'.',''); ?>">
                  </div>
                  </div>
                  </div>
                 
             


                </div>
                <center><button type="submit" name="cal" class="btn btn-success">Calculate</button></center>
              </form>
            </div>
          </div>
        </div>
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
