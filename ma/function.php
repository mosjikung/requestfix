<?php
 define('DB_SERVER','localhost');
 define('DB_USER','root');
 define('DB_PASSWORD','');
 define('DB_NAME','leave');

  class DB_CON{
        function __construct(){
            $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
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

        public function insertfixit($username,$section,$about,$problem,$number,$notice,$crt_date,$crt_time,$status){
         echo "INSERT INTO fix_it (username,section,about,problem,number,notice,crt_time,crt_date,status) values ('$username','$section','$about','$problem','$number','$notice','$crt_date','$crt_time','$status')";
          $fixit = mysqli_query($this->dbcon,"INSERT INTO fix_it (username,section,about,problem,number,notice,crt_time,crt_date,status) values ('$username','$section','$about','$problem','$number','$notice','$crt_date','$crt_time','$status')");
          return $fixit;
        }
        public function insertfixit2($username,$section,$about,$problem,$number,$notice,$crt_date,$crt_time,$status){
           "INSERT INTO fix_it (username,section,about,problem,number,notice,crt_time,crt_date) values ('$username','$section','$about','$problem','$number','$notice','$crt_date','$crt_time','$status)";
           $fixit2 = mysqli_query($this->dbcon,"INSERT INTO fix_it (username,section,about,problem,number,notice,crt_time,crt_date) values ('$username','$section','$about','$problem','$number','$notice','$crt_date','$crt_time','$status')");
           return $fixit2;
         }

        public function alllist($fix_stat,$fix_stat2,$mgr_app){
         "SELECT * FROM fix_it where fix_stat='$fix_stat' or fix_stat = '$fix_stat2' or mgr_app = '$mgr_app'";
            $showlist = mysqli_query($this->dbcon,"SELECT * FROM fix_it where fix_stat='$fix_stat' or fix_stat = '$fix_stat2' or mgr_app = '$mgr_app'");
            return $showlist;
        }

        public function fetchonerecord($case_id) {
          echo  "SELECT * FROM fix_it WHERE case_id = '$case_id'";
            $result = mysqli_query($this->dbcon, "SELECT * FROM fix_it WHERE case_id = '$case_id'");
            return $result;
        }

        public function showmgr($case_id,$can_fix,$fix_stat) {
                  echo  "SELECT * FROM fix_it where can_fix !='$can_fix' and fix_stat = '$fix_stat' and $case_id = '$case_id'";
                    $result = mysqli_query($this->dbcon, "SELECT * FROM fix_it where can_fix !='$can_fix' and fix_stat = '$fix_stat' and case_id = '$case_id'");
                    return $result;
            }

        public function update($ac_name,$fix_stat,$case_id) {
          echo "UPDATE fix_it SET
              ac_name = '$ac_name',
              fix_stat = '$fix_stat'
              WHERE case_id = '$case_id'
          ";
            $result = mysqli_query($this->dbcon, "UPDATE fix_it SET
                ac_name = '$ac_name',
                fix_stat = '$fix_stat'
                WHERE case_id = '$case_id'
            ");
            return $result ;
        }
        public function canfixit($username,$fix_stat){

            $showlist = mysqli_query($this->dbcon,"SELECT * FROM fix_it where ac_name = '$username' and fix_stat = '$fix_stat'");
            return $showlist;
        }


        public function updatefullview($notice,$can_fix,$item,$s_item,$case_id){
          echo "UPDATE fix_it SET notice = '$notice', can_fix = '$can_fix', item = '$item' where case_id = '$case_id'";
          $detaillist = mysqli_query($this->dbcon,"UPDATE fix_it SET notice = '$notice', can_fix = '$can_fix', item = '$item' , s_item =  '$s_item' where case_id = '$case_id'");
          return $detaillist;
        }

        public function finish($case_id,$fix_stat,$end_date,$end_time){
          echo "UPDATE fix_it SET fix_stat = '$fix_stat' , end_time = '$end_time', end_date = '$end_date' where case_id = '$case_id'";
          $finishwork = mysqli_query($this->dbcon,"UPDATE fix_it SET fix_stat = '$fix_stat' , end_time = '$end_time', end_date = '$end_date' where case_id = '$case_id'");
          return $finishwork;
        }

        public function mgrapp($case_id , $notice ,$item,$s_item,$mgr_app){
          echo "UPDATE fix_it SET notice = '$notice' ,item = '$item', s_item = '$s_item' ,mgr_app = '$mgr_app' where case_id = '$case_id'";
          $mgr_app = mysqli_query($this->dbcon,"UPDATE fix_it SET notice = '$notice' ,mgr_app = '$mgr_app' where case_id = '$case_id'");
          return $mgr_app;
       }

       public function show_end($fix_stat,$username,$user_app){
         echo "SELECT * FROM fix_it where fix_stat = '$fix_stat' and username = '$username'";
        $showend = mysqli_query($this->dbcon,"SELECT * FROM fix_it where fix_stat = '$fix_stat' and username = '$username' and user_app = '$user_app'");
         return $showend;
       }

      public function fullview_last($case_id,$fix_stat){
      $fullviewl = mysqli_query($this->dbcon,"SELECT * FROM fix_it where case_id = '$case_id' and fix_stat = '$fix_stat'");
      return $fullviewl;
      }
      
      public function update_last($case_id,$notice,$user_app){
        echo "UPDATE fix_it SET notice = '$notice',user_app = '$user_app' where case_id = '$case_id'";
        $updatel = mysqli_query($this->dbcon,"UPDATE fix_it SET notice = '$notice',user_app = '$user_app' where case_id = '$case_id'");
        return $updatel;
      }
      
      public function nottification($username,$fix_stat,$user_app){
        $allucase = mysqli_query($this->dbcon,"SELECT * FROM fix_it where username = '$username' and fix_stat = '$fix_stat' and user_app = '$user_app'");
        return $allucase;
      }
      public function last_check($fix_stat,$user_app,$ac_name){
        echo "SELECT * FROM fix_it where fix_stat = '$fix_stat' and user_app  != '$user_app' and ac_name = '$ac_name' ";
        $lastcheck = mysqli_query($this->dbcon,"SELECT * FROM fix_it where fix_stat = '$fix_stat' and user_app  != '$user_app' and ac_name = '$ac_name' ");
        return $lastcheck;
      }

      public function count_list($fix_stat){
        $countlist = mysqli_query($this->dbcon,"SELECT * FROM fix_it where fix_stat = '$fix_stat'");
        return $countlist;
      }

      public function show_list($fix_stat){
         "SELECT * FROM fix_it where fix_stat = '$fix_stat' order by crt_time desc";
        $showlist = mysqli_query($this->dbcon,"SELECT * FROM fix_it where fix_stat = '$fix_stat' order by crt_time desc");
        return $showlist;
      }
      
      public function user_show_list($username,$user_app,$fix_stat,$fix_stat2){
      // echo "SELECT * FROM fix_it where username = '$username' and user_app ='$user_app' and fix_stat = '$fix_stat' or fix_stat = '$fix_stat2";
        $user_show = mysqli_query($this->dbcon,"SELECT * FROM fix_it where username = '$username' and user_app ='$user_app' and fix_stat = '$fix_stat' or fix_stat = '$fix_stat2'");
       return $user_show;
      }

      public function showlistapp($fix_stat,$can_fix,$can_fix2,$mgr_app){
       
        $showapp = mysqli_query($this->dbcon,"SELECT * FROM fix_it where fix_stat != '$fix_stat' and can_fix != '$can_fix' and can_fix !='$can_fix2' and mgr_app = '$mgr_app'");
        return $showapp;
      }
      
      
      
  }

 ?>
