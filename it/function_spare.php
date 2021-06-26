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
  public function show_spare_detail($part_id){
        $show_s_d = mysqli_query($this->dbcon,"SELECT * FROM part where part_id = '$part_id'");
        return $show_s_d;
  }

  public function update_spare_detail($part_id,$part_name,$kind_part,$serial_number,$detail){
      echo "UPDATE part SET part_name = '$part_name',kind_part = '$kind_part',serial_number = '$serial_number',detail = '$detail';
      where part_id = '$part_id'";
      $update_s_d = mysqli_query($this->dbcon,"UPDATE part SET part_name = '$part_name',kind_part = '$kind_part',serial_number = '$serial_number',detail = '$detail'
      where part_id = '$part_id'");
      return $update_s_d;
  }
  public function spare_not_used($status){
       
      $spare_no_u = mysqli_query($this->dbcon,"SELECT * FROM part where status = '$status'");
      return $spare_no_u;
      
}

      
}
  ?>