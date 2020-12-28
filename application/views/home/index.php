<div class="row">
  <div class="col-md-9 col-md-push-3">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="public/imgs/slide/fairy-tail.jpg" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
                <div class="item">
                  <img src="public/imgs/slide/OP.jpg" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
                <div class="item">
                  <img src="public/imgs/slide/toi-thay-hoa-vang-tren-co-xanh.jpg" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
                <div class="item">
                  <img src="public/imgs/slide/doraemon.jpg" alt="...">
                  <div class="carousel-caption">
                  </div>
                </div>
              </div>

              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        <div class="row mg">
            <?php
              foreach ($rs as $key => $value) {
                echo '
                  <div class="col-sm-4 col-lg-4 col-md-4">
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
	<div class="col-md-3 col-md-pull-9">
        <div class="row">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Danh sách tác giả</h3>
            </div>
            
            <?php
              foreach ($r as $key => $value) {
                echo '
                  <div class="panel-body">
                    <ul style="list-style-image: url(\'public/imgs/logo-icon/star.png\');">
                      <li>
                        <a href="?c=products&ca=author&kw='.$value->id_author.'">'.$value->nameAuthor.'</a>
                      </li>
                    </ul>
                  </div>
                ';
              }
            ?>
          </div>
        </div>
        <div class="row">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Âm nhạc</h3>
            </div>
            <div class="panel-body">
              <audio controls="controls" autoplay="autoplay" loop="loop" class="col-sm-12">
                Trình duyệt của bạn không hỗ trợ audio
                <source src="public/audio/TheMyth-EndlessLove.mp3" type="audio/mp3">
              </audio>
            </div>
          </div>
          
        </div>
  </div>
</div>
<script type="text/javascript" src="public/assets/js/addCart.js"></script>