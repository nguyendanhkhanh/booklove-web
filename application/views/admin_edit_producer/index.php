<div class="row mg text-center">
	<h1>Thông tin nhà xuất bản</h1>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<form method="post" id="form2" accept-charset="utf-8" class="form-horizontal" <?php 
				if(isset($rs))
					echo 'action="?c=admin_edit_producer&a=updateProducer&id='.$rs[0]->id_pro.'"';
				else
				{
					echo 'action="?c=admin_edit_producer&a=createProducer"';
				}
		 ?>>
			<div class="form-group">
				<label class="label-control col-sm-3" for="txtNXB">Tên NXB</label>
				<div class="col-sm-9">
					<input type="text" name="txtNXB" id="txtNXB" class="form-control" required="required" <?php 
						if (isset($rs)) {
							echo 'value="'.$rs[0]->nameProducer.'"';
						}
					 ?> >
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-9 col-sm-offset-3">
					<button type="submit" class="btn btn-primary">Lưu nhà xuất bản</button>
				</div>
			</div>
		</form>
	</div>
</div>