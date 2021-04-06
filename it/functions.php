<?php
 define('DB_SERVER','localhost');
 define('DB_USER','root');
 define('DB_PASSWORD','');
 define('DB_NAME','leave');

  class DB_CON{
        function __construct(){
            $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
            global $dbcon;
            $this->dbcon = $con; //เก็บตัวแปร $con ไว้ใน dbcon ใช้ทุกครั้งที่ query

            

  }
        public function usernamecorrect($username){
          $checkuser =  mysqli_query($this->dbcon, "SELECT * FROM member where username = '$username'");
          return $checkuser; //ส่งค่าออกจากค่า

          }

        public function login($username,$password){

          $login = mysqli_query($this->dbcon,"SELECT * FROM member where username ='$username' and password='$password'");
          return $login;
        }

        public function showalluser(){

          $showall = mysqli_query($this->dbcon,"SELECT * FROM member");
          return $showall;

        }

        public function insertfixma($username,$section,$about,$problem,$number,$address,$notice,$crt_date,$crt_time){
         echo "INSERT INTO fix_ma (username,section,about,problem,number,address,notice,crt_time,crt_date) values ('$username','$section','$about','$problem','$number','$address','$notice','$crt_date','$crt_time')";
          $fixma = mysqli_query($this->dbcon,"INSERT INTO fix_ma (username,section,about,problem,number,address,notice,crt_time,crt_date) values ('$username','$section','$about','$problem','$number','$address','$notice','$crt_date','$crt_time')");
          return $fixma;
        }

        public function alllist($fix_stat,$fix_stat2,$mgr_app){
         "SELECT * FROM fix_ma where fix_stat='$fix_stat' or fix_stat = '$fix_stat2' or mgr_app = '$mgr_app'";
            $showlist = mysqli_query($this->dbcon,"SELECT * FROM fix_ma where fix_stat='$fix_stat' or fix_stat = '$fix_stat2' or mgr_app = '$mgr_app'");
            return $showlist;
        }

        public function fetchonerecord($case_id) {
          echo  "SELECT * FROM fix_ma WHERE case_id = '$case_id'";
            $result = mysqli_query($this->dbcon, "SELECT * FROM fix_ma WHERE case_id = '$case_id'");
            return $result;
        }

        public function showmgr($case_id,$can_fix,$fix_stat) {
                  echo  "SELECT * FROM fix_ma where can_fix !='$can_fix' and fix_stat = '$fix_stat' and $case_id = '$case_id'";
                    $result = mysqli_query($this->dbcon, "SELECT * FROM fix_ma where can_fix !='$can_fix' and fix_stat = '$fix_stat' and case_id = '$case_id'");
                    return $result;
            }

        public function update($ac_name,$fix_stat,$case_id) {
          echo "UPDATE fix_ma SET
              ac_name = '$ac_name',
              fix_stat = '$fix_stat'
              WHERE case_id = '$case_id'
          ";
            $result = mysqli_query($this->dbcon, "UPDATE fix_ma SET
                ac_name = '$ac_name',
                fix_stat = '$fix_stat'
                WHERE case_id = '$case_id'
            ");
            return $result ;
        }
        public function canfixit($username,$fix_stat){
            echo "SELECT * FROM fix_ma where ac_name = '$username' and fix_stat = '$fix_stat'";
            $showlist = mysqli_query($this->dbcon,"SELECT * FROM fix_ma where ac_name = '$username' and fix_stat = '$fix_stat'");
            return $showlist;
        }


        public function updatefullview($notice,$can_fix,$item,$s_item,$case_id){
          echo "UPDATE fix_ma SET notice = '$notice', can_fix = '$can_fix', item = '$item' , s_item =  '$s_item' where case_id = '$case_id'";
          $detaillist = mysqli_query($this->dbcon,"UPDATE fix_ma SET notice = '$notice', can_fix = '$can_fix', item = '$item' , s_item =  '$s_item' where case_id = '$case_id'");
          return $detaillist;
        }

        public function finish($case_id,$fix_stat,$end_date,$end_time){
          echo "UPDATE fix_ma SET fix_stat = '$fix_stat' , end_time = '$end_time', end_date = '$end_date' where case_id = '$case_id'";
          $finishwork = mysqli_query($this->dbcon,"UPDATE fix_ma SET fix_stat = '$fix_stat' , end_time = '$end_time', end_date = '$end_date' where case_id = '$case_id'");
          return $finishwork;
        }

        public function mgrapp($case_id , $notice ,$item,$s_item,$mgr_app){
          echo "UPDATE fix_ma SET notice = '$notice' ,item = '$item', s_item = '$s_item' ,mgr_app = '$mgr_app' where case_id = '$case_id'";
          $mgr_app = mysqli_query($this->dbcon,"UPDATE fix_ma SET notice = '$notice' ,mgr_app = '$mgr_app' where case_id = '$case_id'");
          return $mgr_app;
       }

       public function show_end_ma($fix_stat,$username,$user_app){
         echo "SELECT * FROM fix_ma where fix_stat = '$fix_stat and username = '$username'";
        $showend = mysqli_query($this->dbcon,"SELECT * FROM fix_ma where fix_stat = '$fix_stat' and username = '$username' and user_app = '$user_app'");
         return $showend;
       }

      public function fullview_last($case_id,$fix_stat){
      $fullviewl = mysqli_query($this->dbcon,"SELECT * FROM fix_ma where case_id = '$case_id' and fix_stat = '$fix_stat'");
      return $fullviewl;
      }
      
      public function update_last($case_id,$notice,$user_app){
        echo "UPDATE fix_ma SET notice = '$notice',user_app = '$user_app' where case_id = '$case_id'";
        $updatel = mysqli_query($this->dbcon,"UPDATE fix_ma SET notice = '$notice',user_app = '$user_app' where case_id = '$case_id'");
        return $updatel;
      }
      
      public function nottification($username){
        $allucase = mysqli_query($this->dbcon,"SELECT * FROM fix_ma where username = '$username'");
        return $allucase;
      }
      public function last_check($fix_stat,$user_app,$ac_name){
        echo "SELECT * FROM fix_ma where fix_stat = '$fix_stat' and user_app  != '$user_app' and ac_name = '$ac_name' ";
        $lastcheck = mysqli_query($this->dbcon,"SELECT * FROM fix_ma where fix_stat = '$fix_stat' and user_app  != '$user_app' and ac_name = '$ac_name' ");
        return $lastcheck;
      }

      public function count_list($fix_stat){
        $countlist = mysqli_query($this->dbcon,"SELECT * FROM fix_ma where fix_stat = '$fix_stat'");
        return $countlist;
      }

      public function show_list($fix_stat){
         "SELECT * FROM fix_ma where fix_stat = '$fix_stat' order by crt_time desc";
        $showlist = mysqli_query($this->dbcon,"SELECT * FROM fix_ma where fix_stat = '$fix_stat' order by crt_time desc");
        return $showlist;
      }
      
      public function user_show_list_ma($username,$user_app,$fix_stat,$fix_stat2){
       echo "SELECT * FROM fix_ma where username = '$username' and user_app ='$user_app' and fix_stat = '$fix_stat' or fix_stat = '$fix_stat2";
        $user_show = mysqli_query($this->dbcon,"SELECT * FROM fix_ma where username = '$username' and user_app ='$user_app' and fix_stat = '$fix_stat' or fix_stat = '$fix_stat2'");
       return $user_show;
      }

      public function showlistapp($fix_stat,$can_fix,$can_fix2,$mgr_app){
       
        $showapp = mysqli_query($this->dbcon,"SELECT * FROM fix_ma where fix_stat != '$fix_stat' and can_fix != '$can_fix' and can_fix !='$can_fix2' and mgr_app = '$mgr_app'");
        return $showapp;
      }
      
      public function showstatusma($fix_stat){
        
        $showstma = mysqli_query($this->dbcon,"SELECT * FROM fix_ma where fix_stat != '$fix_stat'");
        return $showstma; 
      }
      public function checkstatusma($username,$fix_stat,$user_app){
        $checkst_ma = mysqli_query($this->dbcon,"SELECT * FROM fix_ma where username = '$username' and fix_stat = '$fix_stat' and user_app = '$user_app'");
        return $checkst_ma;
      }
      public function insert_suggestion($username,$company,$section,$q1,$q2,$q3,$q4,$q5,$sugguestion,$case_id,$crt_date){
    

        echo "INSERT INTO question_ma (username,company,section,q1,q2,q3,q4,q5,sugguestion,case_id,crt_date) value ('$username','$company'
        ,'$section','$q1','$q2','$q3','$q4','$q5','$case_id','$sugguestion','$crt_date')";
    
        $in_sug = mysqli_query($this->dbcon,"INSERT INTO question_ma (username,company,section,q1,q2,q3,q4,q5,sugguestion,case_id,crt_date) value ('$username','$company'
        ,'$section','$q1','$q2','$q3','$q4','$q5','$sugguestion','$_case_id','$crt_date')");
        return $in_sug;
      }
      
      }
    
      
      
      
  

 ?>
