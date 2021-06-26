<?php
 define('DB_SERVER','localhost');
 define('DB_USER','root');
 define('DB_PASSWORD','');
 define('DB_NAME','leave');

  class DB_CON{
        function __construct(){
            $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
            mysqli_set_charset($con,"utf8");
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

        public function insertfixit($username,$section,$about,$problem,$address,$number,$notice,$crt_date,$crt_time,$status,$last_update,$who_update){
          echo "INSERT INTO fix_it (username,section,about,problem,address,number,notice,crt_time,crt_date,status,last_update,who_update) 
          values ('$username','$section','$about','$problem','$address','$number','$notice','$crt_date','$crt_time','$status','$last_update','$who_update')";
          $fixit = mysqli_query($this->dbcon,"INSERT INTO fix_it (username,section,about,problem,address,number,notice,crt_time,crt_date,status,last_update,who_update) 
          values ('$username','$section','$about','$problem','$address','$number','$notice','$crt_date','$crt_time','$status','$last_update','$who_update')");
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
            "SELECT * FROM fix_it WHERE case_id = '$case_id'";
            $result = mysqli_query($this->dbcon, "SELECT * FROM fix_it WHERE case_id = '$case_id'");
            return $result;
        }

        public function showmgr($case_id,$can_fix,$fix_stat) {
                    "SELECT * FROM fix_it where can_fix !='$can_fix' and fix_stat = '$fix_stat' and $case_id = '$case_id'";
                    $result = mysqli_query($this->dbcon, "SELECT * FROM fix_it where can_fix !='$can_fix' and fix_stat = '$fix_stat' and case_id = '$case_id'");
                    return $result;
            }

        

        public function update($ac_name,$fix_stat,$last_update,$who_update,$case_id){
          echo "UPDATE fix_it SET ac_name = '$ac_name',fix_stat = '$fix_stat',last_update = '$last_update',who_update = '$who_update'
          where case_id = '$case_id'";
          $updatexx = mysqli_query($this->dbcon,"UPDATE fix_it SET ac_name = '$ac_name',fix_stat = '$fix_stat',last_update = '$last_update',who_update = '$who_update'
          where case_id = '$case_id'");
          return $updatexx;
        }
        public function canfixit($ac_name,$fix_stat,$can_fix,$mgr_app){
          echo "SELECT * FROM fix_it where ac_name = '$ac_name' and fix_stat = '$fix_stat' and can_fix ='$can_fix' or (ac_name = '$ac_name',can_fix != '$can_fix' and mgr_app !='$mgr_app')";
             $showlist = mysqli_query($this->dbcon,"SELECT * FROM fix_it where ac_name = '$ac_name' and fix_stat = '$fix_stat' and can_fix ='$can_fix' or (ac_name = '$ac_name' and can_fix != '$can_fix' and mgr_app !='$mgr_app')");
            return $showlist;
        }


        public function updatefullview($notice,$can_fix,$item,$s_item,$last_update,$who_update,$case_id){
         "UPDATE fix_it SET notice = '$notice', can_fix = '$can_fix', item = '$item' last_update = '$last_update',who_update = '$last_update'where case_id = '$case_id'";
          $detaillist = mysqli_query($this->dbcon,"UPDATE fix_it SET notice = '$notice', can_fix = '$can_fix', item = '$item' , s_item =  '$s_item' ,last_update = 
          '$last_update',who_update = '$who_update' where case_id = '$case_id'");
          return $detaillist;
        }

        public function finish($case_id,$fix_stat,$end_date,$end_time){
          "UPDATE fix_it SET fix_stat = '$fix_stat' , end_time = '$end_time', end_date = '$end_date' where case_id = '$case_id'";
          $finishwork = mysqli_query($this->dbcon,"UPDATE fix_it SET fix_stat = '$fix_stat' , end_time = '$end_time', end_date = '$end_date' where case_id = '$case_id'");
          return $finishwork;
        }

        public function mgrapp($case_id , $notice ,$item,$mgr_app,$last_update,$who_update){
          echo "UPDATE fix_it SET notice = '$notice' ,mgr_app = '$mgr_app',last_update = '$last_update',who_update = '$who_update' where case_id = '$case_id'";
          $mgr_app = mysqli_query($this->dbcon,"UPDATE fix_it SET notice = '$notice' ,item = '$item',mgr_app = '$mgr_app',last_update = '$last_update',who_update = '$who_update' where case_id = '$case_id'");
          return $mgr_app;
       }

       public function show_end($fix_stat,$username,$user_app){
          "SELECT * FROM fix_it where fix_stat = '$fix_stat' and username = '$username'";
        $showend = mysqli_query($this->dbcon,"SELECT * FROM fix_it where fix_stat = '$fix_stat' and username = '$username' and user_app = '$user_app'");
         return $showend;
       }

      public function fullview_last($case_id,$fix_stat){
      $fullviewl = mysqli_query($this->dbcon,"SELECT * FROM fix_it where case_id = '$case_id' and fix_stat = '$fix_stat'");
      return $fullviewl;
      }
      
      public function update_last($case_id,$notice,$user_app){
         "UPDATE fix_it SET notice = '$notice',user_app = '$user_app' where case_id = '$case_id'";
        $updatel = mysqli_query($this->dbcon,"UPDATE fix_it SET notice = '$notice',user_app = '$user_app' where case_id = '$case_id'");
        return $updatel;
      }
      
      public function nottification($username,$fix_stat,$user_app){
        "SELECT * FROM fix_it where username = '$username' and fix_stat = '$fix_stat' and user_app = '$user_app'";
        $allucase = mysqli_query($this->dbcon,"SELECT * FROM fix_it where username = '$username' and fix_stat != '$fix_stat' and user_app = '$user_app'");
        return $allucase;
      }
      public function last_check($fix_stat,$user_app,$ac_name){
         "SELECT * FROM fix_it where fix_stat = '$fix_stat' and user_app  != '$user_app' and ac_name = '$ac_name' ";
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
        
        $user_show = mysqli_query($this->dbcon,"SELECT * FROM fix_it where username = '$username' and user_app ='$user_app' and fix_stat = '$fix_stat' or fix_stat = '$fix_stat2'");
       return $user_show;
      }
      public function usershowlist($username,$user_app,$fix_stat,$fix_stat2){
        echo "SELECT * FROM fix_it where username = '$username' and user_app ='$user_app' and fix_stat = '$fix_stat' or fix_stat = '$fix_stat2'";
        $user_show2 = mysqli_query($this->dbcon,"SELECT * FROM fix_it where username = '$username' and user_app ='$user_app' and fix_stat = '$fix_stat' or fix_stat = '$fix_stat2'");
       return $user_show2;
      }

      public function showlistapp($fix_stat,$can_fix,$can_fix2,$mgr_app){
       echo "SELECT * FROM fix_it where fix_stat != '$fix_stat' and can_fix != '$can_fix' and can_fix !='$can_fix2' and mgr_app = '$mgr_app'";
        $showapp = mysqli_query($this->dbcon,"SELECT * FROM fix_it where fix_stat != '$fix_stat' and can_fix != '$can_fix' and can_fix !='$can_fix2' and mgr_app = '$mgr_app'");
        return $showapp;
      }

      public function calscore($crt_date,$crt_date2){
       
        $cal_score = mysqli_query($this->dbcon,"SELECT * FROM question where crt_date between '$crt_date' and '$crt_date2'");
        return $cal_score;

      }
      public function nottification_mgr($can_fix,$fix_stat,$mgr_app){
      "SELECT * FROM fix_it where can_fix = '$can_fix' and fix_stat = '$fix_stat' and mgr_app = '$mgr_app'";
       $allucase_mgr = mysqli_query($this->dbcon,"SELECT * FROM fix_it where can_fix != '$can_fix' and fix_stat = '$fix_stat' and mgr_app = '$mgr_app'");
       return $allucase_mgr;
     }

     public function showreport($fix_stat,$user_app,$case_id){
       echo "SELECT * FROM fix_it where fix_stat = '$fix_stat' and user_app != '$user_app' and case_id = '$case_id'";
       $show_report = mysqli_query($this->dbcon,"SELECT * FROM fix_it where fix_stat = '$fix_stat' and user_app != '$user_app' and case_id = '$case_id'");
       return $show_report;
     }
     
     public function checkstatus_mgr($fix_stat,$can_fix){
       echo "SELECT * FROM fix_it where fix_stat != '$fix_stat' and can_fix != '$can_fix'";
       $checkmgr = mysqli_query($this->dbcon,"SELECT * FROM fix_it where fix_stat != '$fix_stat' and can_fix != '$can_fix'");
       return $checkmgr;
     }
     public function nottification_user($username,$fix_stat,$ac_name){
       $notti_use = mysqli_query($this->dbcon,"SELECT * FROM fix_it where username = '$username' and fix_stat = '$fix_stat' and ac_name = '$ac_name'");
       return $notti_use;
     }

     public function cal_score($crt_date,$crt_date2){
       
      $calscore = mysqli_query($this->dbcon,"SELECT * FROM question where crt_date between '$crt_date' and '$crt_date2'");
      return $calscore;

    }
     
      
    
      
  }

 ?>
