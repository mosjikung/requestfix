<?php
session_start();
error_reporting(0);
include_once('function_ac.php');
$insert_data =  new DB_CONZ();
$username = $_SESSION['username'];
$company  = $_SESSION['company'];
$section = $_SESSION['section'];
date_default_timezone_set("Asia/Bangkok");
$crt_time = date('Y-m-d');
$leader1 = $_SESSION['leader1'];

if(isset($_POST['insert'])){
  $action = $_POST['action'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $account_id = $_POST['account_id'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $emailex = $_POST['emailex'];
  $file1 = $_POST['file1'];
  $per_r1 = $_POST['per_r1'];
  $per_wr1 = $_POST['per_wr1'];
  $per_mo1 = $_POST['per_mo1'];
  $file2 = $_POST['file2'];
  $per_r2 = $_POST['per_r2'];
  $per_wr2 = $_POST['per_wr2'];
  $per_mo2 = $_POST['per_mo2'];
  $file3 = $_POST['file3'];
  $per_r3 = $_POST['per_r3'];
  $per_wr3 = $_POST['per_wr3'];
  $per_mo3 = $_POST['per_mo3'];
  $file4 = $_POST['file4'];
  $per_r4 = $_POST['per_r4'];
  $per_wr4 = $_POST['per_wr4'];
  $per_mo4 = $_POST['per_mo4'];
  $strdate = $_POST['strdate'];

  $result = $insert_data->insertaction($username,$company,$section,$action,$name,$surname,$account_id,$password,$email,$emailex,$file1,$per_r1,
  $per_wr1,$per_mo1,$file2,$per_r2,$per_wr2,$per_mo2,$file3,$per_r3,$per_wr3,$per_mo3,$file4,$per_r4,$per_wr4
  ,$per_mo4,$leader1,$strdate,$crt_time);
 if($result){
   echo "<script>alert('บันทึกสำเร็จ')</script>";
   echo "<script>window.location.href='re_action.php'</script>";
 }else{
   echo "<script>alert('บันทึกสำเร็จ')</script>";
   echo "<script>window.location.href='re_action.php'</script>";
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

<body> olo
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
    <?php ?>
    <!-- Page content -->
    <div class="container-fluid mt--12">
      <div class="row">
        <div class="col-xl-4 order-xl-2">
          <div class="card card-profile">
            <img src="assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
            <div class="row justify-content-center">
              <div class="col-lg-12 order-lg-12">
                <div class="card-profile-image">

                  <h3>คำชี้แจ้ง</h3>

                </div>
              </div>
            </div>

            <div class="card-body pt-0">
              <div class="row">
                <div class="col">
                  
                  <label>1.ท่านสามารถใช้ Account ID และ Password เพื่อเข้าสู่ระบบในส่วนที่กำหนดไว้ให้เท่านั้น</label><br>
                  <label>2.Password เป็นข้อมูลส่วนบุคคลที่ท่านจะต้องปกปิดไว้ โดยมิเปิดเผยให้ผู้อื่นรับทราบ และไม่ควรจดบันทึกไว้ในเอกสารหรือบันทึกที่ผู้อื่นสามารถพบเห็นได้สะดวก password จะต้องทำการเปลี่ยน password ทุกๆ 90 วัน</label><br>
                  <label>3.หากมีข้อสงสัยหรือพบปัญหาใดๆ เกี่ยวกับสิทธิ์การเข้าถึงข้อมูลกรุณาติดต่อฝ่ายคอมพิวเตอร์โดยทันที</label><br>
                  <label>4.หากพบว่าโปรแกรมมีปัญหา สามารถแจ้งได้ที่เบอร์3777 หรือline it support nt group</label><br>
                  <center><label><img src="image/qr_code.jpg" alt="qr_code" width="100%" height="100%"></label></center>
                  

                  
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
                  <h3 class="mb-0">แบบฟอร์มขอบัญชีชื่อผู้ใช้</h3>
                </div>
                <div class="col-4 text-right">

                </div>
              </div>
            </div>
            <div class="card-body">
              <form name='form1' method="post">
                <h6 class="heading-small text-muted mb-4">โปรดใส่ข้อมูลให้ครบ</h6>
                <div class="pl-lg-4">
                <form name = "form1" method = "post">
                  <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <select class="form-control" name="action" id="action">
                          <option class="hidden"  value=""  selected disabled>Request Action</option>

                          <option value="Add New User">Add New User</option>
                          <option value="Modify Existing User">Modify Existing User</option>
                          <option value="Delete Existing User">Delete Existing User</option>
                          <option value="Special Permissions">Special Permissions</option>


                      </select>
                    </div>
                </div>
                    <div class="col-lg-6">
                      <div class="form-group">

                        <input type="date" id="strdate" name="strdate" class="form-control" placeholder="วันที่ Request">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                 
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label">Name</label>

                        <input type="text" id="name" name="name" class="form-control" value = "<?php echo $_SESSION['nameen'];?>">
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label">Surname</label>

                        <input type="text" id="surename" name="surname" class="form-control" value = "<?php echo $_SESSION['surnameen'];?>">
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label">Account ID</label>
                        <input type="text" id="account_id" name="account_id" class="form-control" value = "<?php echo $_SESSION['nameen'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="password">
                      </div>
                    </div>

                  </div>
                  <div class="row">


                  <div class="col-lg-6">

                      <div class="form-group">
                        <label class="form-control-label">Emailภายใน</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Emailภายใน">
                      </div>
                    </div>
                    <div class="col-lg-6">

                      <div class="form-group">
                        <label class="form-control-label">Emailภายนอก</label>
                        <input type="text" id="emailex" name="emailex" class="form-control" placeholder="Emailภายนอก">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">


                  <div class="col-lg-8">

                      <div class="form-group">
                        <label class="form-control-label">Security & Authorize</label>
                        <input type="text" id="file1" name="file1" class="form-control" placeholder="1.">
                      </div>
                    </div>
                    <div class="col-lg-4">

                      <div class="form-group">
                        
                      <label class="form-control-label">Please Chose one</label><br>
                        <input type="checkbox" name="per_r1" value="read">Read </input>&nbsp;&nbsp;
                        <input type="checkbox" name="per_wr1" value="write">write </input>&nbsp;&nbsp;
                        <input type="checkbox" name="per_mo1" value="modify">Modify </input>&nbsp;&nbsp;
                        
                      </div>
                    </div>
                  
                   
                  </div>
                  <div class="row">


                  <div class="col-lg-8">

                      <div class="form-group">
                        
                        <input type="text" id="file2" name="file2" class="form-control" placeholder="2.">
                      </div>
                    </div>
                    <div class="col-lg-4">

                      <div class="form-group">
                        
                      
                        <input type="checkbox" name="per_r2" value="read">Read </input>&nbsp;&nbsp;
                        <input type="checkbox" name="per_wr2" value="write">write </input>&nbsp;&nbsp;
                        <input type="checkbox" name="per_mo2" value="modify">Modify </input>&nbsp;&nbsp;
                        
                      </div>
                    </div>
                  </div>

                  <div class="row">


                    <div class="col-lg-8">

                <div class="form-group">
                
                <input type="text" id="file3" name="file3" class="form-control" placeholder="3.">
                </div>
            </div>
            <div class="col-lg-4">

                      <div class="form-group">
                        
                      
                        <input type="checkbox" name="per_r3" value="read">Read </input>&nbsp;&nbsp;
                        <input type="checkbox" name="per_wr3" value="write">write </input>&nbsp;&nbsp;
                        <input type="checkbox" name="per_mo3" value="modify">Modify </input>&nbsp;&nbsp;
                        
                      </div>
                    </div>
            </div>

            <div class="row">


                  <div class="col-lg-8">

                      <div class="form-group">
                       
                        <input type="text" id="file4" name="file4" class="form-control" placeholder="4.">
                      </div>
                    </div>
                    <div class="col-lg-4">

                      <div class="form-group">
                        
                      
                        <input type="checkbox" name="per_r4" value="read">Read </input>&nbsp;&nbsp;
                        <input type="checkbox" name="per_wr4" value="write">write </input>&nbsp;&nbsp;
                        <input type="checkbox" name="per_mo4" value="modify">Modify </input>&nbsp;&nbsp;
                        
                      </div>
                    </div>
                  </div>




                </div>
                <center><button type="submit" name="insert" id="insert" class="btn btn-success">ส่งคำร้อง</button></center>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
     <center> <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="https://www.nutritionsc.co.th" class="font-weight-bold ml-1" target="_blank">nutritionsc</a>
            </div>
          </div>

        </div>
      </footer> </center>
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
