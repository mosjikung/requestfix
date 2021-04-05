<?php
session_start();
include_once('../it/function.php');
$alldata = new DB_CON();
    $fix_stat = "end work";
    $user_app = '';
    $case_id = $_GET['case_id'];

    $result = $alldata->showreport($fix_stat,$user_app,$case_id);
 ?>
 <?php
  include_once ('../it/function.php');
  $user_show_list2 = new DB_CON();
  $username = $_SESSION['username'];
  $fix_stat = 'working';
  $fix_stat2 = '';
  $user_app = '';
  $result3 = $user_show_list2->usershowlist($username,$user_app,$fix_stat,$fix_stat2);
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
            <div class = "row">
            <div class = "col-12">
            <h5 class="text-right">F-IT-003 R04</h5>
            </div>
            </div>
              <div class="row align-items-center">
                <div class="col-12">
                  <h3 class="text-center">ใบแจ้งซ่อมฝ่าย IT</h3>
                </div>
             

                
               
              </div>
            </div>
            <?php
            while($objResult=mysqli_fetch_array($result)){
               ?>
            
            <div class="card-body">
            <div class="row">
        <div class="col-12 text-right">
            วันที่ :<input value="<?php  echo $objResult['crt_date'];?>" disabled></input>เวลา<input value="<?php  echo $objResult['crt_time'];?>" disabled></input>
        </div>
        </div>
        <br>
              <form name='form1' method="post">
                
                <div class="pl-lg-4">
                
                  <div class="row">
                  
                    <div class="col-lg-6">
                    <h6 class="heading-small text-muted mb-4">ผู้แจ้งซ่อม</h6>
                    <div class="form-group">
                    <input type="text" class="form-control" name="other" id="other" value="<?php  echo $objResult['username'];?>" disabled>
                    </div>
                    </div>
                    
                    <div class="col-lg-6">
                    <h6 class="heading-small text-muted mb-4">ฝ่ายแผนก</h6>
                    <div class="form-group">

                      <input type="text" class="form-control" name="other" id="other" value="<?php  echo $objResult['section'];?>" disabled>
                      </div>
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                    <h6 class="heading-small text-muted mb-4">อุปกรณ์การซ่อม</h6>
                      <div class="form-group">

                        <input type="textarea" id="problem" name="problem" class="form-control" value="<?php  echo $objResult['about'];?>" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                    <h6 class="heading-small text-muted mb-4">หมายเลขเครื่อง</h6>
                    <div class="form-group">

                    <input type="text" id="number" name="number" class="form-control" value="<?php  echo $objResult['number'];?>" disabled>
                    </div>
                    </div>

                  </div>
                  <div class="row">


                  <div class="col-lg-12">

                      <div class="form-group">
                        <label class="form-control-label">อาการ</label>
                        <input type="text" id="number" name="number" class="form-control" value="<?php  echo $objResult['problem'];?>" disabled>
                      </div>
                    </div>
                  </div>
                  <div class="row">


                  <div class="col-lg-12">

                      <div class="form-group">
                        <label class="form-control-label">หมายเหตุ</label>
                        <textarea class="form-control" cols="" rows="" value="<?php echo $objResult['notice'];?>"><?php echo $objResult['notice'];?></textarea>
                      </div>
                    </div>
                  </div>
                  


                </div>
            
              </form>
              <div class="row">
              <div class="col-xl-6">
        <div calss= "row">
        <div class="col-md-12">
        <h6 class="heading-small text-muted mb-4">สรุปผลดำเนินการซ่อม</h6>
        <input type="text" id="number" name="number" class="form-control" value="<?php  echo $objResult['can_fix'];?>" disabled>
        </div>
       
        </div>
        <br>
        
        <div calss= "row">
        <div class="col-md-12">
        <h6 class="heading-small text-muted mb-4">อุปกรณ์ที่เปลี่ยน</h6>
        <input type="text" id="number" name="number" class="form-control" value="<?php  echo $objResult['item'];?>" disabled>
        </div>
        
        </div>
        <br>
        <div calss= "row">
        <div class="col-md-12">
        <h6 class="heading-small text-muted mb-4">ผู้แก้ไข</h6>
        <input type="text" id="number" name="number" class="form-control" value="<?php  echo $objResult['ac_name'];?>" disabled>
        </div>
       
        </div>
        <br>
        <div calss= "row">
        <div class="col-md-12">
        <h6 class="heading-small text-muted mb-4">Serial Number</h6>
        <input type="text" id="number" name="number" class="form-control" value="<?php  echo $objResult['s_item'];?>" disabled>
        </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="row">
        <div class="col-md-12">
        <h6 class="heading-small text-muted mb-4">เสนอผู้จัดการฝ่ายคอมพิวเตอร์เพื่อขอซ่อมภายนอก</h6>
        <input type="text" id="number" name="number" class="form-control" value="<?php  echo $objResult['mgr_app'];?>" disabled> <br>
        </div>
       
        
        <div class="col-md-12">
        <h6 class="heading-small text-muted mb-4">สถานะการซ่อมล่าสุด</h6>
        <input type="text" id="number" name="number" class="form-control" placeholder="หมายเลขเครื่อง"><br>
        </div>
        </div>

        <div class="row">
        <div class="col-md-12">
        <h6 class="heading-small text-muted mb-4">บันทึกส่งซ่อมภายนอก</h6>
        <input type="text" id="number" name="number" class="form-control" placeholder="หมายเลขเครื่อง"> <br>
        </div>
       
        
        <div class="col-md-12">
        <h6 class="heading-small text-muted mb-4">สถานะการตอบรับของผู้แจ้ง</h6>
        <input type="text" id="number" name="number" class="form-control" placeholder="หมายเลขเครื่อง"><br>
        </div>
        </div>

        </div>
        </div>
        </div>
            </div>
          </div>
        </div>
      </div>

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
