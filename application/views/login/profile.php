<div class="row text-center">
	<h2>Thông tin tài khoản</h2>
</div>
<div class="row mg" id="body">
	<form method="post" id="form2" action="?c=login&a=updateProfile">
		<div class="col-md-6">
			<div class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-3 control-label" for="txtUser">Tài khoản</label>
					<div class="col-sm-9">
						<input type="text" disabled="true" id="txtUser" class="form-control" value=<?php echo $_SESSION["userInfo"][0]->userName; ?> >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="txtLastName">Họ</label>
					<div class="col-sm-9">
						<input type="text" id="txtLastName" class="form-control required" <?php echo 'value="'.$rs[0]->lastName.'"'; ?> name="txtLastName">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="txtFirstName">Tên</label>
					<div class="col-sm-9">
						<input type="text" id="txtFirstName" class="form-control required" <?php echo 'value="'.$rs[0]->firstName.'"'; ?> name="txtFirstName">
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="gender">Giới tính</label>
					<div class="col-sm-9">
						<select name ="gender" class="form-control">
							<option value=<?php echo $rs[0]->gender;?>><?php 
							if($rs[0]->gender == 0)
								echo "Nữ";
							else if($rs[0]->gender == 1)
								echo "Nam";
							else
								echo "Khác";
							?></option>
							<option value="0">Nữ</option>
							<option value="1">Nam</option>
							<option value="2">Khác</option>
						</select>	
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="txtBirthDay">Ngày sinh</label>
					<div class="col-sm-9">
						<input type="text" id="txtDate" class="form-control" <?php 
							$date = $rs[0]->birthday;
						echo 'value="'.date("d/m/Y",strtotime($date)).'"'; ?> name="txtBirthDay">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-3 control-label" for="txtEmail">Email</label>
					<div class="col-sm-9">
						<input type="text" id="txtEmail" class="form-control required" <?php echo 'value="'.$rs[0]->email.'"'; ?> name="txtEmail" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="txtPhone">Điện thoại</label>
					<div class="col-sm-9">
						<input type="text" id="txtPhone" class="form-control required" <?php echo 'value="'.$rs[0]->phone.'"'; ?> name="txtPhone" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="txtAddress">Địa chỉ</label>
					<div class="col-sm-9">
						<input type="text" id="txtAddress" class="form-control required" <?php echo 'value="'.$rs[0]->address.'"'; ?> name="txtAddress" >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label" for="txtNote">Ghi chú</label>
					<div class="col-sm-9">
						<textarea rows="2" class="form-control" name="txtNote"><?php echo $rs[0]->note;?></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3"><a href="?c=login&a=changePassword">Đổi mật khẩu tài khoản</a></div>
				</div>
			</div>
		</div>
	</form>
	<div class="col-md-2 col-sm-offset-5">
		<button type="submit" name="submit" class="btn btn-primary btn-block" form="form2">Cập nhật</button>
	</div>
</div>
