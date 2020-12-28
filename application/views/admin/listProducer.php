<div class="row mg">
    <div class="col-md-2 col-md-offset-10">
        <a href="?c=admin_edit_producer"><img src="public/imgs/logo-icon/add.png"> Thêm NXB</a>
    </div>
</div>
<div class="row">
    <table class="tb-format">
        <tbody class="panel-b">
            <tr class="tr-format text-center">
                <th class="pd-tb">Mã nhà xuất bản</th>
                <th class="pd-tb">Tên nhà xuất bản</th>
                <th class="pd-tb"></th>
            </tr>
            <?php
                foreach ($rs as $key => $value) {
                    echo '
                    <tr>
                        <td class="pd-tb">'.$value->id_pro.'</td>
                        <td class="pd-tb">'.$value->nameProducer.'</td>
                        <td class="pd-tb">
                            <a href="?c=admin_edit_producer&id='.$value->id_pro.'" class="btn btn-info">Chi tiết</a>
                            <button class="btn btn-danger remove" idData="'.$value->id_pro.'" strUrl="index.php?c=admin_edit_producer&a=removeProducer"><i class="glyphicon glyphicon-trash"></i></button>
                        </td>
                    </tr>';
                }
            ?>
            
        </tbody>
    </table>
</div>
<script type="text/javascript" src="public/assets/js/removeData.js"></script>