<?php

	class Category extends Model
	{
		
		//Hàm lấy toàn bộ thông tin bảng thể loại
		function selectCategory($id = null)
		{
			if($id == null)
				//Câu truy vấn
				$sql = "SELECT * FROM category";
			else
				$sql = "SELECT * FROM category WHERE id_category = {$id}";

			//Thực thi câu truy vấn
			$q = $this->db->QueryResult($sql);
			
			//Trả về kết quả
			return $q->fetchAll(PDO::FETCH_CLASS);
		}
		//Hàm thêm mới thể loại
		function addNewCategory($nameCategory)
		{
			//Câu truy vấn
			$sql = "INSERT INTO category(nameCategory) VALUES('".$nameCategory."')";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}
		//Hàm cập nhật thể loại
		function updateCategory($id_cat,$nameCategory)
		{
			//Câu truy vấn
			$sql = "UPDATE category SET nameCategory = '{$nameCategory}' WHERE id_category = {$id_cat}";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}
		//Hàm xoá thể loại
		function removeCategory($id_cat)
		{
			//Câu truy vấn
			$sql = "DELETE FROM category WHERE id_category = {$id_cat}";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}
	}
?>