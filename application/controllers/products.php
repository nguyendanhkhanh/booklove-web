<?php
	class Products extends Controller
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
			if($this->currentPage > 1)
			{
				$this->position = $this->currentPage * 12 - 12;
			}
			//Kiểm tra biến truyền qua là tìm kiếm hay lấy menu
			if(isset($_GET["txtSearch"]))
			{
				$search = $_GET["txtSearch"];
				$rs = $this->productModel->search($search);
			}
			else if (isset($_GET["kw"]) && isset($_GET["ca"]))
			{
				$kw = $_GET["kw"];
				$ca = $_GET["ca"];
				$rs = $this->productModel->selectMenu($kw, $ca);
			}
			else
			{
				//Nếu không có biến truyền qua thì lấy toàn bộ sản phẩm 
				$rs = $this->productModel->selectProduct(null,$this->position,12);
			}
			 //Đếm tổng số sách theo category ID
            $this->totalOfPage = $this->productModel->TotalOfPage(12);

			$view = array('index' => 'index', 'page' => 'pagination' );
			$data = array('rs' => $rs,'totalOfPage' => $this->totalOfPage,'currentPage' => $this->currentPage);
			$this->view($view,$data);
		}

		//Hàm xử lí chi tiết sản phẩm
		function detail()
		{
			//Lấy giá trị id từ get
			$id = isset($_GET["id"]) ? $_GET["id"] : "";

			//Tạo biến lấy giá trị kết quả của hàm model trả về sản phẩm theo id
			$rs = $this->productModel->selectProduct($id);


			//Tạo biến lấy giá trị kết quả của hàm model trả về sản phẩm theo loại
			$rsCa = $this->productModel->selectMenu($rs[0]->id_category,"category",3);

			//Tạo biến lấy giá trị kết quả của hàm model trả về sản phẩm theo tác giả
			$rsAu = $this->productModel->selectMenu($rs[0]->id_author,"author",3);

			//Tạo biến lấy giá trị kết quả của hàm model trả về sản phẩm theo nhà xuất bản
			$rsPr = $this->productModel->selectMenu($rs[0]->id_pro,"producer",3);

			//Tạo biến lấy giá trị kết quả của hàm model trả về top 5 sản phẩm
			$rsTop = $this->productModel->selectProductTop(5);

			//Tạo array bỏ kết quả vô
			$data = array('rs' => $rs, 'rsTop' => $rsTop, 'rsCa' => $rsCa, 'rsAu' => $rsAu, 'rsPr' => $rsPr);
			$view = array('detail' => 'detail' );
			//Trả kết quả về trong chi tiết
			$this->view($view,$data);
		}
	}
?>