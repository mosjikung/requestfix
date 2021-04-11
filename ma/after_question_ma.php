<?php
session_start();
error_reporting(0);
include_once('functions.php');
$insertdata = new DB_CON();
$username = $_SESSION['username'];
$section = $_SESSION['section'];
$company = $_SESSION['company'];
date_default_timezone_set("Asia/Bangkok");
$crt_date = date('Y-m-d');

if (isset($_POST['insert'])) {
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
   
    $sugguestion = $_POST['sugguestion'];
    $case_id = $_GET['case_id'];



    $sql = $insertdata->insert_suggestion($username,$company,$section,$q1,$q2,$q3,$q4,$q5,$sugguestion,$case_id[],$crt_date);
    

   
}
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
  <!-- Argon CSS -->
  <link rel="stylesheet" href="stable.css" type="text/css">

</head>

<body>
<?php
  if($_SESSION['section']=="ma"){
  include_once('main_ma.php');
  include_once('top_ma.php');
  }elseif($_SESSION['username']=="akkaluk"){
  include_once('main_akkaluk.php');
  include_once('top_akkaluk.php');
  }elseif($_SESSION['section']=="hr" && $_SESSION['level_job']=="ผู้จัดการ"){
  include_once('main_hr_mgr.php');
  include_once('top_hr_mgr.php');
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
                  <label id="1">1.เลือกอุปกรณ์ที่จะใช้ในการซ่อมเช่น computer printer network</label><br>
                  <label id="2">2.ใส่หมายเลขตัวเครื่อง อาจจะเป็น label สีแดงหรือสีน้ำเงินก็ได้ </label><br>
                  <label id="3">3.ใส่อาการเสียที่พบ รายละเอียดของการเสีย เพื่อให้วิเคราะห์ได้ง่ายขึ้น</label><br>
                  <label id="4">4.ในกรณีที่มีหมายเหตุ หรือคำอธิบายเพิ่มเติมสามารถใส่ข้อมูลเพิ่มเติมได้พร้อมทั้ง #ชื่อบุคคลนั้นๆ</label><br>
                  <label id="5">5.หากพบว่าโปรแกรมมีปัญหา สามารถแจ้งได้ที่เบอร์3777 หรือline it support nt group</label><br>
                 

                  
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
                  <h3 class="mb-0">แบบสอบถามหลังจากดำเนินการ</h3>
                </div>
                <div class="col-4 text-right">

                </div>
              </div>
            </div>
            
            <div class="card-body">
              <form name='form1' method="post">
                <h3 class="heading-small text-muted mb-4">โปรดตอบให้ครบทุกคำถาม</h3>
                <div class="pl-lg-4">
                  <div class="row">
                  <h3>1.การบริการเป็นไปตามระยะเวลาที่กำหนด</h3>
                    <div class="col-lg-12">
                    <div class="form-group">
                    <input type="radio" id="q1" name="q1" value="1">
                    <label>1.น้อยที่สุด</label><br>
                    <input type="radio" id="q1" name="q1" value="2">
                    <label>2.น้อย</label><br>
                    <input type="radio" id="q1" name="q1" value="3">
                    <label>3.ปานกลาง</label><br>
                    <input type="radio" id="q1" name="q1" value="4">
                    <label>4.มาก</label><br>
                    <input type="radio" id="q1" name="q1" checked value="5">
                    <label>5.มากที่สุด</label><br>
                    </div>
                    </div>
                    
                  
                    
                  </div>
                  
                  <div class="row">
                  <h3>2.ความเต็มใจและความพร้อมในการให้บริการอย่างสุภาพ</h3>
                    <div class="col-lg-12">
                    <div class="form-group">
                    <input type="radio" id="q2" name="q2" value="1">
                    <label>1.น้อยที่สุด</label><br>
                    <input type="radio" id="q2" name="q2" value="2">
                    <label>2.น้อย</label><br>
                    <input type="radio" id="q2" name="q2" value="3">
                    <label>3.ปานกลาง</label><br>
                    <input type="radio" id="q2" name="q2" value="4">
                    <label>4.มาก</label><br>
                    <input type="radio" id="q2" name="q2" checked value="5">
                    <label>5.มากที่สุด</label><br>
                    </div>
                    </div>
                    
                  
                    
                  </div>
                  <div class="row">
                  <h3>3.ทักษะความเชี่ยวชาญในการให้บริการ การแก้ปัญหา/ให้คำแนะนำ เช่นชี้แจงข้อสงสัยที่พบได้</h3>
                    <div class="col-lg-12">
                    <div class="form-group">
                    <input type="radio" id="q3" name="q3" value="1">
                    <label>1.น้อยที่สุด</label><br>
                    <input type="radio" id="q3" name="q3" value="2">
                    <label>2.น้อย</label><br>
                    <input type="radio" id="q3" name="q3" value="3">
                    <label>3.ปานกลาง</label><br>
                    <input type="radio" id="q3" name="q3" value="4">
                    <label>4.มาก</label><br>
                    <input type="radio" id="q3" name="q3" checked value="5">
                    <label>5.มากที่สุด</label><br>
                    </div>
                    </div>
                    
                  
                    
                  </div>
                  <div class="row">
                  <h3>4.การติดต่อสื่อสาร สะดวก รวดเร็ว</h3>
                    <div class="col-lg-12">
                    <div class="form-group">
                    <input type="radio" id="q4" name="q4" value="1">
                    <label>1.น้อยที่สุด</label><br>
                    <input type="radio" id="q4" name="q4" value="2">
                    <label>2.น้อย</label><br>
                    <input type="radio" id="q4" name="q4" value="3">
                    <label>3.ปานกลาง</label><br>
                    <input type="radio" id="q4" name="q4" value="4">
                    <label>4.มาก</label><br>
                    <input type="radio" id="q4" name="q4" checked value="5">
                    <label>5.มากที่สุด</label><br>
                    </div>
                    </div>
                    
                  
                    
                  </div>
                  <div class="row">
                  <h3>5.ความพึงพอใจต่อการให้บริการในภาพรวม</h3>
                    <div class="col-lg-12">
                    <div class="form-group">
                    <input type="radio" id="q5" name="q5" value="1">
                    <label>1.น้อยที่สุด</label><br>
                    <input type="radio" id="q5" name="q5" value="2">
                    <label>2.น้อย</label><br>
                    <input type="radio" id="q5" name="q5" value="3">
                    <label>3.ปานกลาง</label><br>
                    <input type="radio" id="q5" name="q5" value="4">
                    <label>4.มาก</label><br>
                    <input type="radio" id="q5" name="q5" checked value="5">
                    <label>5.มากที่สุด</label><br>
                    </div>
                    </div>
                    
                  
                    
                  </div>
                  
                  
                  
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                      <h3>ข้อเสนอแนะ</h3>
                        <input type="textarea" id="sugguestion" name="sugguestion" class="form-control" placeholder="ข้อเสนอแนะ">
                      </div>
                    </div>

                  </div>


                </div>
                <center><button type="submit" name="insert" class="btn btn-success">จบการตอบคำถาม</button></center>
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
