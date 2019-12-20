<?php 
	class Admin_edit_bill extends Controller
	{
		private $billModel;
		private $productModel;
		function __construct()
		{
			require("application/models/bill_model.php");
			require("application/models/product_model.php");
			$this->billModel = new Bill;
			$this->productModel = new Product;
		}

		function index()
		{
			$id = $_GET["id_bill"];

			//Tạo biến lấy danh sách chi tiết hoá đơn
			$rs = $this->billModel->selectBillDetail($id);

			$bill = $this->billModel->selectBill($id);

			$view = array('index' => 'index' );
			$data = array('rs' => $rs, 'bill' => $bill );

			//Đổ dữ liệu ra view
			$this->view($view,$data,false,true);
		}

		function updateBill()
		{
			$stt = $_POST["slStatus"];
			$id = $_GET["id_bill"];
			// var_dump($stt);
			// var_dump($id);
			$this->billModel->updateBill($id,$stt);
			header("Location: index.php?c=admin&a=listBill");
			exit;			
		}
	}
 ?>