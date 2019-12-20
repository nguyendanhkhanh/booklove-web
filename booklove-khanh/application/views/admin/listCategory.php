<div class="row mg">
    <div class="col-md-2 col-md-offset-10">
        <a href="?c=admin_edit_category"><img src="public/imgs/logo-icon/add.png"> Thêm thể loại</a>
    </div>
</div>
<div class="row">
    <table class="tb-format">
        <tbody class="panel-b">
            <tr class="tr-format text-center">
                <th class="pd-tb">Mã thể loại</th>
                <th class="pd-tb">Tên thể loại</th>
                <th class="pd-tb"></th>
            </tr>
            <?php
                foreach ($rs as $key => $value) {
                    echo '
                    <tr>
                        <td class="pd-tb">'.$value->id_category.'</td>
                        <td class="pd-tb">'.$value->nameCategory.'</td>
                        <td class="pd-tb">
                            <a href="?c=admin_edit_category&id='.$value->id_category.'" class="btn btn-info">Chi tiết</a>
                            <button class="btn btn-danger remove" idData="'.$value->id_category.'" strUrl="index.php?c=admin_edit_category&a=removeCategory"><i class="glyphicon glyphicon-trash"></i></button>
                        </td>
                    </tr>';
                }
            ?>
            
        </tbody>
    </table>
</div>
<script type="text/javascript" src="public/assets/js/removeData.js"></script>