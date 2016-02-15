<?php
$q = intval($_GET['q']);

include "../../dbconnection.php";


 $sql="SELECT * FROM user WHERE user_id = '".$q."'";
 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);

//sql get owner book
$sqlBOOK = "SELECT book_author.book_id, book.title FROM book_author LEFT JOIN book ON book_author.book_id = book.book_id WHERE book_author.user_id = '".$q."' ";
 // select book to choose
 $sqlgetBook = "SELECT b.book_id, b.title FROM book as b LEFT JOIN book_author as ba ON b.book_id = ba.book_id
                WHERE b.book_id NOT IN ( SELECT book_id FROM book_author  WHERE user_id = '".$q."' )";

 $BookShow = mysqli_query($con,$sqlBOOK);
 $result2 = mysqli_query($con,$sqlgetBook);

echo '
<div class="modal fade" id="EditAT'.$row['user_id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">แก้ไขข้อมูลผู้เขียน</h4>
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#A">แก้ไขข้อมูล</a></li>
                    <li><a data-toggle="tab" href="#B">เพิ่มหนังสือที่เขียน</a></li>

                </ul>
            </div>

          <!-- modal register & login -->
                <div class="modal-body">
                    <div class="tab-content">
                        <div id="A" class="tab-pane fade in active">

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
                                      <button type="submit" class="btn btn-warning">แก้ไข</button>
                                      <button type="button" class="btn btn-danger" onclick ="deleteCustomer('.$row['user_id'].') ;">ลบ</button>
                             </div>
                            </form>


                        </div>

                        <div id="B" class="tab-pane fade">
                          <form  onsubmit="return confirm(\'ต้องการเพิ่มหนังสือหรือไม่\');" action ="addbookToAuthor_DB.php" method="get" class="form-horizontal" role="form">
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                              ';
                              echo '  <input type="text" name="ID" id="firstname" class="form-control input-sm" value=" '.$q.'" style="display:none;">
                              </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                              <div class="form-group">
                                <select name="BOOK" class="form-control" aria-describedby="sizing-addon" required="ture">
                                <option value ="" selected>เลือกหนังสือ</option> ';
                                  while($Re = mysqli_fetch_array($result2)){
                                    echo '<option value=" '.$Re['book_id'].' ">'.$Re['title'].' </option>';
                                  }
                          echo '</select>
                              </div>
                              <button class="btn btn-md btn-success btn-block" type="submit">เพิ่มหนังสือ</button><br>
                          </form>

                              <h5 class="text-center">รายการหนังสือของผู้เขียน</h5>

                              <div style="height: 400px; overflow: auto ;">
                              <ul class ="list-group" id = "authorShow">
                              ';
                              // var_dump(mysqli_fetch_array($BookShow));
                              while($SBook = mysqli_fetch_array($BookShow)){
                                echo '<li class = "list-group-item">' ;
                                echo $SBook['title'] ;
                                echo '<a href="#" class="icon pull-right" onclick="DelB('.$q.','.$SBook['book_id'].');">
                                      <span class="glyphicon glyphicon-remove"></span>
                                      </a>
                                      </li>
                                    ' ;
                                  }
                              echo '  </ul>
                              </div>';


                          echo' </div>
                          </div>


                          <span class="clearfix"></span>


                      </div>
                  </div>


                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            <!--</form>-->
        </div>
    </div>
</div>';
mysqli_close($con);
?>
