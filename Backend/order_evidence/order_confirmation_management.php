<!DOCTYPE html>
<head>
  <?php
    include "../../dbconnection.php";
    include "../../head.php";
  ?>
    <meta charset=utf-8 />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>
function getOrder() {
             $('#OrderDetail').modal('show');
            }

</script>
</head>
<body>
  <?php include "../header.php" ?>

<div class="container-fluid">
    <div class = "container" style="text-align: center">
		<h2>การจัดการ รายการสั่งซื้อ</h2>
        <h4>( Orders' evidence Management )</h4><br>
	<div><h3 class="pull-left">รายการแจ้งโอน</h3></div><br><br><br>
	<div class ="row">
     	<div class="col-lg-12"  style="text-align: center;">
            <div class="list-group" style="margin-top: 10px;">
             <a href="#" class="list-group-item" data-toggle="modal"data-target="#OrderDetail" onclick ="getOrder">รายการสั่งซื้อที่ 1</a>
             <a href="#" class="list-group-item" data-toggle="modal"data-target="#OrderDetail" onclick ="getOrder">รายการสั่งซื้อที่ 2</a>
             <a href="#" class="list-group-item" data-toggle="modal"data-target="#OrderDetail" onclick ="getOrder">รายการสั่งซื้อที่ 3</a>
                               <?php
                               //  while($rowss = mysqli_fetch_array($resultGetToShow)) {
                               //     echo '<a href="#" class="list-group-item" data-toggle="modal" data-target="#TicketDetail'.$rowss['ht_id'].' " onclick ="getHistoryTicket'.$rowss['ht_id'].' "> Serial: '.$rowss['sno'].' '.$rowss['p_name'].' at  '.$rowss['d_name'].'</a>';
                               // }
                               ?>
            </div>

        </div>

	</div>

	</div>
</div>

</body>

<!--modal Department-->
<div class="modal fade" id="OrderDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">รายการสั่งซื้อ</h4>
            </div>

	            <div class="modal-body">

	                รายการสั่งซื้อเลขที่ MUP 1 <br>
	                นาย รชค ชูนิล <br>
	                วันที่โอน 13/12/2015 <br>
	                ธนาคาร ไทยภานิช <br>
	                จำนวนเงิน XXX บาท <br>
	                <div class ="text-center">
		                <form action="#" method="post">
		                	<button type = "submit" class = "btn btn-warning"> ยืนยันกาณโอน</button>
		                </form>
	             	</div>
	            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
            </div>

		</div>
	  </div>
    </div>


</html>
