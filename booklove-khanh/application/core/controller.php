<?php
	class Controller
	{
		
		function view($viewname, $data = null, $uselayout = true, $rolelayout = false)
		{
			if($data != null)
			{
				foreach ($data as $key => $value) {
					$$key = $value;
				}
			}

			global $app_path,$contr_path,$view_path,$model_path;
			$controller_name = get_class($this);
			//Nếu như useplayout = true thì gọi header
			if($uselayout)
			{
				require("$app_path/$view_path/shared/header.php");
			}
			//Nếu như rolelayout = true thì gọi adminHeader
			if($rolelayout)
			{
				require("$app_path/$view_path/shared/adminHeader.php");
			}

			if($viewname != null)
			{
				foreach ($viewname as $key => $value) {
					//Kiểm tra key có chứa chuỗi kí tự "page" không
					if(strpos($key,"page") !== false)
					{
						//Xuất phần chia trang
						require("$app_path/$view_path/shared/".strtolower($value).".php");
					}
					else
					{
						require("$app_path/$view_path/$controller_name/".strtolower($value).".php");
					}
				}
			}
			
			//Nếu như useplayout = true thì gọi footer
			if($uselayout)
			{
				require("$app_path/$view_path/shared/footer.php");
			}
			//Nếu như rolelayout = true thì gọi adminFooter
			if($rolelayout)
			{
				require("$app_path/$view_path/shared/adminFooter.php");
			}
		}
	}
?>