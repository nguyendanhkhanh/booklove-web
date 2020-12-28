<div class="row mg text-center">
	<h1>Thông tin sản phẩm</h1>
</div>
<div class="col-md-3 text-center">
	<form id="frmIssue" method="post" enctype="multipart/form-data" action='?c=admin_edit_product&a=picture'>
		<img style="width: 112px; height: 170px; margin-bottom: 10px;" id="image-preview" <?php 
			if (isset($rs)) {
				echo 'src="'.$rs[0]->picture.'"';
			}
			else
				echo 'src="public/imgs/products/product-default.jpg"';
		 ?>>
		
        <input type="file" name="file" id="file" multiple="true" />
        <input type="hidden" name="action" value="upload" />
        <button type="button" id="submit" class="btn btn-default">Đăng ảnh</button>
	</form>
</div>
<form method="post" <?php 
						if (isset($rs)) {
							echo 'action="index.php?c=admin_edit_product&a=updateProduct&id='.$_GET["id"].'"';
						}
						else
						{
							echo 'action="index.php?c=admin_edit_product&a=createProduct"';
						}
 ?> id="frmProfile">
	<div class="col-md-9">
		<div class="col-md-6">
			<div class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtProduct">Tên sản phẩm</label>
					<div class="col-sm-8">
						<input type="text" name="txtProduct" id="txtProduct" class="form-control required" <?php 
						if (isset($rs)) {
							echo 'value="'.$rs[0]->nameProduct.'"';
						}
						 ?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="slCategory">Thể loại</label>
					<div class="col-sm-8">
						<select class="form-control" name="slCategory">
							<?php 
								if (isset($rs)) {
									echo '<option value="'.$rs[0]->id_category.'">'.$rs[0]->nameCategory.'</option>';
								}
								foreach ($cat as $key => $value) {
									echo '
										<option value="'.$value->id_category.'">'.$value->nameCategory.'</option>
									';
								}
							 ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="slAuthor">Tác giả</label>
					<div class="col-sm-8">
						<select class="form-control" name="slAuthor">
							<?php 
								if (isset($rs)) {
									echo '<option value="'.$rs[0]->id_author.'">'.$rs[0]->nameAuthor.'</option>';
								}
								foreach ($aut as $key => $value) {
									echo '
										<option value="'.$value->id_author.'">'.$value->nameAuthor.'</option>
									';
								}
							 ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="slProducer">NXB</label>
					<div class="col-sm-8">
						<select class="form-control" name="slProducer">
							<?php 
								if (isset($rs)) {
									echo '<option value="'.$rs[0]->id_pro.'">'.$rs[0]->nameProducer.'</option>';
								}
								foreach ($pro as $key => $value) {
									echo '
										<option value="'.$value->id_pro.'">'.$value->nameProducer.'</option>
									';
								}
							 ?>
						</select>
					</div>
				</div>
				
				<div class="form-group" <?php 
					if(isset($rs))
					{
						echo 'visibility: visible';
					}
					else
						echo 'visibility: hidden';
				 ?>>
					<label class="col-sm-4 control-label" for="txtDate">Ngày nhập</label>
					<div class="col-sm-8">
						<input type="text" name="txtDate" id="txtDate" class="form-control" <?php 
						if (isset($rs)) {
							$bd = $rs[0]->date;
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
						<label class="col-sm-4 control-label" for="txtPrice">Giá bán</label>
						<div class="col-sm-8">
							<input type="number" name="txtPrice" id="txtPrice" class="form-control required" min="0" <?php 
						if (isset($rs)) {
							echo 'value="'.$rs[0]->price.'"';
						}
						else
							echo 'value="0"';
						 ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label" for="txtSale">Giảm giá</label>
						<div class="col-sm-8">
							<input type="number" name="txtSale" id="txtSale" class="form-control required" min="0" <?php 
						if (isset($rs)) {
							echo 'value="'.$rs[0]->sale.'"';
						}
						else
							echo 'value="0"';
						 ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label" for="txtRealPrice">Giá thực</label>
						<div class="col-sm-8">
							<input type="number" name="txtRealPrice" id="txtRealPrice" class="form-control required" min="0" <?php 
						if (isset($rs)) {
							echo 'value="'.$rs[0]->realPrice.'"';
						}
						else
							echo 'value="0"';
						 ?>>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-4 control-label" for="">Giới thiệu</label>
						<div class="col-sm-8">
							<textarea rows="5" class="form-control" placeholder="" name="txtDescrip"><?php 
						if (isset($rs)) {
							echo $rs[0]->descrip;
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
<div class="row">
	<div class="col-md-4 col-md-offset-6">
		<button type="submit" class="btn btn-primary" form="frmProfile">Lưu sản phẩm</button>
	</div>
</div>
<script type="text/javascript" src="public/assets/js/jquery.form.js"></script>
<script type="text/javascript" src="public/assets/js/uploadPic.js"></script>