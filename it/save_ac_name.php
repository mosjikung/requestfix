<?php
session_start();
include "connect.php";
$fix_stat = 'working';


$strSQL = "UPDATE fix_it SET ac_name = '".$_SESSION['username']."', fix_stat = '".$fix_stat."' where case_id = '".$_GET['case_id']."'";
$objquery = mysqli_query($objCon,$strSQL);
  if($objquery)
    {
        echo "<script>alert('Updated Successfully!');</script>";
        echo "<script>window.location.href='it_page.php'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again!');</script>";
        echo "<script>window.location.href='it_page.php'</script>";
    }

 ?>
