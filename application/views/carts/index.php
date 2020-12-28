<div class="row text-center text-danger">
    <h1>Chi tiết giỏ hàng</h1>
</div>
<div class="row">
    <h3>Tổng tiền: <span class="total" id="total"></span></h3>
</div>
<div class="row">
    <table class="tb-format">
        <tbody  class="panel-b">
            <tr class="tr-format text-center">
                <th class="pd-tb">Mã sản phẩm</th>
                <th class="pd-tb">Tên sản phẩm</th>
                <th class="pd-tb">Hình sản phẩm</th>
                <th class="pd-tb">Giá sản phẩm</th>
                <th class="pd-tb">Số lượng</th>
                <th class="pd-tb">Thành tiền</th>
                <th class="pd-tb"></th>
            </tr>
            <?php 
                $count = count($listCart);
                    for($i= 0; $i < $count ;$i++)
                    {
                        echo '
                            <tr>
                                <td class="pd-tb">'.$listCart[$i]->id_product.'</td>
                                <td class="pd-tb">'.$listCart[$i]->nameProduct.'</td>
                                <td class="pd-tb"><img src="'.$listCart[$i]->picture.'" class="img-s"></td>
                                <td class="pd-tb"><h5 class="bookCost" value="'.$listCart[$i]->realPrice.'">'.number_format($listCart[$i]->realPrice).'đ</h5></td>
                                <td class="pd-tb">
                                    <input type="number" class="form-control quality" value="'.$listBookQuality[$i].'" min="1" style="width: 60px;">
                                </td>
                                <td class="pd-tb"><span class="totalItem"></span></td>
                                <td class="pd-tb">
                                    <button class="btn btn-danger remove" bookID="'.$listCart[$i]->id_product.'"><i class="glyphicon glyphicon-trash"></i></button>
                                </td>
                            </tr>
                        ';
                    }
             ?>
        </tbody>
    </table>
</div>
<div class="row mg">
    <div class="pull-right">
        <a href="#" class="btn btn-primary">Mua tiếp sản phẩm</a>
        <a href="?c=carts&a=deleteCart" class="btn btn-danger" id="deleteAll">Xoá giỏ hàng</a>
        <a class="btn btn-success" id="payCart">Thanh toán giỏ hàng</a>
    </div>
</div>
<script type="text/javascript" src="public/assets/js/removeCart.js"></script>