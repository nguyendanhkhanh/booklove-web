<div class="row">
	<div class="col-md-12">
		
        <div class="row mg">
            <?php
              foreach ($rs as $key => $value) {
                echo '
                  <div class="col-sm-3 col-lg-3 col-md-3">
                    <a href="?c=authors&a=detail&id='.$value->id_author.'">
                        <div class="thumbnail" style="height: 350px;">
                            <img src="'.$value->picture.'" alt="Hình sản phẩm" style="width: 240px; height: 280px;">
                            <div class="caption">
                                <h4 style="min-height: 58px;">'.$value->nameAuthor.'</h4>
                            </div>
                        </div>
                    </a>
                  </div>
                ';
              }
            ?>
        </div> 
	</div>
	
</div>
