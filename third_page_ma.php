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

        <div class="wrapper">
        <div class="container">
            <h1>เลือกหัวข้อใช้บริการ</h1>

        <?php
          if($_SESSION['section']=="ma"){
        ?>
            <form action="ma/re_ma.php">
                <button type="submit" >ใบแจ้งซ่อม</button>
                </form>
                <form action="ma/ma_page.php">
                <button type="submit" >หน้าหลัก</button>
                </form>
          <?php    
          }elseif($_SESSION['level']=="user"){
          ?>
                <form action="ma/re_ma.php">
                <button type="submit" >ใบแจ้งซ่อม</button>
                </form>
                <form action="ma/user_page.php">
                <button type="submit" >หน้าหลัก</button>
                </form>
          <?php
          }elseif($_SESSION['level']=="leader"){
            ?>
                  <form action="ma/re_ma.php">
                  <button type="submit" >ใบแจ้งซ่อม</button>
                  </form>
                  <form action="ma/leader_page.php">
                  <button type="submit" >หน้าหลัก</button>
                  </form>
            <?php
          }elseif($_SESSION['section']=="hr"){
              ?>
                    <form action="ma/re_ma.php">
                    <button type="submit" >ใบแจ้งซ่อม</button>
                    </form>
                    <form action="ma/hr_page.php">
                    <button type="submit" >หน้าหลัก</button>
                    </form>
          <?php
          }elseif($_SESSION['level_job']=="ผู้จัดการ"){
            ?>
                  <form action="ma/re_ma.php">
                  <button type="submit" >ใบแจ้งซ่อม</button>
                  </form>
                  <form action="ma/mgr_page.php">
                  <button type="submit" >หน้าหลัก</button>
                  </form>
        <?php
        }else{
          ?>
          <form action="ma/re_ma.php">
                <button type="submit" >ใบแจ้งซ่อม</button>
                </form>
                <form action="ma/user_page.php">
                <button type="submit" >หน้าหลัก</button>
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
