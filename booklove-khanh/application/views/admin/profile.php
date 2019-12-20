<div class="row mg text-center">
	<h1>Thông tin tài khoản</h1>
</div>
<div class="col-md-3 text-center">
		<img <?php 
			if(isset($data))
			{
				if($data != null)
				{
					echo 'src="'.$picture.'"';
				}
				else
					echo 'src="'.$_SESSION["userInfo"][0]->picture.'"';
			}
			else
			{
				echo 'src="'.$_SESSION["userInfo"][0]->picture.'"';
			}
		?> style="width: 170px; height: 170px; margin-bottom: 10px;" name="picture">
		<input type="hidden" name="txtPicture" <?php 
			if(isset($data))
			{
				if($data != null)
				{
					echo 'value="'.$picture.'"';
				}
				else
					echo 'value="'.$_SESSION["userInfo"][0]->picture.'"';
			}
			else
			{
				echo 'value="'.$_SESSION["userInfo"][0]->picture.'"';
			}
		?>>
		<form class="row" action="index.php?c=admin&a=profile" method="post" enctype="multipart/form-data" id="frmPicture">
			<input type="file" name="txtPicture">
			<button type="submit" class="btn btn-default" name="upload">Đăng ảnh</button>
			<p style="color: red;"><?php
				if(isset($error) && $error != 0)
				{
					echo "Lỗi! Bạn cần phải chọn file ảnh, kích thước không quá 1MB và file ảnh chưa tồn tại";
				}
			?></p>
		</form>
	</div>
<form id="frmProfile" method="post" action="">
	<div class="col-md-9">
		<div class="col-md-6">
			<div class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtUser">Tài khoản</label>
					<div class="col-sm-8">
						<input type="text" disabled="true" name="txtUser" id="txtUser" class="form-control" placeholder="" <?php 
							echo 'value="'.$_SESSION["userInfo"][0]->userName.'"'; ?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtLastName">Họ</label>
					<div class="col-sm-8">
						<input type="text" name="txtLastName" id="txtLastName" class="form-control" placeholder="" <?php
							echo 'value="'.$_SESSION["userInfo"][0]->lastName.'"';
						?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtFirstName">Tên</label>
					<div class="col-sm-8">
						<input type="text" name="txtFirstName" id="txtFirstName" class="form-control" placeholder="" <?php
							echo 'value="'.$_SESSION["userInfo"][0]->firstName.'"';
						?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtGender">Giới tính</label>
					<div class="col-sm-8">
						<select class="form-control">
							<option <?php echo 'value="'.$_SESSION["userInfo"][0]->gender.'"';?>><?php
								if ($_SESSION["userInfo"][0]->gender == 0) {
									echo "Nữ";
								}
								else if ($_SESSION["userInfo"][0]->gender == 1) {
									echo "Nam";
								}
								else
								{
									echo "Khác";
								}
							?></option>
							<option value="0">Nữ</option>
							<option value="1">Nam</option>
							<option value="2">Khác</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtBirthDay">Ngày sinh</label>
					<div class="col-sm-8">
						<input type="text" name="txtBirthDay" id="txtDate" class="form-control" placeholder="" <?php
							$date = $_SESSION["userInfo"][0]->birthday;
							echo 'value="'.date("d/m/Y",strtotime($date)).'"';
						?>>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<a href="?c=admin_edit_account&a=changePassword">Đổi mật khẩu</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtEmail">Email</label>
					<div class="col-sm-8">
						<input type="text" name="txtEmail" id="txtEmail" class="form-control" placeholder="" <?php
							echo "value='".$_SESSION['userInfo'][0]->email."'";
						?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtPhone">Điện thoại</label>
					<div class="col-sm-8">
						<input type="text" name="txtPhone" id="txtPhone" class="form-control" placeholder="" <?php
							echo "value='".$_SESSION['userInfo'][0]->phone."'";
						?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtAddress">Địa chỉ</label>
					<div class="col-sm-8">
						<input type="text" name="txtAddress" id="txtAddress" class="form-control" placeholder="" <?php
							echo "value='".$_SESSION['userInfo'][0]->address."'";
						?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="">Ghi chú</label>
					<div class="col-sm-8">
						<textarea rows="4" class="form-control" placeholder="" name="txtNote"><?php
							echo $_SESSION["userInfo"][0]->note;
						?></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<div class="row">
	<div class="col-md-4 col-md-offset-6">
		<button type="button" class="btn btn-primary" form="frmProfile">Cập nhật</button>
	</div>
</div>
