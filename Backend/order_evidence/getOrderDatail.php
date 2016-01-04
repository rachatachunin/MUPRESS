<!-- connect DB -->
<?php

echo ' <div class="modal fade" id="OrderDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">OrderDetail</h4>
                    </div>

                    <div class="modal-body">
                <div class="from">
                    <div class="input-group hidden">
                        <span class="input-group-addon" id="sizing-addon">Problem:</span>
                        <input type="hidden" class="form-control" placeholder="" aria-describedby="sizing-addon" name="mgid" value="'.$row['p_id'].'">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon">IT Mans:</span>
                        <input type="text" class="form-control" placeholder="'.$row['it_id'].'" aria-describedby="sizing-addon" name="mgname" value="'.$row['it_id'].'">
                    </div>
                    <br>
                </div>
                </div>
                    <div class="modal-footer">';
//echo "<button type=\"button\" class=\"btn btn-danger\" onclick = \"self.location = 'deleteMG.php?cid=".$row['ht_id']."'\">Delete</button>";

echo '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
            </div>';

?>