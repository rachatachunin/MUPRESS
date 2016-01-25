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
              <option value="1" >รายเดือน</option>
              <option value="2" >รายปี</option>
          </select>
          <input type="text" placeholder="เลือกเดือนและปีที่ต้องการ" name="date" class="form-control monthPicker" id="date">
          <input name="startYear" placeholder="เลือกปีที่ต้องการ" style="display: none;" id="startYear" class="form-control date-picker-year"/>
          <button class="btn btn-success" style="margin-top: 0px;" onclick="clicked()">พิมพ์รายงาน</button>
              <span class="help-block"></span>
        </div>
    </div>
</div>



</body>
</html>

<script type="text/javascript">
//$( "#date" ).datepicker();
$("#searchway").on("change", function(e){
  if($("#searchway").val()=="1"){
    $("#date").show();
    $("#startYear").hide();
  }
  else{
    $("#date").hide();
    $("#startYear").show();
  }
});

$(document).ready(function()
{
    $(".monthPicker").datepicker({
        dateFormat: 'MM yy',
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,

        onClose: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).val($.datepicker.formatDate('MM yy', new Date(year, month, 1)));
        }
    });

    $(".monthPicker").focus(function () {
        $(".ui-datepicker-calendar").hide();
        $("#ui-datepicker-div").position({
            my: "center top",
            at: "center bottom",
            of: $(this)
        });
    });
});

$(function() {
        $('.date-picker-year').datepicker({
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy',
            onClose: function(dateText, inst) {
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, 1));
            }
        });
        $(".date-picker-year").focus(function () {
                $(".ui-datepicker-month").hide();
                $(".ui-datepicker-calendar").hide();
            });
        });

</script>
