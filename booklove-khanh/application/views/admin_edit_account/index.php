<div class="row mg text-center">
	<h1>Thông tin tài khoản</h1>
</div>
<div class="col-md-3 text-center">
	<form id="frmIssue" method="post" enctype="multipart/form-data" action='?c=admin_edit_account&a=picture'>
		<img style="width: 170px; height: 170px; margin-bottom: 10px;" id="image-preview" <?php 
			if (isset($rs)) {
				echo 'src="'.$rs[0]->picture.'"';
			}
			else
				echo 'src="public/imgs/author/user-default.jpg"';
		 ?>>
		<?php 
			if ($_SESSION["userInfo"][0]->id_role == 0){
				echo '
					<input type="file" name="file" id="file" multiple="true" />
			        <input type="hidden" name="action" value="upload" />
			        <button type="button" id="submit" class="btn btn-default">Đăng ảnh</button>
				';
			}
		 ?>
	</form>
</div>
<form method="post" <?php 
						if ($_SESSION["userInfo"][0]->id_role == 0){
							if (isset($rs)) {
								echo 'action="index.php?c=admin_edit_account&a=updateAccount&user='.$_GET["user"].'"';
							}
							else
							{
								echo 'action="index.php?c=admin_edit_account&a=createAccount"';
							}
						}
 ?> id="frmProfile">
	<div class="col-md-9">
		<div class="col-md-6">
			<div class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtUser">Tài khoản</label>
					<div class="col-sm-8">
						<input type="text" name="txtUser" id="txtUser" class="form-control required" <?php 
						if (isset($rs)) {
							echo 'value="'.$rs[0]->userName.'" disabled';
						}
						 ?>>
					</div>
				</div>
				<div class="form-group" <?php 
					if (isset($rs)){
						echo 'visibility: visible';
					}
					else{
						echo 'visibility: hidden';
					}
				 ?>>
					<label class="col-sm-4 control-label" for="slStatus">Trạng thái</label>
					<div class="col-sm-8">
						<select class="form-control" name="slStatus">
							<?php 
								if (isset($rs)) {
									if ($rs[0]->status == 0) {
										$stt = "Khoá";
									}
									else{
										$stt = "Hoạt động";
									}
									echo '<option value="'.$rs[0]->status.'">'.$stt.'</option>';
								}
							 ?>
							<option value="1">Hoạt động</option>
							<option value="0">Khoá</option>
						</select>
					</div>
				</div>
				<div class="form-group" <?php 
					if (isset($rs)){
						echo 'visibility: hidden';
					}
					else{
						echo 'visibility: visible';
					}
				 ?>>
					<label class="col-sm-4 control-label" for="txtPass">Mật khẩu</label>
					<div class="col-sm-8">
						<input type="password" name="txtPass" id="txtPass" class="form-control required" placeholder="">
					</div>
				</div>
				<div class="form-group" <?php 
					if (isset($rs)){
						echo 'visibility: hidden';
					}
					else{
						echo 'visibility: visible';
					}
				 ?>>
					<label class="col-sm-4 control-label" for="txtPass1">Xác nhận</label>
					<div class="col-sm-8">
						<input type="password" name="txtPass1" id="txtPass1" class="form-control required" placeholder="Xác nhận mật khẩu">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtLastName">Họ</label>
					<div class="col-sm-8">
						<input type="text" name="txtLastName" id="txtLastName" class="form-control required" <?php 
						if (isset($rs)) {
							echo 'value="'.$rs[0]->lastName.'"';
						}
						 ?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtFirstName">Tên</label>
					<div class="col-sm-8">
						<input type="text" name="txtFirstName" id="txtFirstName" class="form-control required" <?php 
						if (isset($rs)) {
							echo 'value="'.$rs[0]->firstName.'"';
						}
						 ?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="slGender">Giới tính</label>
					<div class="col-sm-8">
						<select class="form-control" name="slGender">
							<?php 
								if (isset($rs)) {
									if ($rs[0]->gender == 0) {
										$g = "Nữ";
									}
									else if($rs[0]->gender == 1){
										$g = "Nam";
									}
									else{
										$g = "Khác";
									}
									echo '<option value="'.$rs[0]->gender.'">'.$g.'</option>';
								}
							?>
							<option value="0">Nữ</option>
							<option value="1">Nam</option>
							<option value="2">Khác</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtBirthDay">Ngày sinh</label>
					<div class="col-sm-8">
						<input type="text" name="txtBirthDay" id="txtDate" class="form-control" <?php 
						if (isset($rs)) {
							$bd = $rs[0]->birthday;
							echo 'value="'.date("d/m/Y",strtotime($bd)).'"';
						}
						 ?>>
					</div>
				</div>
			</div>
		</div>
			<div class="col-md-6">
				<div class="form-horizontal">
					<div class="form-group">
						<label class="col-sm-4 control-label" for="txtEmail">Email</label>
						<div class="col-sm-8">
							<input type="email" name="txtEmail" id="txtEmail" class="form-control required" <?php 
						if (isset($rs)) {
							echo 'value="'.$rs[0]->email.'"';
						}
						 ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label" for="txtPhone">Điện thoại</label>
						<div class="col-sm-8">
							<input type="text" name="txtPhone" id="txtPhone" class="form-control required" <?php 
						if (isset($rs)) {
							echo 'value="'.$rs[0]->phone.'"';
						}
						 ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label" for="txtAddress">Địa chỉ</label>
						<div class="col-sm-8">
							<input type="text" name="txtAddress" id="txtAddress" class="form-control required" <?php 
						if (isset($rs)) {
							echo 'value="'.$rs[0]->address.'"';
						}
						 ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label" for="slRole">Chức vụ</label>
						<div class="col-sm-8">
							<select name="slRole" class="form-control">
								<?php 
								if (isset($rs)) {
									if ($rs[0]->id_role == 0) {
										$r = "Admin";
									}
									else if($rs[0]->id_role == 1){
										$r = "Nhân viên";
									}
									else{
										$r = "Khách";
									}
									echo '<option value="'.$rs[0]->id_role.'">'.$r.'</option>';
								}
								?>
								<option value="1">Nhân viên</option>
								<option value="2">Khách hàng</option>
								<option value="0">Admin</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label" for="">Ghi chú</label>
						<div class="col-sm-8">
							<textarea rows="3" class="form-control" name="txtNote"><?php 
						if (isset($rs)) {
							echo $rs[0]->note;
						}
						 ?></textarea>
						</div>
					</div>
					<input type="hidden" name="txtPicture" id="txtPicture" <?php 
						if (isset($rs)) {
							echo 'value="'.$rs[0]->picture.'"';
						}
						else{
							echo 'value=""';	
						}
				 ?>>
				</div>
			</div>
		</div>
</form>
<?php 
	if ($_SESSION["userInfo"][0]->id_role == 0) {
		echo '
			<div class="row">
				<div class="col-md-4 col-md-offset-6">
					<button type="submit" class="btn btn-primary" form="frmProfile">Lưu tài khoản</button>
				</div>
			</div>
		';
	}
 ?>
<script type="text/javascript" src="public/assets/js/jquery.form.js"></script>
<script type="text/javascript" src="public/assets/js/uploadPic.js"></script>