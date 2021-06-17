<?php
 define('DB_SERVER','localhost');
 define('DB_USER','root');
 define('DB_PASSWORD','');
 define('DB_NAME','leave');

  class DB_COND{
        function __construct(){
            $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
            mysqli_set_charset($con,"utf8");
            $this->dbcon = $con; //เก็บตัวแปร $con ไว้ใน dbcon ใช้ทุกครั้งที่ query

            

  }
  public function add_spare($part_name,$kind_part,$crt_date,$status,$detail,$serial_number,$username){
        $additem = mysqli_query($this->dbcon,"INSERT INTO part (part_name,kind_part,crt_date,status,detail,serial_number,username) values ('$part_name',
        '$kind_part','$crt_date','$status','$detail','$serial_number','$username')");
        
        return $additem;
  }

  public function show_spare(){
       
        $showdata = mysqli_query($this->dbcon,"SELECT * FROM part");
        return $showdata;
        
  }
      
}
  ?>