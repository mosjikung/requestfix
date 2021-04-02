<?php
$strSQL = "UPDATE permiss SET action = 'Add New User' , password = 'vkwidkovjt55' , email = 'mosjikung@gmail.com' , emailex = 'it.suppport@nutrition.co.th', file1 = 'test1' , per_r1 = 'read' , per_wr1 = 'write' , per_mo1 = '' , file2 = 'test2' , per_r2 = 'read' , per_wr2 = '' , per_mo2 = 'modify', file3 = 'test3' , per_r3 = 'read' , per_wr3 = 'write' , per_mo3 = 'modify' , file4 = 'folder' , per_r4 = 'read' , per_wr4 = '' , per_mo4 = '', leader_app = 'approve' , strdate = '2013-01-01' where per_id = '7'";
$objQuery=
if($result2){
    echo "<script>alert('บันทึกสำเร็จ');</script>";
    echo "<script>window.location.href='app_action.php'</script>";
}else{
    echo "<script>alert('พบข้อผิดพลาด');</script>";
    echo "<script>window.location.href='app_action.php'</script>";
}
?>