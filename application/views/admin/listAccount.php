<?php
    $role = $rs[0]->id_role;
    if($role == 0)
    {
        echo '
        <div class="row mg">
            <div class="col-md-2 col-md-offset-10">
                <a href="?c=admin_edit_account"><img src="public/imgs/logo-icon/add.png"> Thêm tài khoản</a>
            </div>
        </div>';
    }
 ?>
<div class="row">
    <table class="tb-format">
        <tbody class="panel-b">
            <tr class="tr-format text-center">
                <th class="pd-tb">Tài khoản</th>
                <th class="pd-tb">Họ tên</th>
                <th class="pd-tb">Giới tính</th>
                <th class="pd-tb">Ngày sinh</th>
                <th class="pd-tb">Email</th>
                <th class="pd-tb">Điện thoại</th>
                <th class="pd-tb">Địa chỉ</th>
                <th class="pd-tb">Chức vụ</th>
                <th class="pd-tb"></th>
            </tr>
            <?php

                $role = $rs[0]->id_role;
                //Hàm xuất giới tính
                function gender($gender)
                {
                    if ($gender == 1)
                        return "Nam";
                    elseif ($gender == 0)
                        return "Nữ";
                    else
                        return "Khác";
                }
                //Hàm xuất ngày sinh
                function birth($date)
                {
                    return date("d/m/Y",strtotime($date));
                }
                //Hàm xuất chức vụ
                function role($role)
                {
                    if($role == 0)
                        return "Admin";
                    else if($role == 1)
                        return "Nhân viên";
                    else
                        return "Khách";
                }
                foreach ($rs as $key => $value) {
                    echo '
                    <tr>
                        <td class="pd-tb">'.$value->userName.'</td>
                        <td class="pd-tb">'.$value->lastName.' '.$value->firstName.'</td>
                        <td class="pd-tb">'.gender($value->gender).'
                        </td>
                        <td class="pd-tb">'.birth($value->birthday).'</td>
                        <td class="pd-tb">'.$value->email.'</td>
                        <td class="pd-tb">'.$value->phone.'</td>
                        <td class="pd-tb">'.$value->address.'</td>
                        <td class="pd-tb">'.role($value->id_role).'</td>
                        <td class="pd-tb">
                            <a href="?c=admin_edit_account&user='.$value->userName.'" class="btn btn-info"><i class="glyphicon glyphicon-search"></i></a>';
                    if($_SESSION["userInfo"][0]->id_role == 0){
                        echo '
                            <button class="btn btn-danger removeAccount" userName="'.$value->userName.'" roleAccount="'.$value->id_role.'"><i class="glyphicon glyphicon-trash"></i></button>
                        ';
                    }
                    echo '    
                        </td>
                    </tr>';
                }
            ?>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="public/assets/js/removeData.js"></script>