<?php
$q = intval($_GET['q']);

include "../../dbconnection.php";


$sql="SELECT * FROM book_stock WHERE book_id = '".$q."'";
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$sqlAll="SELECT * FROM book_stock WHERE book_id = '".$q."' ORDER BY created_date DESC";
$resultAll = mysqli_query($con,$sqlAll);
$books = mysqli_query($con,"select * from book where book_id = ".$q."");
$book = mysqli_fetch_array($books);

echo ' <div class="modal fade" id="mS'.$row['book_id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">แก้ไขคลังหนังสือ</h4>
                    </div>
                    <div class="modal-body">
                            <img src="../../image/'.$book['image'].'" class="img-responsive center-block" alt="Responsive image">
                    </div>
                    <div class="modal-footer" style="text-align: center">
                        <div class="col-lg-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">เพิ่ม</div>
                                <div class="panel-body">
                                    <form class="from" onsubmit="return confirm(\'ยืนยันการตัดสินใจ\');" method="get" action="addStock.php" style="margin-top: 20px">
                                        <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2">จำนวน:</span>
                                        <input type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2" name="amount">
                                        </div>
                                        <div class="input-group hidden">
                                            <span class="input-group-addon" id="sizing-addon">Building name:</span>
                                            <input type="hidden" class="form-control" placeholder="" aria-describedby="sizing-addon" name="bookid" value="'.$row['book_id'].'">
                                        </div>
                                        <br>

                                        <button type="submit" class="btn btn-warning">ตกลง</button>

                                    </form>
                                </div>
                            </div>

                            <div class="panel panel-danger">
                                <div class="panel-heading">ลด</div>
                                <div class="panel-body">
                                    <form class="from" onsubmit="return confirm(\'ยืนยันการตัดสินใจ\');" method="get" action="removeStock.php" style="margin-top: 20px">
                                        <div class="input-group">
                                        <span class="input-group-addon" id="sizing-addon2">จำนวน:</span>
                                        <input type="text" class="form-control" placeholder="" aria-describedby="sizing-addon2" name="amount">
                                        </div>
                                        <br>
                                        <div class="input-group hidden">
                                            <span class="input-group-addon" id="sizing-addon">Building name:</span>
                                            <input type="hidden" class="form-control" placeholder="" aria-describedby="sizing-addon" name="bookid" value="'.$row['book_id'].'">
                                        </div>
                                        <button type="submit" class="btn btn-warning">ตกลง</button>

                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <h5>ประวัติการเพิ่ม - ลด หนังสือ</h5>
                            <ul class="list-group" style="overflow:auto">';
                                while($book = mysqli_fetch_array($resultAll)){
                                    if($book['action']=='IN'){
                                        echo '<li class="list-group-item" style="color:green">'.'เพิ่ม'.' จำนวน '.$book['amount'].' เล่ม '.date('m/j/Y',strtotime($book['created_date'])).'</li>';
                                    }
                                    if($book['action']=='OUT'){
                                        echo '<li class="list-group-item" style="color:red">'.'ลด'.' จำนวน '.$book['amount'].' เล่ม '.date('m/j/Y',strtotime($book['created_date'])).'</li>';
                                    }
                                }
                           echo '</ul>
                        </div>
                    </div>

                </div>
            </div>
            </div>';
mysqli_close($con);
?>

