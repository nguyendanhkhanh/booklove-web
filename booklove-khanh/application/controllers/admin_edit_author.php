<?php 
	class Admin_edit_author extends Controller
	{
		private $authorModel;
		function __construct()
		{
			require("application/models/author_model.php");
			$this->authorModel = new Author;
			
			define ("MAX_SIZE","1000");

			global $app_path, $contr_path;
			//Tạo biến bỏ fix cứng
			$this->app_path = $app_path;
			$this->contr_path = $contr_path;
		}

		function index()
		{
			if(isset($_SESSION["userInfo"]))
			{
				if($_SESSION["userInfo"][0]->id_role == 2)
				{
					require("$this->app_path/$this->contr_path/404.php");
					return;
				}
				else
				{
					if(isset($_GET["idAu"]))
					{
						$idAu = $_GET["idAu"];
						$rs = $this->authorModel->selectAuthor($idAu);
						$view = array('index' => 'index' );
						$data = array('rs' => $rs );
						$this->view($view,$data,false,true);
					}
					else
					{
						$view = array('index' => 'index' );
						$this->view($view,null,false,true);
					}
				}
			}
			else
			{
				require("$this->app_path/$this->contr_path/404.php");
				return;
			}
		}

		//Hàm kiểm tra và đăng ảnh
		function picture()
		{
			if(isset($_POST["action"]) && $_POST["action"] == "upload")
			{
				$upload_url = "public/imgs/author/";
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

		//Hàm thêm mới tác giả
		function addAuthor()
		{
			try
			{
				$name = $_POST["txtName"];
				$picture = $_POST["txtPicture"];
				$story = $_POST["txtStory"];
				if ($picture == "") {
					$picture = "public/imgs/author/user-default.jpg";
				}
				$this->authorModel->addNewAuthor($name,$picture,$story);
				header("Location: index.php?c=admin&a=listauthor");
				exit;
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}

		//Hàm cập nhật thông tin tác giả
		function updateAuthor()
		{
			try
			{
				$idAu = $_GET["idAu"];
				$name = $_POST["txtName"];
				$picture = $_POST["txtPicture"];
				$story = $_POST["txtStory"];
				if ($picture == "") {
					$picture = "public/imgs/author/user-default.jpg";
				}
				$this->authorModel->updateAuthor($idAu,$name,$picture,$story);
				header("Location: index.php?c=admin&a=listauthor");
				exit;
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}

		//Hàm xoá tác giả
		function removeAuthor()
		{
			try
			{
				$idAu = $_POST["idData"];
				$this->authorModel->removeAuthor($idAu);
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
	}
 ?>