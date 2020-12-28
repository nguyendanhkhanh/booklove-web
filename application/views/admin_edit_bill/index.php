<div class="row mg text-center">
    <h1>Chi tiết hoá đơn</h1>
</div>
<div class="row">
    <table class="tb-format">
        <tbody class="panel-b">
            <tr class="tr-format text-center">
                <th class="pd-tb">Mã hoá đơn</th>
                <th class="pd-tb">Mã sản phẩm</th>
                <th class="pd-tb">Tên sản phẩm</th>
                <th class="pd-tb">Số lượng</th>
                <th class="pd-tb">Tổng tiền</th>
            </tr>

            <?php
                foreach ($rs as $key => $value) {
                    echo '
                    <tr>
                        <td class="pd-tb">'.$value->id_bill.'</td>
                        <td class="pd-tb">'.$value->id_product.'</td>
                        <td class="pd-tb">'.$value->nameProduct.'</td>
                        <td class="pd-tb">'.$value->number.'</td>
                        <td class="pd-tb">'.$value->total.'</td>
                    </tr>
                    ';
                }
            ?>
            
        </tbody>
    </table>
    <div class="row">
        <div class="col-md-4 col-md-offset-8">
            <form class="form-horizontal" method="post" action="?c=admin_edit_bill&a=updateBill&id_bill=<?php echo $_GET["id_bill"] ?>">
                <div class="form-group">
                    <label class="control-label col-sm-3">Trạng thái</label>
                    <div class="col-sm-9">
                        <select name="slStatus" class="form-control">
                            <?php 
                                if($bill[0]->status == 0)
                                    $r = "Chưa giao";
                                else
                                    $r = "Đã giao";
                                echo '<option value="'.$bill[0]->status.'">'.$r.'</option>';
                             ?>
                            <option value="0">Chưa giao</option>
                            <option value="1">Đã giao</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                    </div>
                </div>
            </form>  
        </div>
    </div>
</div>