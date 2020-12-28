<div class="row mg">
    <div class="col-md-2 col-md-offset-10">
        <a href="?c=admin_edit_author"><img src="public/imgs/logo-icon/add.png"> Thêm tác giả</a>
    </div>
</div>
<div class="row">
    <table class="tb-format">
        <tbody class="panel-b">
            <tr class="tr-format text-center">
                <th class="pd-tb">Mã tác giả</th>
                <th class="pd-tb">Tên tác giả</th>
                <th class="pd-tb">Hình tác giả</th>
                <th class="pd-tb"></th>
            </tr>
            <?php
                foreach ($rs as $key => $value) {
                    echo '
                    <tr>
                        <td class="pd-tb">'.$value->id_author.'</td>
                        <td class="pd-tb">'.$value->nameAuthor.'</td>
                        <td class="pd-tb"><img src="'.$value->picture.'" class="img-s"></td>
                        <td class="pd-tb">
                            <a href="?c=admin_edit_author&idAu='.$value->id_author.'" class="btn btn-info"><i class="glyphicon glyphicon-search"></i></a>
                            <button class="btn btn-danger remove" idData="'.$value->id_author.'" strUrl="index.php?c=admin_edit_author&a=removeAuthor"><i class="glyphicon glyphicon-trash"></i></button>
                        </td>
                    </tr>';
                }
            ?>
            
        </tbody>
    </table>
</div>
<script type="text/javascript" src="public/assets/js/removeData.js"></script>