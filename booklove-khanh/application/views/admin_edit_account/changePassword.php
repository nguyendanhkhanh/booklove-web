<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form action="?c=admin_edit_account&a=changePassword" method="post" class="form-horizontal" id="frmProfile" accept-charset="utf-8">
			<div class="form-group">
				<label class="col-sm-4 control-label" for="txtUser">Tài khoản</label>
				<div class="col-sm-8">
					<input type="text" disabled="true" id="txtUser" class="form-control" value=<?php echo $_SESSION["userInfo"][0]->userName; ?> >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="txtPassword">Mật khẩu</label>
				<div class="col-sm-8">
					<input type="password" id="txtPassword" class="form-control required" name="txtPassword" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="txtPassword1">Mật khẩu mới</label>
				<div class="col-sm-8">
					<input type="password" id="txtPass" class="form-control required" name="txtPass">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-4 control-label" for="cpassword1">Nhập lại mật khẩu mới</label>
				<div class="col-sm-8">
					<input type="password" id="txtPass1" class="form-control required" name="txtPass1" >
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-8 col-sm-offset-4">
					<button type="submit" name="submit" class="btn btn-primary">Đổi mật khẩu</button>
				</div>
			</div>
		</form>
	</div>
</div>