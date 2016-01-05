<!DOCTYPE html>
<html>

<head>
    <title>Stock Management</title>
    <?php
        include "../../head.php";
    ?>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <script>
        function mS(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
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
                        document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                        $('#mS'+str).modal('show');
                    }
                }
                xmlhttp.open("GET","editStock.php?q="+str,true);
                xmlhttp.send();
            }
        }


    </script>
</head>

<?php

  include "../../dbconnection.php";
  $sql = "SELECT * FROM book";
  $allBook = mysqli_query($con, $sql);
  $allBookk = mysqli_query($con, $sql);

?>

<body>

<?php include "../header.php" ?>

<div class="container-fluid" id="navv" style="text-align: center;">
    <h2 class="lead">Stock Management</h2>
</div>

<div class="row" id="search-bar" style="text-align: center;">
    <div class="from-group">
      <label for="searchb" class="control-label">ค้นหาโดยชื่อหนังสือ</label>
        <input type="text" style="width:350px" id="searchb" placeholder="ใส่ชื่อที่ต้องการค้นหา" aria-describedby="sizing-addon" name="bookn" >
          <span class="help-block"></span>
    </div>
</div>

<div class="container" id="table-list" style="text-align: center;">
    <table class="table" >
      <th style="text-align: center;">
        ชื่อหนังสือ
      </th>
      <th style="text-align: center;">
        ผู้เขียน
      </th>
      <th style="text-align: center;">
        จำนวนคงเหลือ
      </th>
      <th style="text-align: center;">
        เปลี่ยนแปลงล่าสุด
      </th>
      <th>

      </th>

      <?php

          while ($row = mysqli_fetch_array($allBook)){

              $inbook = mysqli_query($con, "select sum(amount) as ain from book_stock where book_id=".$row['book_id']." and action='IN'");
              $outbook = mysqli_query($con, "select sum(amount) as aout from book_stock where book_id=".$row['book_id']." and action='OUT'");
              $in = mysqli_fetch_array($inbook);
              $out = mysqli_fetch_array($outbook);
              $total = $in['ain'] - $out['aout'];
              $ldate = mysqli_query($con, "select created_date from book_stock where book_id = ".$row['book_id']." order by created_date desc");
              $cdate = mysqli_fetch_array($ldate);
            echo "<tr>";
            echo "<td>";

                echo $row['title'];
                //echo '<a href="#" onclick="mS('.$row['book_id'].')" >'.$row['title'].'</a>';
            echo "</td>";
              echo "<td>";

              echo $row['author'];
              echo "</td>";
              echo "<td>";

              echo $total.' เล่ม';
              echo "</td>";
              echo "<td>";

              if(mysqli_num_rows($ldate) > 0 )
              {
                echo date('j/m/Y',strtotime($cdate['created_date']));
              }
              else {
                echo 'ไม่เคยมีการเปลี่ยนแปลง';
              }
              echo "</td>";

              echo "<td>";
                  echo "<button class=\"btn btn-warning btn-xs\" data-book-id=\"".$row['book_id']."\" data-toggle=\"modal\" data-target=\"#fastAdd\" >เพิ่มจำนวนเร่งด่วน</button>";
              echo "</td>";
            echo "</tr>";
          }
       ?>

    </table>
</div>

</body>

<div id="txtHint">

</div>

<div class="modal fade" id="fastAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">เพิ่มจำนวนหนังสือในคลัง</h4>
            </div>
            <form method="get" action="addStock.php">
            <div class="modal-body">
                <div class="from">
                    <div class="input-group hidden">
                        <span class="input-group-addon" id="sizing-addon">Job-group name:</span>
                        <input type="text" class="form-control" placeholder="" aria-describedby="sizing-addon" name="bookid" value="" required="true">
                    </div>
                    <br>
                    <div class="container-fluid text-center">
                    <button class="btn btn-success" id="amountPlus" type="button" field="amount" >+</button>
                    <input class="text-center" type="text" aria-describedby="sizing-addon" id="amountText" name="amount" value="100" required="true">
                    <button class="btn btn-danger" id="amountMinus" type="button" field="amount" >-</button>
                    </div>
                    <h6 class="pull-right">*สามารถกรอกจำนวนที่ต้องการได้ในช่องด้านบน</h6>
                    <br>
                </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary">ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
            </form>
        </div>
    </div>
</div>
</html>

<script type="text/javascript">

    $('#fastAdd').on('show.bs.modal', function(e) {
      var bookId = $(e.relatedTarget).data('book-id');
      $(e.currentTarget).find('input[name="bookid"]').val(bookId);
    });

    $("#searchb").on("keyup", function() {
    var value = $(this).val();

          $("table tr").each(function(index) {
              if (index !== 0) {

                  $row = $(this);

                  var id = $row.find("td:first").text();

                  if (id.indexOf(value) !== 0) {
                      $row.hide();
                  }
                  else {
                      $row.show();
                  }
              }
          });
    });
  
    jQuery(document).ready(function(){
    // This button will increment the value
        $('#amountPlus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment
                $('input[name='+fieldName+']').val(currentVal + 100);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
        // This button will decrement the value till 0
        $("#amountMinus").click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 0) {
                // Decrement one
                $('input[name='+fieldName+']').val(currentVal - 100);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
        $('.chosen-select', this).chosen();
    });

</script>
