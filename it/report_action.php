<?php
session_start();
error_reporting(1);
include_once('function_ac.php');
$showalldetail =  new DB_CONZ();
$per_id = $_GET['per_id'];

$result = $showalldetail->showdetail($per_id);
 ?>
<?php
  include_once ('function.php');
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
                  
                  <?php
            while($objResult=mysqli_fetch_array($result)){
               ?>
                  
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
                          <option class="hidden"  value="<?php echo $objResult['action'];?>"  selected ><?php echo $objResult['action'];?></option>

                          <option value="Add New User">Add New User</option>
                          <option value="Modify Existing User">Modify Existing User</option>
                          <option value="Delete Existing User">Delete Existing User</option>
                          <option value="Special Permissions">Special Permissions</option>


                      </select>
                    </div>
                </div>
                    <div class="col-lg-6">
                      <div class="form-group">

                        <input type="text" id="strdate" name="strdate" class="form-control" value="<?php echo $objResult['strdate'];?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                 
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label">Name</label>

                        <input type="text" id="name" name="name" class="form-control" readonly="readonly" value = "<?php echo $objResult['username'];?>">
                      </div>
                    </div>
                    
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label">Surname</label>

                        <input type="text" id="surename" name="surname" class="form-control" readonly="readonly" value = "<?php echo $objResult['surname'];?>">
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label">Account ID</label>
                        <input type="text" id="account_id" name="account_id" class="form-control" readonly="readonly" value = "<?php echo $objResult['name'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label class="form-control-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" value = "<?php echo $objResult['password'];?>">
                      </div>
                    </div>

                  </div>
                  <div class="row">


                  <div class="col-lg-6">

                      <div class="form-group">
                        <label class="form-control-label">Emailภายใน</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?php echo $objResult['email'];?>">
                      </div>
                    </div>
                    <div class="col-lg-6">

                      <div class="form-group">
                        <label class="form-control-label">Emailภายนอก</label>
                        <input type="text" id="emailex" name="emailex" class="form-control" value="<?php echo $objResult['emailex'];?>">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">


                  <div class="col-lg-8">

                      <div class="form-group">
                        <label class="form-control-label">Security & Authorize</label>
                        <input type="text" id="file1" name="file1" class="form-control" value="<?php echo $objResult['file1'];?>">
                      </div>
                    </div>
                    <div class="col-lg-4">

                      <div class="form-group">
                        
                      <label class="form-control-label">Please Chose one</label><br>
                      <?php
                        if($objResult['per_r1']!=''){
                      ?>
                        <input type="checkbox" name="per_r1" value="read" checked>Read </input>&nbsp;&nbsp;
                        <?php
                        }else{
                            ?>
                            <input type="checkbox" name="per_r1" value="read" >Read </input>&nbsp;&nbsp;
                        <?php                    
                        }
                        ?>
                        <?php
                        if($objResult['per_wr1']!=''){
                        ?>
                        <input type="checkbox" name="per_wr1" value="write" checked>write </input>&nbsp;&nbsp;
                        <?php
                        }else{
                            ?>
                        <input type="checkbox" name="per_wr1" value="write">write </input>&nbsp;&nbsp;
                        <?php                    
                        }
                        ?>
                        <?php
                        if($objResult['per_mo1']!=''){
                        ?>
                        <input type="checkbox" name="per_mo1" value="modify" checked>Modify </input>&nbsp;&nbsp;
                        <?php
                        }else{
                        ?>
                        <input type="checkbox" name="per_mo1" value="modify">Modify </input>&nbsp;&nbsp;
                        <?php                    
                        }
                        ?>
                      </div>
                    </div>
                  
                   
                  </div>
                  <div class="row">


                  <div class="col-lg-8">

                      <div class="form-group">
                        
                        <input type="text" id="file2" name="file2" class="form-control" value="<?php echo $objResult['file2'];?>">
                      </div>
                    </div>
                    <div class="col-lg-4">

                      <div class="form-group">
                        
                      
                      <?php
                        if($objResult['per_r2']!=''){
                      ?>
                        <input type="checkbox" name="per_r2" value="read" checked>Read </input>&nbsp;&nbsp;
                        <?php
                        }else{
                            ?>
                            <input type="checkbox" name="per_r2" value="read" >Read </input>&nbsp;&nbsp;
                        <?php                    
                        }
                        ?>
                        <?php
                        if($objResult['per_wr2']!=''){
                        ?>
                        <input type="checkbox" name="per_wr2" value="write" checked>write </input>&nbsp;&nbsp;
                        <?php
                        }else{
                            ?>
                        <input type="checkbox" name="per_wr2" value="write">write </input>&nbsp;&nbsp;
                        <?php                    
                        }
                        ?>
                        <?php
                        if($objResult['per_mo2']!=''){
                        ?>
                        <input type="checkbox" name="per_mo2" value="modify" checked>Modify </input>&nbsp;&nbsp;
                        <?php
                        }else{
                        ?>
                        <input type="checkbox" name="per_mo2" value="modify">Modify </input>&nbsp;&nbsp;
                        <?php                    
                        }
                        ?>
                        
                      </div>
                    </div>
                  </div>

                  <div class="row">


                    <div class="col-lg-8">

                <div class="form-group">
                
                <input type="text" id="file3" name="file3" class="form-control" value="<?php echo $objResult['file3'];?>">
                </div>
            </div>
            <div class="col-lg-4">

                      <div class="form-group">
                        
                      <?php
                        if($objResult['per_r3']!=''){
                      ?>
                        <input type="checkbox" name="per_r3" value="read" checked>Read </input>&nbsp;&nbsp;
                        <?php
                        }else{
                            ?>
                            <input type="checkbox" name="per_r3" value="read" >Read </input>&nbsp;&nbsp;
                        <?php                    
                        }
                        ?>
                        <?php
                        if($objResult['per_wr3']!=''){
                        ?>
                        <input type="checkbox" name="per_wr3" value="write" checked>write </input>&nbsp;&nbsp;
                        <?php
                        }else{
                            ?>
                        <input type="checkbox" name="per_wr3" value="write">write </input>&nbsp;&nbsp;
                        <?php                    
                        }
                        ?>
                        <?php
                        if($objResult['per_mo3']!=''){
                        ?>
                        <input type="checkbox" name="per_mo3" value="modify" checked>Modify </input>&nbsp;&nbsp;
                        <?php
                        }else{
                        ?>
                        <input type="checkbox" name="per_mo3" value="modify">Modify </input>&nbsp;&nbsp;
                        <?php                    
                        }
                        ?>
                        
                      </div>
                    </div>
            </div>

            <div class="row">


                  <div class="col-lg-8">

                      <div class="form-group">
                       
                        <input type="text" id="file4" name="file4" class="form-control" value="<?php echo $objResult['file4'];?>">
                      </div>
                    </div>
                    <div class="col-lg-4">

                      <div class="form-group">
                        
                      
                      <?php
                        if($objResult['per_r4']!=''){
                      ?>
                        <input type="checkbox" name="per_r4" value="read" checked>Read </input>&nbsp;&nbsp;
                        <?php
                        }else{
                            ?>
                            <input type="checkbox" name="per_r4" value="read" >Read </input>&nbsp;&nbsp;
                        <?php                    
                        }
                        ?>
                        <?php
                        if($objResult['per_wr4']!=''){
                        ?>
                        <input type="checkbox" name="per_wr4" value="write" checked>write </input>&nbsp;&nbsp;
                        <?php
                        }else{
                            ?>
                        <input type="checkbox" name="per_wr4" value="write">write </input>&nbsp;&nbsp;
                        <?php                    
                        }
                        ?>
                        <?php
                        if($objResult['per_mo4']!=''){
                        ?>
                        <input type="checkbox" name="per_mo4" value="modify" checked>Modify </input>&nbsp;&nbsp;
                        <?php
                        }else{
                        ?>
                        <input type="checkbox" name="per_mo4" value="modify">Modify </input>&nbsp;&nbsp;
                        <?php                    
                        }
                        ?>
                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-8">
                    <div class="form-group">
                    <input class="form-control" type="text"  name="approve" id="approve" value="<?php echo $objResult['mgr_app'];?>"></input>
                    </div>
                </div>
                </div>




                </div>
               
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      ?>

    
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
