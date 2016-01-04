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


?>

<body>
  
<?php include "../header.php" ?>

<div class="container-fluid" id="navv" style="text-align: center;">
    <h2 class="lead">Stock Management</h2>
</div>

<div class="container-fluid" id="search-bar" style="text-align: center;">

</div>

<div class="container" id="search-bar" style="text-align: center;">
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

                echo '<a href="#" onclick="mS('.$row['book_id'].')" >'.$row['title'].'</a>';
            echo "</td>";
              echo "<td>";

              echo $row['author'];
              echo "</td>";
              echo "<td>";

              echo $total.' เล่ม';
              echo "</td>";
              echo "<td>";

              echo date('m/j/Y',strtotime($cdate['created_date']));
              echo "</td>";
            echo "</tr>";
          }
       ?>

    </table>
</div>

</body>

<div id="txtHint">

</div>
</html>
