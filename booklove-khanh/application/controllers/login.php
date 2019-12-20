<?php
	class Login extends Controller
	{
		private $accountModel;
		function __construct()
		{
			require("application/models/account_model.php");
			$this->accountModel = new Account;
		}
		function index()
		{
			if(isset($_SESSION["userInfo"]))
			{
				header('Location: index.php?c=login&a=profile');
				exit;
			}
			else
			{
				$view = array('index' => 'index' );
				$this->view($view,null,false,false);
			}
		}

		//Hàm xử lý phần đăng nhập tài khoản
		function signIn()
		{
			try
			{
				if(isset($_SESSION["userInfo"]))
				{
					header('Location: index.php?c=login&a=profile');
					exit;
				}
				//Kiểm tra xem có user password chưa nếu chưa thì về trang đang nhập
				if(isset($_POST["txtUser"]) || isset($_POST["txtPassword"]))
				{
					//Tạo biến để kiểm tra đăng nhập
					$check = $this->accountModel->CheckAccount(strtolower($_POST["txtUser"]),md5($_POST["txtPassword"]));
					if($check != null)
					{
						if($check[0]->status == 1)
						{
							$_SESSION["userInfo"] = $check;
							if($check[0]->id_role == 2)
							{
								header("Location: index.php");
								exit();
							}
							else
							{
								header("Location: index.php?c=admin");
								exit();
							}	
						}
						else
						{
							echo '<script>alert("Đăng nhập thất bại! Tài khoản đã bị khóa!");</script>';
							echo '<script>history.back();</script>';
						}
					}
					else
					{
						echo '<script>alert("Đăng nhập thất bại! Vui lòng kiểm tra lại thông tin đăng nhập!");</script>';
						echo '<script>history.back();</script>';
					}
				}
				else
				{
					header('Location: index.php?c=login');
					exit;
				}
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}

		//Hàm xử lý phần đăng ký tài khoản mới
		function signUp()
		{
			try
			{
				if(isset($_SESSION["userInfo"]))
				{
					header("Location: index.php?c=login&a=profile");
					exit();
				}
				else if(isset($_POST["submit"]))
				{
					$user = strtolower($_POST["txtUser1"]);
					$pass = md5($_POST["txtPassword1"]);
					$firstName = $_POST["txtFirstName"];
					$lastName = $_POST["txtLastName"];
					$gender = $_POST["txtGender"];
					/*Kiểm tra ngày sinh nếu có thì thay / thành - để strtotime(). Nếu dd/mm/YYYY thì không
					strtotime được nên phải thay dd-mm-YYYY*/
					$birth = isset($_POST["txtBirthDay"]) ? date("Y-m-d",strtotime(str_replace("/", "-", $_POST["txtBirthDay"]))) : "";
					$email = $_POST["txtEmail"];
					$phone = $_POST["txtPhone"];
					$address = $_POST["txtAddress"];
					$note = $_POST["txtNote"];
					$check = $this->accountModel->getInfo($user);
					if($check != null)
					{
						echo '<script>alert("Tài khoản đã tồn tại");</script>';
						echo '<script>history.back();</script>';
					}
					else
					{
						$createAcc = $this->accountModel->addNew($user,$pass,$firstName,$lastName,$gender,$birth,$email,$phone,$address,"public/imgs/avatar/user-default.jpg",2,$note);
						if($createAcc == 1)
						{
							$login = $this->accountModel->CheckAccount($user,$pass);
							if($login != null)
							{
								$_SESSION["userInfo"] = $login;
								header("Location: index.php");
								exit();
							}
						}
						else
						{
							$view = array('index' => 'index' );
							$this->view($view);
						}
					}
				}
				else
				{
					header("Location: index.php?c=login");
					exit();
				}
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}

		//Hàm xử lý phần đăng xuất tài khoản
		function signOut()
		{
			if(isset($_SESSION["userInfo"]))
			{
				$_SESSION["userInfo"] = null;
				header("Location: index.php");
				exit();
			}
		}

		//Hàm xử lý phần xem thông tin tài khoản
		function profile()
		{
			if (empty($_SESSION["userInfo"])) {
				header("Location: index.php?c=login");
				exit();
			}
			$rs = $this->accountModel->getInfo($_SESSION["userInfo"][0]->userName);
			$data = array('rs' => $rs );
			$view = array('profile' => 'profile' );
			$this->view($view,$data);
		}

		//Hàm cập nhật thông tin tài khoản
		function updateProfile()
		{
			if (isset($_POST["submit"])) {
				$user = $_SESSION["userInfo"][0]->userName;
				$firstName = $_POST["txtFirstName"];
				$lastName = $_POST["txtLastName"];
				$gender = $_POST["gender"];
				/*Kiểm tra ngày sinh nếu có thì thay / thành - để strtotime(). Nếu dd/mm/YYYY thì không
				strtotime được nên phải thay dd-mm-YYYY*/
				$birth = isset($_POST["txtBirthDay"]) ? date("Y-m-d",strtotime(str_replace("/", "-", $_POST["txtBirthDay"]))) : "";
				$email = $_POST["txtEmail"];
				$phone = $_POST["txtPhone"];
				$address = $_POST["txtAddress"];
				$note = $_POST["txtNote"];
				$this->accountModel->update($user,$firstName,$lastName,$gender,$birth,$email,$phone,$address,"public/imgs/avatar/user-default.jpg",2,1,$note);
				header("Location: index.php");
				exit();
			}
		}

		//Hàm đổi mật khẩu
		function changePassword()
		{
			if (isset($_POST["submit"])) {
				$user = $_SESSION["userInfo"][0]->userName;
				$pass = $_POST["txtPassword"];
				$pass1 = $_POST["txtPassword1"];
				$check = $this->accountModel->CheckAccount(strtolower($user),md5($pass));
				if ($check != null) {
					$this->accountModel->changePassword($user,md5($pass1));
					header("Location: index.php");
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
				$this->view($view);
			}
		}
	}
?>