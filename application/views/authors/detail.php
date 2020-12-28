
<div class="row">
	<div class="col-md-4">
		<img src="<?php echo $rs[0]->picture; ?>" width="250px;">
	</div>
	<div class="col-md-8">
		<h3>Tác giả: <?php echo $rs[0]->nameAuthor?></h3>
		<p>Tiểu sử: <?php echo $rs[0]->story?></p>
	</div>
</div>
<div class="row">
	<div class="text-center bg-default">
		<h3>Tác phẩm</h3>
	</div>
	<?php
		foreach ($prod as $key => $value) {
			echo '
				<div class="col-md-3">
					<div class="thumbnail" style="height: 400px;">
						<a href="?c=products&a=detail&id='.$value->id_product.'">
		                    <img src="'.$value->picture.'" style="width: 240px; height: 280px;">
		                </a>
		                <div class="caption">
		                	<a href="?c=products&a=detail&id='.$value->id_product.'" style="color:#333;">
		                        <h4 style="min-height: 40px;">'.$value->nameProduct.'</h4>
		                        <b>Giá: '.number_format($value->realPrice).'đ</b>
							</a>
		                    <button class="pull-right btn btn-danger addCart"  bookID="'.$value->id_product.'"><i class="glyphicon glyphicon-shopping-cart"></i></button>
		                </div>
		            </div>
				</div>
			';
		}
	?>
</div>
<script type="text/javascript" src="public/assets/js/addCart.js"></script>


