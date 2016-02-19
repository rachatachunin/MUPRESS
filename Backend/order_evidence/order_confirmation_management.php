<!DOCTYPE html>
<head>
  <?php
    include "../../dbconnection.php";
    include "../../head.php";
    $sql_getPaymentEvidence = "SELECT * FROM payment_evidence LEFT JOIN order_book ON payment_evidence.order_id = order_book.order_id
                               WHERE order_book.payment_status = 0 ORDER BY pay_date ASC  ";
    $result = mysqli_query($con,$sql_getPaymentEvidence);

  ?>
    <meta charset=utf-8 />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script>
function getOrder(str) {
            if (str == "") {
                document.getElementById("getEvidence").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById("getEvidence").innerHTML = xmlhttp.responseText;
                        $('#Detail'+str).modal('show');
                    }
                }
                xmlhttp.open("GET","getOrderDetail.php?q="+str,true);
                xmlhttp.send();
            }

        }

 function deleteOrder(str){
   var path = "deleteOrder.php?q=" + str  ;
   window.location.href= path ;
 }
</script>
</head>
<body>
  <?php include "../header.php" ?>

<div class="container-fluid">
    <div class = "container" style="text-align: center">
		<h2>การจัดการ หลักฐานการโอน</h2>
        <h4>( Orders' evidence Management )</h4><br>
	<div><h3 class="pull-left">รายการแจ้งโอน</h3></div><br><br><br>
	<div class ="row">
     	<div class="col-lg-12"  style="text-align: center;">
            <div class="list-group" style="margin-top: 10px;">
              <?php
              while($row1 = mysqli_fetch_array($result)){
               echo '<a href="#" class="list-group-item"  onclick="getOrder('.$row1['pe_id'].')"> <div style="color:green"> ' ;
               echo "รายการสั่งซื้อเลขที่ " . $row1['order_id']  ;
               echo '</div><div style="color:orange">';
               echo " ของวันที่ " . $row1['pay_date'] ;
               echo '</div></a>';
                   }
              ?>

            </div>

        </div>

	</div>

	</div>
</div>
</body>
<div id ="getEvidence"> </div>


</html>
