<!DOCTYPE html>
<html>
<head>
    <title>Financial management</title>
    <?php
        include "../../head.php";
    ?>
    <script type="text/javascript">
          $(document).ready(function () {
                   $('.chosen-select').chosen();
           });
    </script>
</head>
<?php
    include "../../dbconnection.php";
    $book = mysqli_query($con, "select * from book");
    $user = mysqli_query($con, "select * from user");
    $org = mysqli_query($con, "select * from organization");

?>

<body>
<?php include "../header.php" ?>

<div class="container-fluid" id="navv" style="text-align: center;">
    <h2 class="lead">Financial Management</h2>
</div>

<div class="container" id="nav-bar" style="text-align: center;">
    <ul class="nav nav-tabs">
        <li role="presentation" ><a href="financial.php">รายงานของวันนี้</a></li>
        <li role="presentation"><a href="financehis.php">รายงานย้อยหลัง</a></li>
        <li role="presentation" class="active"><a href="financeadd.php">เพิ่มรายการขายจากช่องทางอื่น</a></li>
    </ul>
</div>

<div class="container" style="text-align: center; width: 1200px;">
    <h3 class="lead">การจัดการการเงิน</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="lead">เพิ่มการขาย</div>
                <div class="col-lg-5">
                    <form action="" id="myForm">
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon">ชื่อหนังสือ:</span>
                        <select name="bookname" id="bn" class="form-control" aria-describedby="sizing-addon">
                            <option selected disabled>เลือกหนังสือ</option>
                            <?
                            while($row = mysqli_fetch_array($book)){
                                echo '<option value="'.$row['book_id'].'" price="'.$row['price'].'" >'.$row['title'].'</option>';
                            }

                            ?>
                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2">จำนวน:</span>
                        <input type="number" class="form-control" id="am" placeholder="จำนวนหนังสือที่ขาย" aria-describedby="sizing-addon2" name="amount" >
                        <div class="input-group-addon">เล่ม</div>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2">ส่วนลด:</span>
                        <input type="number" class="form-control" id="dc" placeholder="ส่วนลดที่ให้" value="0" aria-describedby="sizing-addon2" name="discount" >
                        <div class="input-group-addon">%</div>
                    </div>
                    <br>
                        <button type="button" id="addbook" onclick="getBooklist()" class="btn btn-success" >เพิ่ม</button>
                    </form>

                </div>
                <div class="col-lg-7">
                    <ul class="list-group" id="blist" allprice="0">
                        <h4 id="txt">ยังไม่มีรายการหนังสือ</h4>
                    </ul>
                    <div><h4 id="totalprice" class="pull-right"></h4></div>
                    <button class="btn btn-success" id="usrbtn" style="display: none;" onclick="showusr()">เลือกผู้ซื้อ</button>
                    <div class="panel panel-default" id="panelusr" style="margin-top:5px; display: none;">
                      <div class="panel-body">
                        <div class="input-group">
                            <span class="input-group-addon" id="dfdsfds">เลือกกลุ่มลูกค้า:</span>
                            <select name="bookname" id="selectu" class="form-control" aria-describedby="sizing-addon">
                                <option selected disabled>เลือกกลุ่ม</option>

                                    <option value="1">ลูกค้าทั่วไป</option>
                                    <option value="2">ลูกค้าองค์กร</option>

                            </select>
                        </div>
                        <br>
                        <div class="input-group" id="nusr">
                            <span class="input-group-addon" id="nuser">ชื่อผู้ซื้อหนังสือทั่วไป:</span>
                            <select name="bookname" id="susr" class="form-control chosen-select" aria-describedby="sizing-addon">
                                <option selected disabled>เลือกผู้ซื้อ</option>
                                <?
                                while($row = mysqli_fetch_array($user)){
                                    echo '<option value="'.$row['user_id'].'">'.$row['user_fn'].' '.$row['user_ln'].'</option>';
                                }

                                ?>
                            </select>
                        </div>
                        <div class="input-group" style="display: none" id="org">
                          <span class="input-group-addon" id="nuser">ชื่อผู้ซื้อหนังสือองค์กร:</span>
                          <select name="bookname" id="susr" class="form-control chosen-select" aria-describedby="sizing-addon">
                              <option selected disabled>เลือกผู้ซื้อ</option>
                              <?
                              while($row = mysqli_fetch_array($org)){
                                  echo '<option value="'.$row['user_id'].'">'.$row['organization_name'].'</option>';
                              }

                              ?>
                          </select>
                        </div>
                        <button class="btn btn-success" style="margin-top: 8px;" onclick="clicked()">ยืนยันการขาย</button>
                      </div>
                    </div>
                </div>
            </div>
        </div>
</div>


