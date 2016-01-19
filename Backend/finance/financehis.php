<!DOCTYPE html>
<html>
<head>
    <title>Financial management</title>
    <?php
        include "../../head.php";
    ?>

</head>
<body>
<?php include "../header.php" ?>

<div class="container-fluid" id="navv" style="text-align: center;">
    <h2 class="lead">Financial Management</h2>
</div>

<div class="container" id="nav-bar" style="text-align: center;">
    <ul class="nav nav-tabs">
        <li role="presentation" ><a href="financial.php">รายงานของวันนี้</a></li>
        <li role="presentation" class="active"><a href="financehis.php">รายงานย้อยหลัง</a></li>
        <li role="presentation"><a href="financeadd.php">เพิ่มรายการขายจากช่องทางอื่น</a></li>
    </ul>
</div>

<div class="container-fluid" style="text-align: center;">
    <h3 class="lead">รายงานการขายย้อนหลัง</h3>
</div>

<div class="row" id="search-bar" style="text-align: center;">
    <div class="form-inline">
        <div class="form-group">
          <label for="searchway" class="control-label">ค้นหาโดย:</label>
          <select name="bookname" id="searchway" class="form-control" aria-describedby="sizing-addon">
              <option value="1" >ชื่อหนังสือ</option>
              <option value="2" >ชื่อผู้เขียน</option>
          </select>
            <input type="text" style="width:350px" id="searchb" placeholder="ใส่ชื่อหนังสือที่ต้องการค้นหา" aria-describedby="sizing-addon" name="bookn" >
            <input type="text" style="width:350px; display: none;" id="searcha" placeholder="ใส่ชื่อผู้เขียนที่ต้องการค้นหา" aria-describedby="sizing-addon" name="bookn" >
              <span class="help-block"></span>
        </div>
    </div>
</div>



</body>
</html>
