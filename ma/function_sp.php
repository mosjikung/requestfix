<?php
 define('DB_SERVER','localhost');
 define('DB_USER','root');
 define('DB_PASSWORD','');
 define('DB_NAME','leave');

  class DB_CONS{
        function __construct(){
            $cons = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
            $this->dbcons = $cons; //เก็บตัวแปร $con ไว้ใน dbcon ใช้ทุกครั้งที่ query
        }

            public function user_show_list_ma($username,$user_app,$fix_stat,$fix_stat2){
                "SELECT * FROM fix_ma where username = '$username' and user_app ='$user_app' and fix_stat = '$fix_stat' or fix_stat = '$fix_stat2";
                 $user_show = mysqli_query($this->dbcons,"SELECT * FROM fix_ma where username = '$username' and user_app ='$user_app' and fix_stat = '$fix_stat' or fix_stat = '$fix_stat2'");
                return $user_show;
               }

            public function show_end_ma($fix_stat,$username,$user_app){
                 "SELECT * FROM fix_ma where fix_stat = '$fix_stat and username = '$username'";
               $showend = mysqli_query($this->dbcons,"SELECT * FROM fix_ma where fix_stat = '$fix_stat' and username = '$username' and user_app = '$user_app'");
                return $showend;
              }
         
              public function insertfixma($username,$section,$about,$problem,$number,$address,$notice,$crt_date,$crt_time){
                "INSERT INTO fix_ma (username,section,about,problem,number,address,notice,crt_time,crt_date) values ('$username','$section','$about','$problem','$number','$address','$notice','$crt_date','$crt_time')";
                 $fixma = mysqli_query($this->dbcons,"INSERT INTO fix_ma (username,section,about,problem,number,address,notice,crt_time,crt_date) values ('$username','$section','$about','$problem','$number','$address','$notice','$crt_date','$crt_time')");
                 return $fixma;
               }
               
            

            }