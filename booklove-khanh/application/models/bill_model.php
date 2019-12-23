<?php 
	class Bill extends Model
	{
		//Hàm lấy danh sách đơn hàng
		function selectBill($id = null)
		{
			//Kiểm tra có id truyền vào không. Nếu không thì lấy toàn bộ
			if($id == null)
				$sql = "SELECT * FROM bill AS b ORDER BY b.date DESC";
			else
				$sql = "SELECT * FROM bill AS b WHERE id_bill = {$id} ORDER BY b.date DESC";

			//Thực thi câu truy vấn
			$q = $this->db->QueryResult($sql);
			//Trả về kết quả
			return $q->fetchAll(PDO::FETCH_CLASS);
		}

		//Lấy danh sách chi tiết đơn hàng
		function selectBillDetail($id = null)
		{
			//Kiểm tra có id truyền vào không. Nếu không thì lấy toàn bộ
			if($id == null)
				$sql = "SELECT billdetail.*, product.nameProduct FROM billdetail, product where billdetail.id_product=product.id_product";
			else
				$sql = "SELECT billdetail.*, product.nameProduct FROM billdetail, product where billdetail.id_product=product.id_product and id_bill = {$id} ";

			//Thực thi câu truy vấn
			$q = $this->db->QueryResult($sql);
			//Trả về kết quả
			return $q->fetchAll(PDO::FETCH_CLASS);
		}

		//Hàm tạo đơn hàng
		function createBill($fullName,$phone,$email,$address,$date,$status,$payments,$total,$note)
		{
			//Câu truy vấn
			$sql = "INSERT INTO bill VALUES('null','{$fullName}','{$phone}','{$email}','{$address}','{$date}',{$status},'{$payments}',{$total},'{$note}')";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}

		//Hàm tạo chi tiết đơn hàng
		function createBillDetail($idBill,$idPro,$number,$total)
		{
			//Câu truy vấn
			$sql = "INSERT INTO billdetail VALUES({$idBill},{$idPro},{$number},{$total})";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}

		//Hàm cập nhật hóa đơn
		function updateBill($id,$stt)
		{
			//Câu truy vấn
			$sql = "UPDATE bill SET status = {$stt} WHERE id_bill = {$id}";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}
	}
 ?>