<!DOCTYPE html>
<html>
<head>
    <title>Financial management</title>
    <?php
        include "../../head.php";
    ?>

</head>
<?php
    include "../../dbconnection.php";
    $book = mysqli_query($con, "select * from book");

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
                            <option value="" >เลือกหนังสือ</option>
                            <?
                            while($row = mysqli_fetch_array($book)){
                                echo '<option value="'.$row['book_id'].'">'.$row['title'].'</option>';
                            }

                            ?>
                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2">จำนวน:</span>
                        <input type="number" class="form-control" id="am" placeholder="" aria-describedby="sizing-addon2" name="amount" >
                    </div>
                    <br>
                        <button type="button" id="addbook" onclick="getBooklist()" class="btn btn-success" >เพิ่ม</button>
                    </form>

                </div>
                <div class="col-lg-7">
                    <ul class="list-group" id="blist">
                        <h4 id="txt">ยังไม่มีรายการหนังสือ</h4>
                    </ul>
                    <button class="btn btn-success" onclick="clicked()">ยืนยันการขาย</button>
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
                deleteb.setAttribute('class','btn btn-danger btn-sm pull-right');
                deleteb.setAttribute('style','margin-top: -5px');
                deleteb.setAttribute('id',x.elements[0].value);
                deleteb.setAttribute('name',document.getElementById('bn').options[document.getElementById('bn').selectedIndex].text);
                deleteb.innerHTML = "ลบรายการ";


                entry.appendChild(document.createTextNode(document.getElementById('bn').options[document.getElementById('bn').selectedIndex].text));
                    entry.setAttribute('id', x.elements[0].value);
                    entry.appendChild(document.createTextNode("จำนวน "+x.elements[1].value+" เล่ม"));
                    entry.setAttribute('name', x.elements[1].value);
                entry.appendChild(deleteb);
                list.appendChild(entry);
                $("#bn option:selected").remove();
                document.getElementById("am").value = '';
          }
          else{
            alert("กรุณาใส่จำนวนหนังสือให้ถูกต้อง");
            document.getElementById("am").value = '';
          }
        }

    }

    $("ul").on("click", "button", function(e) {
        e.preventDefault();
        $('#bn').append($('<option>', {
          value: e.target.id,
          text: e.target.name
        }));
        $(this).parent().remove();
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
        }
        console.log(JSON.stringify(obj));
        //var str_json = "json_string=" + (JSON.stringify(myObject))
        $.ajax({
            type: 'POST',
            url: 'addtodb.php',
            data: {json: JSON.stringify(obj)},
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


</script>
