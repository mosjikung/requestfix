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
            $_SESSION['company'] = $num['company'];
            $_SESSION['level'] = $num['level'];
            $_SESSION['level_job'] = $num['level_job'];
            $_SESSION['nameen'] = $num['nameen'];
            $_SESSION['surnameen'] = $num['surnameen'];
            $_SESSION['leader1'] = $num['leader1']; 

            
    setcookie("username",$username,time()+3600*24*356);
    setcookie("password",$password,time()+3600*24*356);
  
            echo "<script>window.location.href='second_page.php'</script>";
            //echo "<script>alert('Login Successful!');</script>";
            //if($num['section']=='it'){
              //echo "<script>window.location.href='it_page.php'</script>";
            //}elseif($num['level']=='admin'){
              //echo "<script>window.location.href='admin_page.php'</script>";
            //}elseif($num['level']=='hr' && $nun['level_job']=='ผู้จัดการ'){
              //echo "<script>window.location.href='hr_mgr_page.php'</script>";
            //}elseif($num['level']=='hr'){
              //echo "<script>window.location.href='hr_page.php'</script>";
            //}elseif($num['section']=='ma'){
              //echo "<script>window.location.href='ma_page.php'</script>";
            //}else{
              //echo "<script>window.location.href='user_page.php'</script>";
            //}
        } else {

          echo "<script>alert('Something went wrong! Please try again.');</script>";
          echo "<script>window.location.href='index.php'</script>";
        }
    }

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
            <h1>ลงทะเบียน</h1>
            <form name="form1" method="post" >
                <input type = "text" name="username" id="username" placeholder="ใส่username"></input>
                <input type="password" name="password" id ="password" placeholder="password"></input>
                <button type="submit" name="login">submit</button>
            </form>
              <center><h7>สำหรับพนักงานใหม่<a href='../requestfix/it/re_action.php'>ลงทะเบียน<h7></center>
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
