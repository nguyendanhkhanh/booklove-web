<?php
	require("application/settings/init.php");
	require("application/core/controller.php");
	require("application/core/model.php");
	require("application/core/database.php");
	
	class Bootstrap
	{
		
		function __construct()
		{
			//Chạy sesssion
			session_start();
			global $app_path, $contr_path, $view_path, $model_path;
			//Tạo biến bỏ fix cứng
			$this->app_path = $app_path;
			$this->contr_path = $contr_path;
			$this->view_path = $view_path;
			$this->model_path = $model_path;
		}
		function Init()
		{
			//Kiểm tra dữ liệu gửi qua. Nếu không có thì mặc định là home
			$controller = isset($_GET["c"]) ? $_GET["c"] : "home";

			//Nếu file yêu cầu không tồn tại thì đẩy tới trang lỗi
			if(!file_exists("$this->app_path/$this->contr_path/$controller.php"))
			{
				require("$this->app_path/$this->contr_path/404.php");
				return;
			}
			//Nếu không có lỗi nào trong quá trình kiểm tra thì gọi file controller đó lên
			require("$this->app_path/$this->contr_path/$controller.php");

			//Sau khi gọi controller lên tiếp tục kiểm tra class
			if(!class_exists($controller))
			{
				require("$this->app_path/$this->contr_path/404.php");
				return;
			}
			//Tạo đối tượng
			$c = new $controller;
			$action = isset($_GET["a"]) ? $_GET["a"] : "index";
			if(!method_exists($controller, $action))
			{
				require("$this->app_path/$this->contr_path/404.php");
				return;
			}
			$c->$action();
		}
	}
?>