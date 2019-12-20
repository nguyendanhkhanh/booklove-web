<?php 
	class Admin_edit_category extends Controller
	{
		private $categoryModel;
		function __construct()
		{
			require("application/models/category_model.php");
			$this->categoryModel = new Category;
		}

		function index()
		{
			if(isset($_GET["id"]))
			{
				$id = $_GET["id"];
				$rs = $this->categoryModel->selectCategory($id);
				$data = array('rs' => $rs );
			}
			else
			{
				$data = null;
			}
			$view = array('index' => 'index' );
			$this->view($view,$data,false,true);
		}

		//Hàm thêm thể loại
		function createCategory()
		{
			try {
				$nameCategory = $_POST["txtTL"];
				$this->categoryModel->addNewCategory($nameCategory);
				echo '<script>alert("Tạo thành công!");</script>';
				echo '<script>window.location="index.php?c=admin&a=listCategory"</script>';
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}

		//Hàm cập nhật thể loại
		function updateCategory()
		{
			try {
				$id = $_GET["id"];
				$nameCategory = $_POST["txtTL"];
				$this->categoryModel->updateCategory($id,$nameCategory);
				header("Location: index.php?c=admin&a=listCategory");
				exit;
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
		//Hàm xoá thể loại
		function removeCategory()
		{
			try{
				$id = $_POST["idData"];
				$this->categoryModel->removeCategory($id);
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
	}
 ?>