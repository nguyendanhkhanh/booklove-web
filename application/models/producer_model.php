<?php 
	class Producer extends Model
	{
		function selectProducer($id_pro = null)
		{
			if($id_pro == null)
			{
				//Câu truy vấn
				$sql = "SELECT * FROM producer";
			}
			else
			{
				//Câu truy vấn
				$sql = "SELECT * FROM producer WHERE id_pro = {$id_pro}";
			}
			//Thưc thi câu truy vấn
			$q = $this->db->QueryResult($sql);

			//Trả về kết quả
			return $q->fetchAll(PDO::FETCH_CLASS);
		}
		//Hàm thêm mới NXB
		function addNewProducer($nameProducer)
		{
			//Câu truy vấn
			$sql = "INSERT INTO producer(nameProducer) VALUES('".$nameProducer."')";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}
		//Hàm cập nhật NXB
		function updateProducer($id,$nameProducer)
		{
			//Câu truy vấn
			$sql = "UPDATE producer SET nameProducer = '{$nameProducer}' WHERE id_pro = {$id}";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}
		//Hàm xoá thể NXB
		function removeProducer($id)
		{
			//Câu truy vấn
			$sql = "DELETE FROM producer WHERE id_pro = {$id}";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}
	}
?>