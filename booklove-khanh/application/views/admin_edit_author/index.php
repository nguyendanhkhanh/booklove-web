<div class="row mg text-center">
	<h1>Thông tin tác giả</h1>
</div>
<div class="col-md-3 text-center">
	<form id="frmIssue" method="post" enctype="multipart/form-data" action='?c=admin_edit_author&a=picture'>
		<img style="width: 170px; height: 170px; margin-bottom: 10px;" id="image-preview" <?php 
			if (isset($rs)) {
				echo 'src="'.$rs[0]->picture.'"';
			}
			else
				echo 'src="public/imgs/author/user-default.jpg"';
		 ?>>
		
        <input type="file" name="file" id="file" multiple="true" />
        <input type="hidden" name="action" value="upload" />
        <button type="button" id="submit" class="btn btn-default">Đăng ảnh</button>
	</form>
</div>
<form method="post" <?php 
						if(empty($_GET["idAu"]))
						{
							echo 'action="?c=admin_edit_author&a=addAuthor"';
						}
						else
						{
							echo 'action="?c=admin_edit_author&a=updateAuthor&idAu='.$_GET["idAu"].'"';
						}
					?>>
	<div class="col-md-9">
		<div class="col-md-8">
			<div class="form-horizontal">
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtName">Tên tác giả</label>
					<div class="col-sm-8">
						<input type="text" name="txtName" id="txtName" class="form-control" required="required" <?php 
							if (isset($rs)) {
								echo 'value="'.$rs[0]->nameAuthor.'"';
							}
						 ?>>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-4 control-label" for="txtStory">Tiểu sử</label>
					<div class="col-sm-8">
						<textarea name="txtStory" id="txtStory" rows="10" class="form-control"><?php 
								if (isset($rs)) {
									echo $rs[0]->story;
								}
								else
									echo "";
						 	?></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-2">
						<button type="submit" class="btn btn-primary">Lưu tác giả</button>
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
<script type="text/javascript" src="public/assets/js/jquery.form.js"></script>
<script type="text/javascript" src="public/assets/js/uploadPic.js"></script>