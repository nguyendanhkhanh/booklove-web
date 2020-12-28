<?php
	class Home extends Controller
	{
		private $productModel;
		//Trang hiện đại
        private $currentPage = 1;
        //Vị trí đang đứng
        private $position = 0;

        //Tổng số trang
        private $totalOfPage;
		function __construct()
		{
			require("application/models/product_model.php");
			$this->productModel = new Product;
			$this->currentPage = isset($_GET["p"]) ? $_GET["p"] : "1";
		}
		function index()
		{
			require("application/models/author_model.php");
			$authorModel = new Author();

			if($this->currentPage > 1)
			{
				$this->position = $this->currentPage * 15 - 15;
			}
			
			//Lấy toàn bộ danh sách sản phẩm với vị trí và số sản phẩm 1 trang được truyền vào
			$rs = $this->productModel->selectProduct(null,$this->position,15);

			 //Đếm tổng số sách theo category ID
            $this->totalOfPage = $this->productModel->TotalOfPage();
			
			$r = $authorModel->selectAuthor();
			
			$data = array('rs' => $rs, 'r' => $r,'totalOfPage' => $this->totalOfPage,'currentPage' => $this->currentPage, 'homepage' => 'homepage');
			$view = array('index' => 'index',"page" => "pagination" );
			//Xuất giao diện
			$this->view($view,$data);

		}
		function about()
		{
			$view = array('about' => 'about');
			//Xuất giao diện
			$this->view($view);
		}
	}
?>