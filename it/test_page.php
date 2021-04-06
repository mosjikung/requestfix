<?php
session_start();
error_reporting(0);
include_once('function_ac.php');
$listdata = new DB_CONZ();
$status = '';
$leader_app = '';
$result4 = $listdata->showalljob($status,$leader_app);
?>
<table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">ผู้แจ้ง</th>
                    <th scope="col">ประเภท</th>
                    <th scope="col">วันที่แจ้ง</th>
                    <th scope="col">Acept งาน</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  while($objResult4 = mysqli_fetch_array($result4)){


                   ?>
                  <tr>

                        <td > <?php echo $objResult4['username']; ?></td>


                      <td ><?php echo $objResult4['action']; ?></td>


                      <td ><?php echo $objResult4['crt_time']; ?></td>



                    <td><a href="it_page.php?per_id=<?php echo $objResult2['per_id']; ?>&select=1" onClick="return confirm('คุณต้องการรับงานนี้หรือไม่ ?');" class="btn btn-success">รับงาน</a></td>
                    
                </form>
                  </tr>
                  <?php
                  }
                  ?>
                  <tr>


                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        </div>