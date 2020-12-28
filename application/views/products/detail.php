<div class="row">
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-4">
				<img src="<?php echo $rs[0]->picture; ?>" width="250px;"><br>
				<button class="btn btn-danger mg addCart" bookID="<?php echo $rs[0]->id_product?>"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;Thêm vào giỏ hàng</button>
			</div>
			<div class="col-md-8">
				<h3><?php echo $rs[0]->nameProduct;?></h3>
				<p>Thể loại: <?php echo $rs[0]->nameCategory?></p>
				<p>Tác giả: <a href="?c=authors&a=detail&id=<?php echo $rs[0]->id_author; ?>"><?php echo $rs[0]->nameAuthor?></a></p>
				<p>Nhà xuất bản: <?php echo $rs[0]->nameCategory?></p>
				<h4 class="text-primary">Giá sản phẩm: <?php echo number_format($rs[0]->price)?>đ</h4>
				<h4>Giảm giá: <?php echo $rs[0]->sale?>%</h4>
				<h4 class="text-danger">Giá hiện tại: <?php echo number_format($rs[0]->realPrice)?>đ</h4>
				<hr>
				<h3>Giới thiệu</h3>
				<div><?php echo $rs[0]->descrip?></div>
			</div>
		</div>
		<div class="row">
			<div class="text-center bg-default">
				<h3>Thể loại liên quan</h3>
			</div>
			<?php
				foreach ($rsCa as $key => $value) {
					echo '
						<div class="col-md-4">
							<div class="thumbnail" style="height: 400px;">
								<a href="?c=products&a=detail&id='.$value->id_product.'">
				                    <img src="'.$value->picture.'" style="width: 240px; height: 280px;">
				                </a>
				                <div class="caption">
				                	<a href="?c=products&a=detail&id='.$value->id_product.'" style="color:#333;">
				                        <h4 style="min-height: 40px;">'.$value->nameProduct.'</h4>
				                        <b>Giá: '.number_format($value->realPrice).'đ</b>
				                     </a>
				                    <button class="pull-right btn btn-danger addCart" bookID="'.$value->id_product.'"><i class="glyphicon glyphicon-shopping-cart"></i></button>
				                </div>
				            </div>
						</div>
					';
				}
			?>
		</div>
		<div class="row">
			<div class="text-center bg-default">
				<h3>Tác giả liên quan</h3>
			</div>
			<?php
				foreach ($rsAu as $key => $value) {
					echo '
						<div class="col-md-4">
							<div class="thumbnail" style="height: 400px;">
								<a href="?c=products&a=detail&id='.$value->id_product.'">
				                    <img src="'.$value->picture.'" style="width: 240px; height: 280px;">
				                </a>
				                <div class="caption">
									<a href="?c=products&a=detail&id='.$value->id_product.'" style="color:#333;">
				                        <h4 style="min-height: 40px;">'.$value->nameProduct.'</h4>
				                        <b>Giá: '.number_format($value->realPrice).'đ</b>
				                    </a>
				                    <button class="pull-right btn btn-danger  addCart" bookID="'.$value->id_product.'"><i class="glyphicon glyphicon-shopping-cart"></i></button>
				                </div>
				            </div>
			                
						</div>
					';
				}
			?>
		</div>
		<div class="row">
			<div class="text-center bg-default">
				<h3>Nhà xuất bản liên quan</h3>
			</div>
			<?php
				foreach ($rsPr as $key => $value) {
					echo '
						<div class="col-md-4">
							<div class="thumbnail" style="height: 400px;">
								<a href="?c=products&a=detail&id='.$value->id_product.'">
				                    <img src="'.$value->picture.'" style="width: 240px; height: 280px;">
				                </a>
				                <div class="caption">
									<a href="?c=products&a=detail&id='.$value->id_product.'" style="color:#333;">
				                        <h4 style="min-height: 40px;">'.$value->nameProduct.'</h4>
				                        <b>Giá: '.number_format($value->realPrice).'đ</b>
				                    </a>
				                    <button class="pull-right btn btn-danger  addCart" bookID="'.$value->id_product.'"><i class="glyphicon glyphicon-shopping-cart"></i></button>
				                </div>
				            </div>
			                
						</div>
					';
				}
			?>
		</div>
	</div>
	<div class="col-md-3">
		<h3>Sách mới</h3>
		<?php
			foreach ($rsTop as $key => $value) {
				echo '
					<div class="col-sm-12 text-center">
					<a href="?c=products&a=detail&id='.$value->id_product.'">
						<img src="'.$value->picture.'" width="200px">
						<h4>'.$value->nameProduct.'</h4>
						<b>'.number_format($value->realPrice).'đ</b>
					</a>
					</div>
				';
			}
		?>
	</div>
</div>
<script type="text/javascript" src="public/assets/js/addCart.js"></script>



