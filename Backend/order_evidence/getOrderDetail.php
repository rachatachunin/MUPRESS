<!-- connect DB -->
<?php
$q = intval($_GET['q']);

include "../../dbconnection.php";
 //
 $sql="SELECT * FROM payment_evidence WHERE pe_id = '".$q."'";
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
                    นาย รชค ชูนิล <br>
                    วันที่โอน '.$row['payment_date'].' <br>
                    ธนาคาร '.$row['bank'].' <br>
                    จำนวนเงิน '.$row['price'].' บาท <br>
                    <div class ="text-center">
                      <form  onsubmit = "return confirm("คุณต้องการจะยืนยันหรือไม่?")" action="confirmPayment.php?q='.$row['order_id'].'" method="get">
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
