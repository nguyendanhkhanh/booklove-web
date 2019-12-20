<?php 
	class Admin_edit_producer extends Controller
	{
		private $producerModel;
		function __construct()
		{
			require("application/models/producer_model.php");
			$this->producerModel = new Producer;
		}

		function index()
		{
			if(isset($_GET["id"]))
			{
				$id = $_GET["id"];
				$rs = $this->producerModel->selectProducer($id);
				$data = array('rs' => $rs );
			}
			else
			{
				$data = null;
			}
			$view = array('index' => 'index' );
			$this->view($view,$data,false,true);
		}
		//Hàm thêm thể loại
		function createProducer()
		{
			try {
				$nameProducer = $_POST["txtNXB"];
				$this->producerModel->addNewProducer($nameProducer);
				echo '<script>alert("Tạo thành công!");</script>';
				echo '<script>window.location="index.php?c=admin&a=listProducer"</script>';
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}

		//Hàm cập nhật thể loại
		function updateProducer()
		{
			try {
				$id = $_GET["id"];
				$nameProducer = $_POST["txtNXB"];
				$this->producerModel->updateProducer($id,$nameProducer);
				header("Location: index.php?c=admin&a=listProducer");
				exit;
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
		//Hàm xoá thể loại
		function removeProducer()
		{
			try{
				$id = $_POST["idData"];
				$this->producerModel->removeProducer($id);
			}
			catch (Exception $e) {
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
		}
	}
 ?>