<?php
	$a = 0;
	$c = 0;
	if (isset($_SESSION["userInfo"])) {
		$a = 1;
	}
	if (isset($_SESSION["cart"])) {
		$c = 1;
	}
 ?>
<div class="row mg text-center">
	<h2>Thông tin khách hàng</h2>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form action="" method="post" accept-charset="utf-8" class="form-horizontal" id="form2">
			<div class="form-group">
				<label class="label-control col-sm-4" for="txtFullName">Họ và tên</label>
				<div class="col-sm-8">
					<input type="text" name="txtFullName" id="txtFullName" class="form-control required" <?php 
						if($a == 1)
						{
							echo 'value="'.$_SESSION["userInfo"][0]->lastName.' '.$_SESSION["userInfo"][0]->firstName.'"';
						}
					 ?>>
				</div>
			</div>
			<div class="form-group">
				<label class="label-control col-sm-4" for="txtPhone">Số điện thoại</label>
				<div class="col-sm-8">
					<input type="text" name="txtPhone" id="txtPhone" class="form-control required" <?php 
						if($a == 1)
						{
							echo 'value="'.$_SESSION["userInfo"][0]->phone.'"';
						}
					 ?>>
				</div>
			</div>
			<div class="form-group">
				<label class="label-control col-sm-4" for="txtEmail">Email</label>
				<div class="col-sm-8">
					<input type="email" name="txtEmail" id="txtEmail" class="form-control required" <?php 
						if($a == 1)
						{
							echo 'value="'.$_SESSION["userInfo"][0]->email.'"';
						}
					 ?>>
				</div>
			</div>
			<div class="form-group">
				<label class="label-control col-sm-4" for="txtAddress">Địa chỉ</label>
				<div class="col-sm-8">
					<input type="text" name="txtAddress" id="txtAddress" class="form-control required" <?php 
						if($a == 1)
						{
							echo 'value="'.$_SESSION["userInfo"][0]->address.'"';
						}
					 ?>>
				</div>
			</div>
			<div class="form-group">
				<label class="label-control col-sm-4" for="slPayments">Hình thức thanh toán</label>
				<div class="col-sm-8">
					<select name="slPayments" id="slPayments" class="form-control">
						<option value="0">Giao hàng thanh toán</option>
						<option value="1">Thanh toán bằng thẻ</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="label-control col-sm-4" for="txtNote">Ghi chú</label>
				<div class="col-sm-8">
					<textarea name="txtNote" id="txtNote" rows="3" class="form-control"><?php 
						if($a == 1)
						{
							echo $_SESSION["userInfo"][0]->note;
						}
					 ?></textarea>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-8 col-sm-offset-4">
					<button type="submit" name="submit" class="btn btn-success">Đặt hàng <i class="glyphicon glyphicon-ok"></i></button>
					<input type="number" hidden name="txtTotal" value="<?php echo $_GET['total'] ?>">
				</div>
			</div>
		</form>
	</div>
</div>