<?php
	class Admin extends Controller
	{
		private $accountModel;
		private $productModel;
		private $categoryModel;
		private $authorModel;
		private $producerModel;
		private $billModel;
		function __construct()
		{
			require("application/models/account_model.php");
			require("application/models/product_model.php");
			require("application/models/category_model.php");
			require("application/models/author_model.php");
			require("application/models/producer_model.php");
			require("application/models/bill_model.php");
			$this->accountModel = new Account;
			$this->productModel = new Product;
			$this->categoryModel = new Category;
			$this->authorModel = new Author;
			$this->producerModel = new Producer;
			$this->billModel = new Bill;

			global $app_path, $contr_path;
			//Tạo biến bỏ fix cứng
			$this->app_path = $app_path;
			$this->contr_path = $contr_path;
			define ("MAX_SIZE","1000");
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
					$view = array('index' => 'index' );
					$this->view($view,null,false,true);
				}
			}
			else
			{
				require("$this->app_path/$this->contr_path/404.php");
				return;
			}
		}

		//Hàm xử lý phần thông tin tài khoản nhân viên và admin
		function profile()
		{
			//Hàm kiểm tra file hình ảnh
			function getExtension($str)
			{
				$i = strripos($str, ".");
				if (!$i) {
					return "";
				}
				$l = strlen($str) - $i;
				$ext = substr($str, $i + 1, $l);
				return $ext;
			}
			if(empty($_SESSION["userInfo"]) || $_SESSION["userInfo"][0]->id_role == 2)
			{
				require("$this->app_path/$this->contr_path/404.php");
				return;
			}
			else
			{
				$picture = "";
				$data="";
				$error = 0;
				if(isset($_POST["upload"]))
				{
					$image = $_FILES['txtPicture']['name'];
					if($image)
					{
						//Lấy tên gốc của file
						$fileName = stripcslashes($_FILES['txtPicture']['name']);
						//Lấy phần mở rộng của file (đuôi chấm của file)
						$extension = getExtension($fileName);
						$extension = strtolower($extension);
						if($extension != "jpg" && $extension != "jpge" && $extension != "png" && $extension != "gif")
						{
							//Không phải file hình
							$error = 1;
						}
						else
						{
							$size = filesize($_FILES['txtPicture']['tmp_name']);
							if($size>MAX_SIZE*2048)
							{
								//Kích thước quá lớn
								$error = 1;
							}
							//Đặt tên mới cho file mới up lên
							$image_name = time().'.'.$extension;
							//Lưu file vào đường dẫn
							$newName = "public/imgs/avatar/".$image_name;
							//Kiểm tra file hình đã up trước đó chưa
							$copied = copy($_FILES['txtPicture']['tmp_name'], $newName);
							if(!$copied)
							{
								//File hình đã tồn tại
								$error = 1;
							}
						}
						if($error==1)
						{
							$picture = null;
						}
						else
						{
							$picture = $newName;
						}
						$data = array('error' => $error,'picture' => $picture );
					}
				}
				else
				{
					$data = null;
				}
				$view = array('profile' => 'profile' );
				$this->view($view, $data, false, true);
			}
		}

		//Hàm xử lý phần danh sách tài khoản
		function listaccount()
		{
			if(empty($_SESSION["userInfo"]))
			{
				require("$this->app_path/$this->contr_path/404.php");
				return;
			}
			else
			{
				$id_role = $_SESSION["userInfo"][0]->id_role;
				if ($id_role == 0) {
					$role = isset($_GET["role"]) ? $_GET["role"] : "";
					$rs = $this->accountModel->selectAccount($role);
				}
				else if ($id_role == 1) {
					$role = isset($_GET["role"]) ? $_GET["role"] : null;
					if($role == null || $role == 0)
					{
						require("$this->app_path/$this->contr_path/404.php");
						return;
					}
					else
					{
						$rs = $this->accountModel->selectAccount($role);
					}
				}
				else
				{
					require("$this->app_path/$this->contr_path/404.php");
					return;
				}
			}
			$data = array('rs' => $rs);
			$view = array('listAccount' => 'listAccount' );
			$this->view($view,$data,false,true);
		}

		//Hàm xử lý phần danh sách sản phẩm
		function listproduct()
		{
			if(empty($_SESSION["userInfo"]))
			{
				require("$this->app_path/$this->contr_path/404.php");
				return;
			}
			else
			{
				$rs = $this->productModel->selectProduct();
			}
			$data = array('rs' => $rs);
			$view = array('listProduct' => 'listProduct' );
			$this->view($view,$data,false,true);
		}

		//Hàm xử lý phần danh sách thể loại
		function listcategory()
		{
			if(empty($_SESSION["userInfo"]))
			{
				require("$this->app_path/$this->contr_path/404.php");
				return;
			}
			else
			{
				$rs = $this->categoryModel->selectCategory();
			}
			$data = array('rs' => $rs);
			$view = array('listCategory' => 'listCategory' );
			$this->view($view,$data,false,true);
		}

		//Hàm xử lý phần danh sách tác giả
		function listauthor()
		{
			if(empty($_SESSION["userInfo"]))
			{
				require("$this->app_path/$this->contr_path/404.php");
				return;
			}
			else
			{
				$rs = $this->authorModel->selectAuthor();
			}
			$data = array('rs' => $rs);
			$view = array('listAuthor' => 'listAuthor' );
			$this->view($view,$data,false,true);
		}

		//Hàm xử lý phần danh sách nhà xuất bản
		function listproducer()
		{
			if(empty($_SESSION["userInfo"]))
			{
				require("$this->app_path/$this->contr_path/404.php");
				return;
			}
			else
			{
				$rs = $this->producerModel->selectProducer();
			}
			$data = array('rs' => $rs);
			$view = array('listProducer' => 'listProducer' );
			$this->view($view,$data,false,true);
		}

		//Hàm xử lý phần danh sách hóa đơn
		function listbill()
		{
			if(empty($_SESSION["userInfo"]))
			{
				require("$this->app_path/$this->contr_path/404.php");
				return;
			}
			else
			{
				$rs = $this->billModel->selectBill();
			}
			$data = array('rs' => $rs );
			$view = array('listBill' => 'listBill' );
			$this->view($view,$data,false,true);
		}
	}
?>