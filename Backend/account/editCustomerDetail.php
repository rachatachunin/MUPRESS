<?php
$q = intval($_GET['q']);

include "../../dbconnection.php";


 $sql="SELECT * FROM user WHERE user_id = '".$q."'";
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);
// $sqlAll="SELECT * FROM book_stock WHERE book_id = '".$q."' ORDER BY created_date DESC";
// $resultAll = mysqli_query($con,$sqlAll);
// $books = mysqli_query($con,"select * from book where book_id = ".$q."");
// $book = mysqli_fetch_array($books);

echo ' <div class="modal fade" id="EditC'.$row['user_id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูลผู้ใช้ทั่วไป</h4>
                    </div>
                    <div class="modal-body">
                      <form onsubmit="return confirm(\'ยืนยันการตัดสินใจ\');" action ="editCustomer_db.php" method="post" class="form-horizontal" role="form" >
                      <div class="input-group hidden">
                          <span class="input-group-addon" id="sizing-addon">User ID:</span>
                          <input type="hidden" class="form-control" placeholder="" aria-describedby="sizing-addon" name="id" value="'.$q.'">
                      </div>
                      <div class="form-group">
                          <label for="firstname" class="col-md-3 control-label">ชื่อ</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" name="firstname" placeholder=" '.$row['user_fn'].' " value="'.$row['user_fn'].'" required="true">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="firstname" class="col-md-3 control-label">นามสกุล</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" name="lastname" placeholder=" '.$row['user_ln'].' " value="'.$row['user_ln'].'"  required="true">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="email" class="col-md-3 control-label">Email</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" name="email" placeholder=" '.$row['email'].' " value="'.$row['email'].'"  required="true">
                          </div>
                      </div>


                       <div class="form-group">
                          <label for="gender" class="col-md-3 control-label">เพศ</label>
                          <div class="col-md-9">
                              <select name="gender" class="form-control" aria-describedby="sizing-addon" required="ture">' ;
                              if($row['gender'] == 'NA'){
                              echo '
                                    <option value ="NA" selected>'.$row['gender'].'</option>
                              ';
                            } else{
                              if($row['gender'] == 'M'){  echo '<option value="M" selected>ชาย</option>'; }else{ echo '<option value="M">ชาย</option>';}
                              if($row['gender'] == 'F'){  echo '<option value="F" selected>หญิง</option>'; }else{ echo '<option value="F">หญิง</option>';}
                            }

                          echo '    </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="address" class="col-md-3 control-label">ที่อยู่</label>
                          <div class="col-md-9">
                              <textarea  name="address"  cols="50" rows="5" placeholder=" '.$row['address'].' " value="'.$row['address'].'" ></textarea>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="password" class="col-md-3 control-label">Password</label>
                          <div class="col-md-9">
                              <input type="password" class="form-control" name="pass" placeholder=" '.$row['password'].' " value="'.$row['password'].'"  required="ture">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="phone" class="col-md-3 control-label">เบอร์โทรศัพท์</label>
                          <div class="col-md-9">
                              <input type="text" class="form-control" name="phone" placeholder=" '.$row['tel'].' " value="'.$row['tel'].'"  required="ture">
                          </div>
                      </div>
                       <div class="form-group text-center">
                                <button type="button" class="btn btn-success" onclick ="addToAuthor('.$row['user_id'].') ;">เพิ่มเป็นผู้เขียน</button>
                                <button type="submit" class="btn btn-warning">แก้ไข</button>
                                <button type="button" class="btn btn-danger" onclick ="deleteCustomer('.$row['user_id'].') ;">ลบ</button>
                       </div>
                      </form>
                    </div>

                    <div class="modal-footer" style="text-align: center">

                    </div>


                </div>
            </div>
      </div>';
mysqli_close($con);
?>
