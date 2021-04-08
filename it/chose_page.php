<?php
    session_start();
    include_once('function.php');

    $userdata = new DB_con();

    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = $userdata->login($username, $password);
        $num = mysqli_fetch_array($result);

        if ($num > 0) {
            $_SESSION['username'] = $num['username'];
            $_SESSION['section'] = $num['section'];
            $_SESSION['level'] = $num['level'];
            
            //echo "<script>alert('Login Successful!');</script>";
            if($num['section']=='it'){
              echo "<script>window.location.href='it_page.php'</script>";
            }elseif($num['level']=='admin'){
              echo "<script>window.location.href='admin_page.php'</script>";
            }elseif($num['level']=='hr'){
              echo "<script>window.location.href='hr_page.php'</script>";
            }else{
              echo "<script>window.location.href='user_page.php'</script>";
            }
        } else {

          echo "<script>alert('Something went wrong! Please try again.');</script>";
          echo "<script>window.location.href='index.php'</script>";
        }
    }

?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <html>
    <head>
      <script type="text/javascript" src="list.js "></script>
      <link rel="stylesheet" href="style.css">

        <div class="wrapper">
          <div class="container">
            <h1>เลือกฝ่ายแจ้งซ่อม</h1>
            <center><button type="submit" name="approve" onClick="return confirm('งานเรียบร้อยแล้วใช่หรือไม่?');" class="btn btn-success">กดอนุมัติเพื่อปิดงานซ่อม</button></center>
            

          </div>
        </div>

    </head>
    </html>


  </body>
</html>
