<?php
	global $host,$dbName,$user,$pass;
	$conn = new PDO("mysql:host=$host;dbname=$dbName;charset=UTF8","$user","$pass");

	//Đổ dữ liệu cho thể loại
	$sqlCat = "SELECT * FROM category";
	$cat = $conn->prepare($sqlCat);
	$cat->execute();
	$rsCat = $cat->fetchAll();

	//Đổ dữ liệu cho nhà xuất bản
	$sqlPro = "SELECT * FROM producer";
	$pro = $conn->prepare($sqlPro);
	$pro->execute();
	$rsPro = $pro->fetchAll(PDO::FETCH_CLASS);
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BookL0V3</title>
	<link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/myCss.css">
	<link rel="stylesheet" href="public/assets/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap-datepicker.min.css">
	
	<!-- Jquery -->
	<script type="text/javascript" src="public/assets/js/jquery-3.2.1.min.js"></script>
	<style type="text/css">
		.error{
			color: red; font-style: italic; font-size: 12px;
		}
		body{
			background-color: #fafafa;
		}
	</style>
</head>
<body>
	<div class="container-fluid bg-default">
		<div class="row">
			<ul id="menu">
				<li>
					<i class="glyphicon glyphicon-earphone"></i>
					Liên hệ: 096.4913.998
				</li>
				<li>
					<i class="glyphicon glyphicon-map-marker" style="color: red;"></i>
					133 Hồng Mai, Bạch Mai, HBT, HN
				</li>
				<li>
					<a href="https://www.facebook.com/profile.php?id=100012707266984" id="fb">
						<i class="fa fa-facebook" ></i>
					</a>
				</li>
				<li>
					<a href="https://www.facebook.com/profile.php?id=100012707266984" id="googlep">
						<i class="fa fa-google-plus" ></i>
					</a>
				</li>
				
			</ul>
		</div>
	</div>
	<div class="container-fluid bg-img">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<a href="index.php"><abbr title="Trang chu" style="border: none; cursor: pointer;"><img src="public/imgs/logo-icon/logo-medium.png" alt="logo booklove" /></abbr></a>
				</div>
				<div class="col-md-6">
					<form class="input-group pd" method="get" action="index.php?c=products">
						<input type="hidden" name="c" value="products">
          				<input type="text" class="form-control" placeholder="Bạn muốn tìm gì?" name="txtSearch">
          				<span class="input-group-btn">
        					<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
        				</span>
      				</form>
				</div>
				<div class="col-md-3" style="padding-top: 20px;">
					<ul class="nav nav-pills navbar-right">
						<?php
							if(isset($_SESSION["userInfo"]))
							{
								$role = $_SESSION["userInfo"][0]->id_role;
								if($role == 0 || $role == 1)
								{
									echo '
										<li class="dropdown">
											<a href="#" class="dropdown-toggle bg-primary" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION["userInfo"][0]->firstName.'<span class="caret"></span></a>
                                        	<ul class="dropdown-menu">
                                            	<li><a href="index.php?c=admin"><i class="fa fa-dashboard"></i>&nbsp;Trang làm việc</a></li>
                                            	<li><a href="?c=login&a=signOut"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Đăng xuất</a></li>
                                        	</ul>
										</li>'; 
								}
								else
								{
									echo '
										<li class="dropdown">
											<a href="#" class="dropdown-toggle bg-primary" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$_SESSION["userInfo"][0]->firstName.'<span class="caret"></span></a>
                                        	<ul class="dropdown-menu">
                                            	<li><a href="index.php?c=login&a=profile"><i class="glyphicon glyphicon-user"></i>&nbsp;Thông tin</a></li>
                                            	<li><a href="index.php?c=login&a=signOut"><i class="glyphicon glyphicon-log-out"></i>&nbsp;Đăng xuất</a></li>
                                        	</ul>
										</li>';
								}
							}
							else
							{
								echo '
									<li>
                        				<a href="index.php?c=login" class="bg-primary"><i class="glyphicon glyphicon-log-in"></i>&nbsp;Đăng nhập<span class="sr-only">(current)</span></a>
                        			</li>';
							}
                    	?>
                        <li>
                        	<a href="?c=carts" class="bg-cart"><i class="glyphicon glyphicon-shopping-cart"></i></a>
                        </li>
                    </ul>
				</div>
			</div>
			<div class="row">
				<div class="navbar-header">
			     	<button type="button" class="navbar-toggle collapsed btn-default" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar bg-primary"></span>
			        <span class="icon-bar bg-primary"></span>
			        <span class="icon-bar bg-primary"></span>
			      	</button>
			    </div>
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li role="presentation">
							<a href="index.php" class="bg-active"><i class="glyphicon glyphicon-home"></i>&nbsp;Trang chủ</a>
						</li>
						<li role="presentation">
							<a href="?c=home&a=about" class="bg-menu"><i class="glyphicon glyphicon-info-sign"></i>&nbsp;Giới thiệu</a>
						</li>
						<li class="dropdown">
	          				<a href="#" class="dropdown-toggle bg-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-th-list"></i>&nbsp;Thể loại <span class="caret"></span></a>
	          				<ul class="dropdown-menu bg-menu">
	            				<?php
	            					foreach ($rsCat as $value) {
	            					 	echo '<li><a href="?c=products&ca=catagory&kw='.$value["id_category"].'">'.$value["nameCategory"].'</a></li>'; 
	            					 }
	            				?>
	            				<li role="separator" class="divider"></li>
            					<li><a href="?c=products">Tất cả</a></li>
	          				</ul>
	        			</li>
	        			<li class="dropdown">
	          				<a href="#" class="dropdown-toggle bg-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-book"></i>&nbsp;Nhà xuất bản <span class="caret"></span></a>
	          				<ul class="dropdown-menu bg-menu">
	          					<?php
	          						foreach ($rsPro as $key => $value) {
	          							echo '<li><a href="?c=products&ca=producer&kw='.$value->id_pro.'">'.$value->nameProducer.'</a></li>';
	          						}
	          					?>
	          					<li role="separator" class="divider"></li>
            					<li><a href="?c=products">Tất cả</a></li>
	          				</ul>
	        			</li>
	        			<li role="presentation">
							<a href="?c=authors" class="bg-menu"><i class="glyphicon glyphicon-star"></i>&nbsp;Tác giả</a>
						</li>
	        			<li role="presentation">
							<a href="#" class="bg-menu"><i class="glyphicon glyphicon-envelope"></i>&nbsp;Phản hồi</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<hr>
	<div class="container" style="min-height: 480px;">
	