<?php
	class Authors extends Controller
	{
		private $authorModel;
		private $productModel;
		function __construct()
		{
			require("application/models/author_model.php");
			require("application/models/product_model.php");
			$this->authorModel = new Author;
			$this->productModel = new Product;
		}
	    //hàm xử lý danh sách tác giả và lấy thông tin chi tiết tác giả
		function index()
		{
			$id_au = isset($_GET["id"]) ? $_GET["id"] : "";

			if($id_au != "")
			{
				//tạo biến lấy giá trị
				$rs = $this->authorModel->selectAuthor($id_au);
				//tạo mảng
				$data= array('rs'=>$rs);
				$view = array('index' => 'index' );
				//trả về kết quả
				$this->view($view,$data);
			}
			else
			{
				//tạo biến lấy giá trị
				$rs = $this->authorModel->selectAuthor();
				//tạo mảng
				$data= array('rs'=>$rs);
				$view = array('index' => 'index' );
				//trả về kết quả
				$this->view($view,$data);
			}
		}
		//Hàm xử lý chi tiết tác giả
		function detail()
		{
			$id = $_GET["id"]?$_GET["id"]:"";

			//Tạo biến lấy thông tin tác giả theo id
			$rs = $this->authorModel->selectAuthor($id);

			//Tạo biến lấy sản phẩm liên quan tới tác giả
			$prod = $this->productModel->selectMenu($id,"author");

			//Tạo mảng
			$data = array('rs' => $rs, 'prod' => $prod );
			$view = array('detail' => 'detail');

			//Trả về kết quả
			$this->view($view,$data);
		}
	}
?>