<div class="row">
	<div class="col-md-12">
		
        <div class="row mg">
            <?php
              foreach ($rs as $key => $value) {
                echo '
                  <div class="col-sm-3 col-lg-3 col-md-3">
                    <div class="thumbnail" style="height: 445px;">
                        <a href="?c=products&a=detail&id='.$value->id_product.'">
                            <img src="'.$value->picture.'" alt="Hình sản phẩm" style="width: 240px; height: 280px;">
                        </a>
                        <div class="caption">
                            <a href="?c=products&a=detail&id='.$value->id_product.'" style="color:#333;">
                                <h4 style="min-height: 58px;">'.$value->nameProduct.'</h4>
                                <p class="pull-right">Giảm: '.$value->sale.'%</p>
                                <p>Giá gốc: '.number_format($value->price).'đ</p>
                                <b>Giá hiện tại: '.number_format($value->realPrice).'đ</b>
                            </a>
                            <button class="pull-right btn btn-danger addCart" bookID="'.$value->id_product.'"><i class="glyphicon glyphicon-shopping-cart"></i></button>
                        </div>
                    </div>
                  </div>
                ';
              }
            ?>
        </div>   
	</div>
	
</div>
<script type="text/javascript" src="public/assets/js/addCart.js"></script>