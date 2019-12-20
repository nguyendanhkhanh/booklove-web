<div class="row mg text-center">
	<h1>Thông tin thể loại</h1>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form method="post" <?php 
			if(isset($rs))
				echo 'action="?c=admin_edit_category&a=updateCategory&id='.$rs[0]->id_category.'"';
			else
				echo 'action="?c=admin_edit_category&a=createCategory"';
		 ?> accept-charset="utf-8" class="form-horizontal">
			<div class="form-group">
				<label class="label-control col-sm-3" for="txtTL">Tên thể loại</label>
				<div class="col-sm-9">
					<input type="text" name="txtTL" id="txtTL" class="form-control" required="required" <?php 
						if(isset($rs))
							echo 'value="'.$rs[0]->nameCategory.'"';
					 ?>>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-9 col-sm-offset-3">
					<button type="submit" class="btn btn-primary">Lưu thể loại</button>
				</div>
			</div>
		</form>
	</div>
</div>
