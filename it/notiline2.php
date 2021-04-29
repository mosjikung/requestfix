<?php
include_once('connect.php');
$strSQL = "SELECT * FROM fix_it where case_id = '".$case_id."'";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult2 = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
$username = $objResult2['username'];
$about = $objResult2['about'];
$problem = $objResult2['problem'];
$crt_time = $objResult2['crt_time'];
$str = "แจ้งการรับงาน ="."ID : $case_id From : $username
แจ้งซ่อมเกี่ยวกับ : $about อาการ : $problem
ผู้รับผิดชอบ : $ac_name 
วันและเวลาที่รับงาน : $last_update : $time_update";
$chOne = curl_init();
curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
// SSL USE
curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0);
//POST
curl_setopt( $chOne, CURLOPT_POST, 1);
// Message
curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=ระบบอัตโนมัติ.$str");
//ถ้าต้องการใส่รุป ให้ใส่ 2 parameter imageThumbnail และimageFullsize
//curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=hi&imageThumbnail=http://www.wisadev.com/wp-content/uploads/2016/08/cropped-wisadevLogo.png&imageFullsize=http://www.wisadev.com/wp-content/uploads/2016/08/cropped-wisadevLogo.png");
// follow redirects
curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);
//ADD header array
$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer wcVag3tEvdSJi9KAgTl0fsowWT2URlU75zZpRL1rFYY', );
curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);
//RETURN
curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec( $chOne );
//Check error
if(curl_error($chOne)) { echo 'error:' . curl_error($chOne); }
else { $result_ = json_decode($result, true);
echo "status : ".$result_['status']; echo "message : ". $result_['message']; }
//Close connect
curl_close( $chOne );
?>