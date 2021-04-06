<?php
session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Request Fix</title>
  </head>
  <body>
    <html>
    <head>
    
      <script type="text/javascript" src="list.js "></script>
      <link rel="stylesheet" href="style.css">

      <?php
      if($_SESSION['section']=='it'){
      ?>

        <div class="wrapper">
          <div class="container">
            <h1>เลือกหัวข้อใช้บริการ</h1>
            

                <form method="get" action="it/re_action.php">
                <button type="submit">ขอสิทธิ์การใช้งาน</button>
                </form>
                <form method="get" action="it/re_fix.php">
                <button type="submit" name="computer" id="computer" value="ใบแจ้งซ่อม">ใบแจ้งซ่อม</button>
               
                </form> <form method="get" action="it/it_page.php">
                <button type="submit" name="it" id="it">it_page</button>
                </form>
              
           <?php
      }elseif($_SESSION['level']=='user'){
        ?>
          <div class="wrapper">
          <div class="container">
            <h1>เลือกหัวข้อใช้บริการ</h1>
            

                <form method="get" action="it/re_action.php">
                <button type="submit">ขอสิทธิ์การใช้งาน</button>
                </form>
                <form method="get" action="it/re_fix.php">
                <button type="submit" name="computer" id="computer" value="ใบแจ้งซ่อม">ใบแจ้งซ่อม</button>
                </form> <form method="get" action="it/user_page.php">
                <button type="submit" name="user" id="user">Main Page</button>
                </form>
      
    
      <?php
      
      }elseif($_SESSION['level']=='leader'){
        ?>
          <div class="wrapper">
          <div class="container">
            <h1>เลือกหัวข้อใช้บริการ</h1>
            
            <form method="get" action="it/re_action.php">
                <button type="submit">ขอสิทธิ์การใช้งาน</button>
                </form>
                <form method="get" action="it/re_fix.php">
                <button type="submit" name="computer" id="computer" value="ใบแจ้งซ่อม">ใบแจ้งซ่อม</button>
                </form> <form method="get" action="it/leader_page.php">
                <button type="submit" name="user" id="user">Main page</button>
                </form>
      
    
      <?php
      }elseif($_SESSION['section']=='hr'){
        ?>
          <div class="wrapper">
          <div class="container">
            <h1>เลือกหัวข้อใช้บริการ</h1>
            

            <form method="get" action="it/re_action.php">
                <button type="submit">ขอสิทธิ์การใช้งาน</button>
                </form>
                <form method="get" action="it/re_fix.php">
                <button type="submit" name="computer" id="computer" value="ใบแจ้งซ่อม">ใบแจ้งซ่อม</button>
                </form> 
                <form method="get" action="it/hr_page.php">
                <button type="submit" name="user" id="user">Main Page</button>
                </form>
      
    
      <?php
      }elseif($_SESSION['level_job']=='ผู้จัดการ'){
        ?>
          <div class="wrapper">
          <div class="container">
            <h1>เลือกหัวข้อใช้บริการ</h1>
            

               <form method="get" action="it/re_action.php">
                <button type="submit">ขอสิทธิ์การใช้งาน</button>
                </form>
                <form method="get" action="it/re_fix.php">
                <button type="submit" name="computer" id="computer" value="ใบแจ้งซ่อม">ใบแจ้งซ่อม</button>
                </form> <form method="get" action="it/mgr_page.php">
                <button type="submit" name="user" id="user">Main Page</button>
                </form>
      
    
      <?php
      }
           ?>
              <ul class="bg-bubbles">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>

        </ul> 

          </div>
        </div>
      
       
    </head>
    </html>


  </body>
</html>
