<div class="row mg">
    <div class="col-md-2 col-md-offset-10">
        <a href="?c=admin_edit_product"><img src="public/imgs/logo-icon/add.png"> Thêm sản phẩm</a>
    </div>
</div>
<div class="row">
    <table class="tb-format">
        <tbody class="panel-b">
            <tr class="tr-format text-center">
                <th class="pd-tb">Mã sản phẩm</th>
                <th class="pd-tb">Tên sản phẩm</th>
                <th class="pd-tb">Hình sản phẩm</th>
                <th class="pd-tb">Ngày đăng</th>
                <th class="pd-tb">Giá hiện tại</th>
                <th class="pd-tb"></th>
            </tr>
            <?php
                foreach ($rs as $key => $value) {
                    echo '
                    <tr>
                        <td class="pd-tb">'.$value->id_product.'</td>
                        <td class="pd-tb">'.$value->nameProduct.'</td>
                        <td class="pd-tb"><img src="'.$value->picture.'" alt="Hình sản phẩm" class="img-s"></td>
                        <td class="pd-tb">'.date("d/m/y",strtotime($value->date)).'</td>
                        <td class="pd-tb">'.number_format($value->realPrice).'đ</td>
                        <td class="pd-tb">
                            <a href="?c=admin_edit_product&id='.$value->id_product.'" class="btn btn-info"><i class="glyphicon glyphicon-search"></i></a>
                            <button class="btn btn-danger remove" idData="'.$value->id_product.'" strUrl="index.php?c=admin_edit_product&a=removeProduct"><i class="glyphicon glyphicon-trash"></i></button>
                        </td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="public/assets/js/removeData.js"></script>