<!-- connect DB -->
<?php
$q = intval($_GET['q']);

include "../../dbconnection.php";

 $sql =" SELECT pe.pe_id,pe.order_id,pe.payment_date,pe.bank,pe.price,user.user_fn,user.user_ln
         FROM payment_evidence pe LEFT JOIN order_book ob ON pe.order_id = ob.order_id
         LEFT JOIN user ON ob.user_id = user.user_id WHERE pe.pe_id = '".$q."'  ";

 $result = mysqli_query($con,$sql);
 $row = mysqli_fetch_array($result);

echo ' <div class="modal fade" id="Detail'.$row['pe_id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูลผู้ใช้ทั่วไป</h4>
                    </div>
                    <div class="modal-body">
                    รายการสั่งซื้อเลขที่ MUP '.$row['order_id'].' <br>
                    นาย '.$row['user_fn'].'  '.$row['user_ln'].' <br>
                    วันที่โอน '.$row['payment_date'].' <br>
                    ธนาคาร '.$row['bank'].' <br>
                    จำนวนเงิน '.$row['price'].' บาท <br>
                    <div class ="text-center">
                      <form  onsubmit="return confirm(\'ยืนยันการตัดสินใจ\');"  action="confirmPayment.php" method="post">
                        <input type="hidden" value = "'.$row['order_id'].'" name = "order_id">
                        <button type = "submit" class = "btn btn-warning"> ยืนยันกาณโอน</button>
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
