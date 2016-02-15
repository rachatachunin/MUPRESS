<!-- connect DB -->
<?php
$q = intval($_GET['q']);

include "../../dbconnection.php";

 $sql =" SELECT pe.pe_id,pe.image,pe.order_id,pe.pay_date,pe.bank,pe.fname as sendFname,pe.lname as sendLname,pe.price,user.user_fn as userFname,user.user_ln as userLname
         FROM payment_evidence pe LEFT JOIN order_book ob ON pe.order_id = ob.order_id
         LEFT JOIN user ON ob.user_id = user.user_id WHERE pe.pe_id = '".$q."'  ";

 $sqlgetOrder = "SELECT ob.order_id, user.user_fn, user.user_ln, ob.total_price, ob.note, ob.created_date FROM payment_evidence pe LEFT JOIN order_book ob ON pe.order_id = ob.order_id
                 LEFT JOIN user ON ob.user_id = user.user_id WHERE pe.pe_id = '".$q."'  " ;

 $result = mysqli_query($con,$sql);
 $result2 = mysqli_query($con,$sqlgetOrder);
 $row = mysqli_fetch_array($result);
 $rows = mysqli_fetch_array($result2);



echo ' <div class="modal fade" id="Detail'.$row['pe_id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">รายการสั่งซื้อ</h4>
                    </div>
                   <div class="modal-body">
                     <div class="row">
                      <div class="col-xs-6">
                           <div class="text-center"><h4>หลักฐานการโอน</h4> </div>
                          ';
                        if($row['image'] != null || $row['image'] != ''){
                        echo '
                           <div class ="text-center">
                             <img src = "/MUPRESS_GIT/'.$row['image'].'" width="270px" height="350px"><br><br>
                           </div>' ;
                         }
                         echo '
                          รายการสั่งซื้อเลขที่ MUP '.$row['order_id'].' <br>
                          นาย '.$row['sendFname'].'  '.$row['sendLname'].' <br>
                          วันที่โอน '.$row['pay_date'].' <br>
                          ธนาคาร '.$row['bank'].' <br>
                          จำนวนเงิน '.$row['price'].' บาท <br><br>


                      </div>
                      <div class="col-xs-6">
                        <div class="text-center"><h4>รายละเอียดรายการที่สั่ง</h4> </div>
                          รายการสั่งซื้อเลขที่ MUP '.$rows['order_id'].' <br>
                          นาย '.$rows['user_fn'].'  '.$rows['user_ln'].' <br>
                          วันที่สั่ง '.$rows['created_date'].' <br>
                          Note : '.$rows['note'].' <br>
                          จำนวนเงิน '.$rows['total_price'].' บาท

                      </div>
                     </div>
                     <div class ="text-center">
                         <form  onsubmit="return confirm(\'ยืนยันการตัดสินใจ\');"  action="confirmPayment.php" method="post">
                           <input type="hidden" value = "'.$row['order_id'].'" name = "order_id">
                           <button type = "submit" class = "btn btn-warning"> ยืนยันการโอน</button>
                            <button type="button" class="btn btn-danger" onclick ="deleteOrder('.$row['pe_id'].') ;">ลบ</button>
                         </form>

                    </div>
                    </div>

                    <div class="modal-footer" style="text-align: center">

                    </div>


                </div>
            </div>
      </div>';
mysqli_close($con);

?>
