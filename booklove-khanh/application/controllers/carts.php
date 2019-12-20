<?php 
	class Carts extends Controller
	{
		private $cartModel;
		private $billModel;
		private $productModel;

		//Biến chứa danh sách thông tin book được lưu trong giỏ hàng
    	private $listCart;
		function __construct()
		{
			require("application/models/cart_model.php");
			require("application/models/bill_model.php");
			require("application/models/product_model.php");
			$this->cartModel = new Cart;
			$this->billModel = new Bill;
			$this->productModel = new Product;

			global $app_path, $contr_path;
			//Tạo biến bỏ fix cứng
			$this->app_path = $app_path;
			$this->contr_path = $contr_path;
		}
		function index()
		{
			//Kiểm tra khi vào giỏ hàng nếu giỏ hàng trống quay lại trang home
	        if(empty($_SESSION["cart"]))
	        {
	            header('Location: index.php?c=home');
	            exit;
	        }
	        //Nếu giỏ hàng không trống thì tạo ra 2 biến 1 biến chứa danh sách book ID
	        // và một biến chứa danh sách số lượng sách tương ứng với từng book id trong giỏ hàng
	        $listBookID = array();
	        $listBookQuality = array();
	        $count = count($_SESSION["cart"]);
	        for($i = 0; $i < $count; $i++)
	        {
	            if(empty($_SESSION["cart"][$i]))
	            {
	                $count++;
	                continue;
	            }
	            $listBookID[] = $_SESSION["cart"][$i][0];
	            $listBookQuality[] = $_SESSION["cart"][$i][1];
	        }
	        //Sau khi có danh sách book ID thì truyền vào model và model sẽ trả về để thông tin đầy đủ của từng cuốn sách
        	$this->listCart = $this->cartModel->getProductByMultipleID($listBookID);

        	//Truyền danh sách các sản phẩm trong giỏ hàng vào biến data
        	$data = array('listCart' => $this->listCart,'listBookQuality' => $listBookQuality );

			$view = array('index' => 'index' );
			$this->view($view,$data);
		}

		//Hàm thêm sản phẩm vào session
		function addCart()
		{
			//Lấy book id từ nút nhấn giỏ hàng
        	$bookID = $_POST["id"];
        	//Kiểm tra nếu giỏ hàng trống thì tạo ra giỏ hàng dạng array
	        if(empty($_SESSION["cart"]))
	        {
	            $_SESSION["cart"] = array();
	        }
	        //Sau Khi tạo array cho giỏ hàng thì kiểm trả 1 lần nữa nếu giỏ hàng không có dữ liệu thì add vào
	        if(empty($_SESSION["cart"])) {

	            array_push($_SESSION["cart"],array(0=>$bookID,1=>1));
	            echo count($_SESSION["cart"]);
	        }
	        else
	        {
	            //Đếm số lượng sách có trong giỏ hàng
	            $count = count($_SESSION["cart"]);

	            //Thuật toán thêm sách vào giỏ hàng khi giỏ hàng không trống
	            for($i=0 ; $i < $count ; $i++)
	            {

	                if(empty($_SESSION["cart"][$i]))
	                {

	                    $count++;
	                    continue;
	                }

	                if($bookID == $_SESSION["cart"][$i][0])
	                {
	                    $_SESSION["cart"][$i][1]++;
	                    break;
	                }

	                if($i + 1 == $count)
	                {
	                    array_push($_SESSION["cart"],array(0=>$bookID,1=>1));
	                    echo count($_SESSION["cart"]);
	                }

	            }
	        }
		}

		//Xoá sản phẩm trong giỏ hàng
		function removeItem()
		{
			$count = count($_SESSION["cart"]);
	        for($i = 0; $i < $count; $i++)
	        {
	            if(empty($_SESSION["cart"][$i]))
	            {
	                $count++;
	                continue;
	            }
	            if($_POST["id"] == $_SESSION["cart"][$i][0])
	            {
	                unset($_SESSION['cart'][$i]);
	                echo count($_SESSION["cart"]);
	            }
	        }
		}

		//Cập nhật giỏ hàng khi khách thay đổi số lượng
		function updateCart()
		{
			$count = count($_SESSION["cart"]);
	        for($i = 0; $i < $count; $i++)
	        {
	            if(empty($_SESSION["cart"][$i]))
	            {
	                $count++;
	                continue;
	            }

	            if($_POST["id"] == $_SESSION["cart"][$i][0])
	            {
	                $_SESSION['cart'][$i][1] = $_POST['quality'];
	                var_dump($_SESSION['cart'][$i][1]);
	            }
	        }
	        echo count($_SESSION["cart"]);
		}

		//Xóa hết trong giỏ hàng
	    function deleteCart()
	    {
	        unset($_SESSION["cart"]);
	        header('Location: index.php?c=home');
	        exit;
	    }

		//Hàm thanh toán giỏ hàng
		function pay()
		{
			if(isset($_POST["submit"]))
			{
				$fullName = $_POST["txtFullName"];
				$phone = $_POST["txtPhone"];
				$email = $_POST["txtEmail"];
				$address = $_POST["txtAddress"];
				$date = date("Y-m-d");
				$status = 0;
				if($_POST["slPayments"]==0)
					$payments = "Giao hàng";
				else
					$payments = "Thẻ";
				$total = $_POST["txtTotal"];
				$note = $_POST["txtNote"];
				// echo '<pre>';
				// var_dump($_SESSION["cart"]);
				// echo '</pre>';
				$this->billModel->createBill($fullName,$phone,$email,$address,$date,$status,$payments,$total,$note);
				$rs = $this->cartModel->GetMaxID();
				$idBill = $rs[0]->maxIdBill;
				foreach ($_SESSION["cart"] as $key => $value) {
					$idPr = $value[0];
					$quality = $value[1];
					$infoPr = $this->productModel->selectProduct($idPr);
					$price = $infoPr[0]->realPrice;
					$total = $quality * $price;
					$this->billModel->createBillDetail($idBill,$idPr,$quality,$total);
				}

				require("$this->app_path/$this->contr_path/success.php");
			}
			else
			{
				
				$view = array('pay' => 'pay');
				$this->view($view);
			}
		}
	}
 ?>