<?php 
	class Admin_edit_product extends Controller
	{
		private $productModel;
		private $categoryModel;
		private $authorModel;
		private $producerModel;

		function __construct()
		{
			require("application/models/product_model.php");
			require("application/models/category_model.php");
			require("application/models/author_model.php");
			require("application/models/producer_model.php");
			$this->productModel = new Product;
			$this->categoryModel = new Category;
			$this->authorModel = new Author;
			$this->producerModel = new Producer;
		}

		function index()
		{
			$cat = $this->categoryModel->selectCategory();
			$aut = $this->authorModel->selectAuthor();
			$pro = $this->producerModel->selectProducer();
			if(isset($_GET["id"]))
			{
				$rs = $this->productModel->selectProduct($_GET["id"]);
				$view = array('index' => 'index' );
				$data = array('cat' => $cat, 'aut' => $aut, 'pro' => $pro, 'rs' => $rs);
				$this->view($view,$data,false,true);
			}
			else
			{
				$view = array('index' => 'index' );
				$data = array('cat' => $cat, 'aut' => $aut, 'pro' => $pro);
				$this->view($view,$data,false,true);
			}
		}

		function picture()
		{
			if(isset($_POST["action"]) && $_POST["action"] == "upload")
			{
				$upload_url = "public/imgs/products/";
				//$upload_path = dirname(__FILE__)."/author/";
				//Kiểm tra kiểu file có phải hình không
				$validatextensions = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');
				if(!in_array($_FILES['file']['type'],$validatextensions)){
					echo "_invalid_type";
					die();
				}
				//Kiểm tra kích thước file ảnh
				if ($_FILES['file']['size'] > MAX_SIZE * 500000) {
					echo "_invalid_size";
					die();
				}
				$name = $upload_url.$_FILES['file']['name'];
				//$dest = $upload_path.$_FILES['file']['name'];
				if(is_uploaded_file($_FILES['file']['tmp_name'])){
					@move_uploaded_file($_FILES['file']['tmp_name'],$name);
				}
				echo $name;
				die();
			}
		}

		//Hàm thêm sản phẩm mới
		function createProduct()
		{
			try {
				$nameProduct = $_POST["txtProduct"];
				$id_category = $_POST["slCategory"];
				$id_author = $_POST["slAuthor"];
				$id_pro = $_POST["slProducer"];
				if($_POST["txtPicture"] == "")
					$picture = "public/imgs/products/product-default.jpg";
				else
					$picture = $_POST["txtPicture"];
				$descrip = $_POST["txtDescrip"];
				$date = date("Y-m-d");
				$price = $_POST["txtPrice"];
				$sale = $_POST["txtSale"];
				$realPrice = $_POST["txtRealPrice"];
				$this->productModel->addNewProduct($nameProduct,$id_category,$id_author,$id_pro,$picture,$descrip,$date,$price,$sale,$realPrice);
				echo '<script>alert("Tạo thành công!");</script>';
				echo '<script>window.location="index.php?c=admin_edit_product"</script>';
			}
			catch (Exception $e) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}

		//Hàm cập nhật sản phẩm
		function updateProduct()
		{
			try {
				$id_product = $_GET["id"];
				$nameProduct = $_POST["txtProduct"];
				$id_category = $_POST["slCategory"];
				$id_author = $_POST["slAuthor"];
				$id_pro = $_POST["slProducer"];
				if($_POST["txtPicture"] == "")
					$picture = "public/imgs/products/product-default.jpg";
				else
					$picture = $_POST["txtPicture"];
				$descrip = $_POST["txtDescrip"];
				$date = date("Y-m-d", strtotime(str_replace("/", "-", $_POST["txtDate"])));
				$price = $_POST["txtPrice"];
				$sale = $_POST["txtSale"];
				$realPrice = $_POST["txtRealPrice"];
				$this->productModel->updateProduct($id_product,$nameProduct,$id_category,$id_author,$id_pro,$picture,$descrip,$date,$price,$sale,$realPrice);
				
				header("Location: index.php?c=admin&a=listproduct");
				exit;
			}
			catch (Exception $e) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}

		//Hàm xoá sản phẩm
		function removeProduct()
		{
			try {
				$idData = $_POST["idData"];
				$this->productModel->removeProduct($idData);
			}
			catch (Exception $e) {
				echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
	}
 ?>