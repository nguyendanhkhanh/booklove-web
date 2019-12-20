<div class="row">
    <table class="tb-format">
        <tbody>
            <tr class="tr-format text-center">
                <th class="pd-tb">Mã hóa đơn</th>
                <th class="pd-tb">Họ và tên</th>
                <th class="pd-tb">Điện thoại</th>
                <th class="pd-tb">Email</th>
                <th class="pd-tb">Địa chỉ</th>
                <th class="pd-tb">Ngày đặt</th>
                <th class="pd-tb">Trạng thái</th>
                <th class="pd-tb">Hình thức</th>
                <th class="pd-tb">Tổng tiền</th>
                <th class="pd-tb">Ghi chú</th>
                <th class="pd-tb"></th>
            </tr>
            <?php
                //Hàm xuất ngày sinh
                function orderDate($date)
                {
                    return date("d/m/Y",strtotime($date));
                }
                //Hàm xuất trạng thái
                function stt($stt)
                {
                    if($stt==0)
                        return "Chưa giao";
                    else
                        return "Đã giao";
                }
                foreach ($rs as $key => $value) {
                    echo '
                    <tr>
                        <td class="pd-tb">'.$value->id_bill.'</td>
                        <td class="pd-tb">'.$value->fullName.'</td>
                        <td class="pd-tb">'.$value->phone.'</td>
                        <td class="pd-tb">'.$value->email.'</td>
                        <td class="pd-tb">'.$value->address.'</td>
                        <td class="pd-tb">'.orderDate($value->date).'</td>
                        <td class="pd-tb">'.stt($value->status).'</td>
                        <td class="pd-tb">'.$value->payments.'</td>
                        <td class="pd-tb">'.number_format($value->total).'đ</td>
                        <td class="pd-tb">'.$value->Note.'</td>
                        <td class="pd-tb">
                            <a href="?c=admin_edit_bill&id_bill='.$value->id_bill.'" class="btn btn-info"><i class="glyphicon glyphicon-search"></i></a>
                        </td>
                    </tr>';
                }
            ?>
            
        </tbody>
    </table>
</div>