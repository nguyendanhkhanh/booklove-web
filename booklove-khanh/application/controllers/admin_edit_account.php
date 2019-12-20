<?php 
	class Admin_edit_account extends Controller
	{
		private $accountModel;
		function __construct()
		{
			require("application/models/account_model.php");
			$this->accountModel = new Account;

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
					if(isset($_GET["user"]))
					{
						$user = $_GET["user"];
						$rs = $this->accountModel->getInfo($user);
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
				$upload_url = "public/imgs/avatar/";
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
		//Hàm thêm tài khoản mới
		function createAccount()
		{
			try
			{
				$user = strtolower($_POST["txtUser"]);
				$pass = md5($_POST["txtPass"]);
				$firstName = $_POST["txtFirstName"];
				$lastName = $_POST["txtLastName"];
				$gender = $_POST["slGender"];
				/*Kiểm tra ngày sinh nếu có thì thay / thành - để strtotime(). Nếu dd/mm/YYYY thì không
				strtotime được nên phải thay dd-mm-YYYY*/
				$birth = isset($_POST["txtBirthDay"]) ? date("Y-m-d",strtotime(str_replace("/", "-", $_POST["txtBirthDay"]))) : "";
				$email = $_POST["txtEmail"];
				$phone = $_POST["txtPhone"];
				$address = $_POST["txtAddress"];
				if(isset($_POST["txtPicture"]))
				{
					if($_POST["txtPicture"] == "")
						$picture = "public/imgs/avatar/user-default.jpg";
					else
						$picture =  $_POST["txtPicture"];
				}
				else
					$picture = "public/imgs/avatar/user-default.jpg";
				$role = $_POST["slRole"];
				$note = $_POST["txtNote"];
				$check = $this->accountModel->getInfo($user);
				if($check != null)
				{
					echo '<script>alert("Tài khoản đã tồn tại");</script>';
					echo '<script>history.back();</script>';
				}
				else
				{
					$createAcc = $this->accountModel->addNew($user,$pass,$firstName,$lastName,$gender,$birth,$email,$phone,$address,$picture,$role,$note);
					echo '<script>alert("Tạo thành công!");</script>';
					echo '<script>window.location="index.php?c=admin_edit_account"</script>';
				}
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
		//Hàm cập nhật thông tin tài khoản
		function updateAccount()
		{
			try
			{
				$user = strtolower($_GET["user"]);
				$fName = $_POST["txtFirstName"];
				$lName = $_POST["txtLastName"];
				$gender = $_POST["slGender"];
				/*Kiểm tra ngày sinh nếu có thì thay / thành - để strtotime(). Nếu dd/mm/YYYY thì không
				strtotime được nên phải thay dd-mm-YYYY*/
				$birthDay = isset($_POST["txtBirthDay"]) ? date("Y-m-d",strtotime(str_replace("/", "-", $_POST["txtBirthDay"]))) : "";
				$email = $_POST["txtEmail"];
				$phone = $_POST["txtPhone"];
				$address = $_POST["txtAddress"];
				if(isset($_POST["txtPicture"]))
				{
					if($_POST["txtPicture"] == "")
						$picture = "public/imgs/avatar/user-default.jpg";
					else
						$picture =  $_POST["txtPicture"];
				}
				else
					$picture = "public/imgs/avatar/user-default.jpg";
				$role = $_POST["slRole"];
				$status = $_POST["slStatus"];
				$note = $_POST["txtNote"];
				$this->accountModel->update($user,$fName,$lName,$gender,$birthDay,$email,$phone,$address,$picture,$role,$status,$note);
				header("Location: index.php?c=admin&a=listaccount");
				exit;
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}

		//Hàm xoá tài khoản
		function removeAccount()
		{
			try
			{
				$user = $_POST["userName"];
				$check = $this->accountModel->getInfo($user);
				if($check[0]->id_role != 0)
				{
					$this->accountModel->remove($user);
				}
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}

		//Hàm đổi mật khẩu
		function changePassword()
		{
			if (isset($_POST["submit"])) {
				$user = $_SESSION["userInfo"][0]->userName;
				$pass = $_POST["txtPassword"];
				$pass1 = $_POST["txtPass"];
				$check = $this->accountModel->CheckAccount(strtolower($user),md5($pass));
				if ($check != null) {
					$this->accountModel->changePassword($user,md5($pass1));
					header("Location: index.php?c=admin");
					exit();
				}
				else {
					echo '<script>alert("Mật khẩu không chính xác");</script>';
					echo '<script>history.back();</script>';
				}	
			}
			else
			{
				$view = array('changePassword' => 'changePassword' );
				$this->view($view,null,false,true);
			}
		}
	}
 ?>