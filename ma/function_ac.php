<?php
 define('DB_SERVER','localhost');
 define('DB_USER','root');
 define('DB_PASSWORD','');
 define('DB_NAME','leave');

  class DB_CONZ{
        function __construct(){
            $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
            $this->dbcon = $con; //เก็บตัวแปร $con ไว้ใน dbcon ใช้ทุกครั้งที่ query

            
        }
  public function insertaction($username,$company,$section,$action,$name,$surname,$account_id,$password,$email,$emailex,$file1,$per_r1,
  $per_wr1,$per_mo1,$file2,$per_r2,$per_wr2,$per_mo2,$file3,$per_r3,$per_wr3,$per_mo3,$file4,$per_r4,$per_wr4
  ,$per_mo4,$leader1,$strdate,$crt_time){ 

    
    echo "INSERT INTO permiss (username,company,section,action,name,surname,account_id,password,email,emailex,
    file1,per_r1,per_wr1,per_mo1,file2,per_r2,per_wr2,per_mo2,file3,per_r3,per_wr3,per_mo3,file4,per_r4,per_wr4,per_mo4,leader1,strdate,crt_time) values ('$username','$company','$section','$action','$name','$surname','$account_id','$password','$email','$emailex','$file1','$per_r1',
  '$per_wr1','$per_mo1','$file2','$per_r2','$per_wr2','$per_mo2','$file3','$per_r3','$per_wr3','$per_mo3','$file4','$per_r4','$per_wr4'
  ,'$per_mo4',$leader1,'$strdate','$crt_time')";

    $insertactionit = mysqli_query($this->dbcon,"INSERT INTO permiss (username,company,section,action,name,surname,account_id,password,email,emailex,
    file1,per_r1,per_wr1,per_mo1,file2,per_r2,per_wr2,per_mo2,file3,per_r3,per_wr3,per_mo3,file4,per_r4,per_wr4,per_mo4,leader1,strdate,crt_time) values ('$username','$company','$section','$action','$name','$surname','$account_id','$password','$email','$emailex','$file1','$per_r1',
  '$per_wr1','$per_mo1','$file2','$per_r2','$per_wr2','$per_mo2','$file3','$per_r3','$per_wr3','$per_mo3','$file4','$per_r4','$per_wr4'
  ,'$per_mo4','$leader1','$strdate','$crt_time')");
    return $insertactionit;
    
  }

  public function showalljob($status,$leader_app){
   //echo "SELECT * FROM permiss where status = '$status'";
    $showall = mysqli_query($this->dbcon,"SELECT * FROM permiss where status = '$status' and leader != '$leader_app'");

      return $showall;
  }
  
  public function selectjob($per_id,$status,$it_user){
      echo "UPDATE permiss SET status = '$status',it_user = '$it_user' where per_id = '$per_id'";
      $selectthisjob = mysqli_query($this->dbcon,"UPDATE permiss SET status = '$status',it_user = '$it_user' where per_id = '$per_id'");
      return $selectthisjob;
  }

  public function leaderapp($status,$leader1,$leader_app){

    echo "SELECT * FROM permiss where status = '$status' and leader1 = '$leader1' and leader_app = '$leader_app'";
    $leader_app = mysqli_query($this->dbcon,"SELECT * FROM permiss where status = '$status' and leader1 = '$leader1' and leader_app = '$leader_app'");
    return $leader_app;
  }

  public function showdetail($per_id){
    //echo "SELECT * FROM permiss where per_id = '$per_id'";
    $showalldetail = mysqli_query($this->dbcon,"SELECT * FROM permiss where per_id = '$per_id'");
    return $showalldetail;
  }

  public function updateall($per_id,$action,$password,$email,$emailex,$file1,$per_r1,
  $per_wr1,$per_mo1,$file2,$per_r2,$per_wr2,$per_mo2,$file3,$per_r3,$per_wr3,$per_mo3,$file4,$per_r4,$per_wr4
  ,$per_mo4,$leader_app,$strdate){
  
    echo "UPDATE permiss SET action = '$action' , password = '$password' , email = '$email' , emailex = '$emailex', 
    file1 = '$file1' , per_r1 = '$per_r1' , per_wr1 = '$per_wr1' , per_mo1 = '$per_mo1' , file2 = '$file2' , per_r2 = '$per_r2' , per_wr2 = '$per_wr2' , per_mo2 = '$per_mo2',
    file3 = '$file3' , per_r3 = '$per_r3' , per_wr3 = '$per_wr3' , per_mo3 = '$per_mo3' , file4 = '$file4' , per_r4 = '$per_r4' , per_wr4 = '$per_wr4' , per_mo4 = '$per_mo4',
    leader_app = '$leader_app' , strdate = '$strdate' where per_id = '$per_id'";

  $updateaccountall = mysqli_query($this->dbcon,"UPDATE permiss SET action = '$action' , password = '$password' , email = '$email' , emailex = '$emailex', 
  file1 = '$file1' , per_r1 = '$per_r1' , per_wr1 = '$per_wr1' , per_mo1 = '$per_mo1' , file2 = '$file2' , per_r2 = '$per_r2' , per_wr2 = '$per_wr2' , per_mo2 = '$per_mo2',
  file3 = '$file3' , per_r3 = '$per_r3' , per_wr3 = '$per_wr3' , per_mo3 = '$per_mo3' , file4 = '$file4' , per_r4 = '$per_r4' , per_wr4 = '$per_wr4' , per_mo4 = '$per_mo4',
  leader_app = '$leader_app' , strdate = '$strdate' where per_id = '$per_id'");
}
  public function approvemgr($username,$leader_app){
    $approve = mysqli_query($this->dbcon,"SELECT * FROM permiss where leader1 = '$username' and leader_app = '$leader_app'");
    return $approve;

  }

  public function check_action($leader_app,$leader1){

    $checkstat = mysqli_query($this->dbcon,"SELECT * FROM permiss where leader1 = '$leader1' and leader_app = '$leader_app'");
    return $checkstat;
  }
  
  public function insert_suggestion($username,$company,$section,$q1,$q2,$q3,$q4,$q5,$q6,$sugguestion,$about,$about2,$crt_date){
    

    echo "INSERT INTO question (username,company,section,q1,q2,q3,q4,q5,q6,sugguestion,about,about2,crt_date) value ('$username','$company'
    ,'$section','$q1','$q2','$q3','$q4','$q5','$q6','$case_id','$per_id','$sugguestion','$crt_date')";

    $in_sug = mysqli_query($this->dbcon,"INSERT INTO question (username,company,section,q1,q2,q3,q4,q5,q6,sugguestion,about,about2,crt_date) value ('$username','$company'
    ,'$section','$q1','$q2','$q3','$q4','$q5','$q6','$sugguestion','$case_id','$per_id','$crt_date')");
    return $in_sug;
  }

  
  }

  
?>