</body>
</html>
<script type="text/javascript">
    var txt = "";
    var list = document.getElementById('blist');

    function getBooklist(){
        var check = parseInt(document.getElementById("am").value);
        var checkdc = parseInt(document.getElementById("dc").value);
        if( !$("#am").val() ) {
          alert("กรุณาใส่จำนวนหนังสือ");
        }
        else{
          if(check > 0){
                document.getElementById("txt").innerHTML = "";
                var x = document.getElementById("myForm");
                var txt = "";
                var i;
                var entry = document.createElement('li');
                entry.setAttribute('class','list-group-item');
                var deleteb = document.createElement('button');
                deleteb.setAttribute('class','btn btn-danger btn-sm');
                deleteb.setAttribute('style','margin-top: 1px; margin-left: 3px;');
                deleteb.setAttribute('id',x.elements[0].value);
                deleteb.setAttribute('name',document.getElementById('bn').options[document.getElementById('bn').selectedIndex].text);
                deleteb.innerHTML = "ลบรายการ";
                var p = $("#bn option:selected").attr('price');
                var allprice = $("#blist").attr('allprice');
                entry.appendChild(document.createTextNode(document.getElementById('bn').options[document.getElementById('bn').selectedIndex].text));
                    entry.setAttribute('id', x.elements[0].value);
                    entry.appendChild(document.createTextNode("จำนวน "+x.elements[1].value+" เล่ม"));
                    entry.setAttribute('name', x.elements[1].value);
                    entry.setAttribute('discount', x.elements[2].value);
                    entry.setAttribute('price', p);
                    var total = (x.elements[1].value*p)*((100-x.elements[2].value)/100);
                    entry.setAttribute('total', total);
                    $("#blist").attr('allprice', parseInt(allprice)+parseInt(total));
                    entry.appendChild(document.createTextNode(" ส่วนลด "+x.elements[2].value+" %"));
                    entry.appendChild(document.createTextNode(" ราคารวม "+total+" บาท"));
                entry.appendChild(deleteb);
                list.appendChild(entry);
                $("#bn option:selected").remove();
                document.getElementById("am").value = '';
                document.getElementById("dc").value = 0;
                document.getElementById("totalprice").innerHTML = "รวมจำนวนเงินทั้งหมด "+$("#blist").attr('allprice')+" บาท";
                $("#usrbtn").show();
          }
          else{
            alert("กรุณาใส่จำนวนหนังสือให้ถูกต้อง");
            document.getElementById("am").value = '';
            document.getElementById("am").focus();
          }
        }

    }

    $("ul").on("click", "button", function(e) {
        e.preventDefault();
        $('#bn').append($('<option>', {
          value: e.target.id,
          text: e.target.name,
          price: $(this).parent().attr('price')
        }));
        var cprice = $(this).parent().attr('total');
        var total = parseInt($("#blist").attr('allprice'))-parseInt(cprice);
        $("#blist").attr('allprice', total);
        $(this).parent().remove();
        if($("#blist li").length == 0 ){
          document.getElementById("txt").innerHTML = "ยังไม่มีรายการหนังสือ";
          document.getElementById("totalprice").innerHTML = "";
          $("#usrbtn").hide();
        }
        else {
          document.getElementById("totalprice").innerHTML = "รวมจำนวนเงินทั้งหมด "+$("#blist").attr('allprice')+" บาท";
        }
    });


    function clicked(e)
    {
        if(!confirm('ยืนยันการขาย?'))e.preventDefault();
        else
            sendData();
    }
    function sendData(){
        var allitem = document.getElementById("blist").getElementsByTagName("li");
        var obj = [];
        for (var i=0, max=allitem.length; i < max; i++) {
            obj[i] = {};
            obj[i]['id'] = allitem[i].id;
            obj[i]['amount'] = allitem[i].getAttribute("name");
            obj[i]['discount'] = allitem[i].getAttribute("discount");
        }
        console.log(JSON.stringify(obj));
        //var str_json = "json_string=" + (JSON.stringify(myObject))
        $.ajax({
            type: 'POST',
            url: 'addtodb.php',
            data: {json: JSON.stringify(obj), user_id: $("#susr").val()},
            dataType: 'json'
        })
        .done( function( data ) {
                console.log('done');
                console.log(data);
                alert("ทำการเพิ่มการขายเรียบร้อยแล้ว");
                window.location.href = "/MUPRESS_GIT/Backend/finance/financial.php";
        })
        .fail( function( data ) {

                alert("ทำการเพิ่มการขายเรียบร้อยแล้ว");
                window.location.href = "/MUPRESS_GIT/Backend/finance/financial.php";
        });

    }

        $("#selectu").on("change", function(e){
          if($("#selectu").val()=="1"){
            $('.chosen-select').chosen('destroy');
            $("#nusr").show();
            $(".chosen-select").chosen({ width: '100%' });
            $("#org").hide();
          }
          else{
            $("#nusr").hide();
            //$('.chosen-select').chosen();
            $('.chosen-select').chosen('destroy');
            $("#org").show();
            $(".chosen-select").chosen({ width: '100%' });
          }
        });

        function showusr(e)
        {
          $('.chosen-select').chosen('destroy');
          $("#panelusr").toggle('show');
          $(".chosen-select").chosen({ width: '100%' });
        }

</script>
