<?php
session_start();
include_once('function.php');
$insertdata = new DB_CON();
$username = $_SESSION['username'];
$section = $_SESSION['section'];
date_default_timezone_set("Asia/Bangkok");
$crt_time = date('Y-m-d');
$crt_date = date('H:i:s');
$last_update = date('Y-m-d H:i:s');
$who_update = $_SESSION['username'];


if (isset($_POST['insert'])) {
    if($_POST['action']!=="otherx"){
    $about = $_POST['action'];
    $problem = $_POST['problem'];
    $number = $_POST['number'];
    $notice = $_POST['notice'];
    $status = '0';


    $sql = $insertdata->insertfixit($username, $section, $about, $problem, $number,$notice,$crt_date,$crt_time,$status,$last_update,$who_update);
   

    if ($sql) {
      echo "<script>alert('Record Inserted Successfully!');</script>";
      echo "<script>window.location.href='../it/re_fix.php'</script>";
    } else {
      echo "<script>alert('Something went wrong! Please try again!');</script>";
     echo "<script>window.location.href='../it/re_fix.php'</script>";
   }
    }else{
      
        $about = $_POST['other'];
        $problem = $_POST['problem'];
        $number = $_POST['number'];
        $notice = $_POST['notice'];
        $status = '0';
    
    
        $sql = $insertdata->insertfixit($username, $section, $about, $problem, $number,$notice,$crt_date,$crt_time,$status,$last_update,$who_update);
        if ($sql) {
          echo "<script>alert('Record Inserted Successfully!');</script>";
          echo "<script>window.location.href='../it/re_fix.php'</script>";
        } else {
          echo "<script>alert('Something went wrong! Please try again!');</script>";
         echo "<script>window.location.href='../it/re_fix.php'</script>";
       }
    }
}
 ?>
 <?php
  require_once('function.php');
  $notti_user = new DB_CON();
  $username = $_SESSION['username'];
  $fix_stat = '';
  $ac_name = '';
  $result3  = $notti_user->nottification_user($username,$fix_stat,$ac_name);
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
                  <h3 class="mb-0">ใบแจ้งซ่อมฝ่าย IT</h3>
                </div>
                <div class="col-4 text-right">

                </div>
              </div>
            </div>
            
            <div class="card-body">
              <form name='form1' method="post">
                <h6 class="heading-small text-muted mb-4">โปรดใส่ข้อมูลให้ครบ</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                     <select class="form-control" name="action" id="action" onchange= "myfunction()">
                     <option class="hidden"  value=""  selected >Request Action</option>

                    <option value="computer">Computer</option>
                    <option value="lan">Lan</option>
                    <option value="printer">printer</option>
                    <option value="email">Email</option>
                    <option value="ERP">ERP</option>
                    <option value="ใบลา">ใบลา</option>
                    <option value="Program">Program อื่นๆ</option>
                    <option value="otherx">other</option>
                    
                   
                    </select>
                    </div>
                    </div>
                    <script>

                      function myfunction(){
                      var x = document.getElementById("action").value;
                      if(x=="computer"){
                          alert('ตรวจสอบว่าปลั๊กเสียบอยู่หรือไม่');
                          
                      }else if(x=="lan"){
                          alert('ตรวจดูสถานะการทำงานรูปคอมพิวเตอร์ทางด้านล่างขวาว่าเป็นรูป x หรือไม่');
                          
                      }else if(x=="printer"){
                          alert('checkสถานะใน control panel ว่าสถานะ printer offline หรือไม่');
                      
                      }else if(x=="Email"){
                          alert('check Internet ว่าสามารถใช้งานได้หรือไม่');
                      
                      }else if(x=="ERP"){
                          alert('check Internet ว่าสามารถใช้งานได้หรือไม่');
                      
                      }else if(x=="otherx"){
                          if(x=="otherx"){
                            document.getElementById('other').style.display='';
                            
                          }else{
                            document.getElementById('other').style.display='none';
                            
                          }
                      
                      }else{
                          alert('แจ้งที่3777');
                         
                      }
                      }
                      </script>
                    <div class="col-lg-6">
                    <div class="form-group">

                      <input type="text" class="form-control" name="other" id="other" style="display:none;" placeholder="ใส่ประเภท">
                      </div>
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">

                        <input type="textarea" id="problem" name="problem" class="form-control" placeholder="อาการเสียที่พบ">
                      </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">

<input type="text" id="number" name="number" class="form-control" placeholder="หมายเลขเครื่อง">
</div>
                    </div>

                  </div>
                  <div class="row">


                  <div class="col-lg-12">

                      <div class="form-group">
                        <label class="form-control-label">หมายเหตุ</label>
                        <textarea rows="4" id="notice" name="notice" class="form-control" placeholder=""></textarea>
                      </div>
                    </div>
                  </div>


                </div>
                <center><button type="submit" name="insert" class="btn btn-success">Insert</button></center>
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
