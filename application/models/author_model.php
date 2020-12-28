<?php
	class Author extends Model
	{
		//Hàm lấy danh sách tác giả
		function selectAuthor($id = null)
		{
			if($id == null)
				//Câu truy vấn
				$sql = "SELECT * FROM author";
			else
				$sql = "SELECT * FROM author WHERE id_author = {$id}";

			//Thực thi câu truy vấn
			$q = $this->db->QueryResult($sql);

			//Trả về kết quả
			return $q->fetchAll(PDO::FETCH_CLASS);
		}

		//Hàm thêm tác giả
		function addNewAuthor($name,$picture,$story)
		{
			//Câu truy vấn
			$sql = "INSERT INTO author(nameAuthor,picture,story) VALUES('{$name}','{$picture}','{$story}')";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}

		//Hàm cập nhật thông tin tác giả
		function updateAuthor($id,$name,$picture,$story)
		{
			//Câu truy vấn
			$sql = "UPDATE author SET nameAuthor = '{$name}', picture = '{$picture}', story = '{$story}' WHERE id_author = {$id}";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}

		//Hàm xoá tác giả
		function removeAuthor($id)
		{
			//Câu truy vấn
			$sql = "DELETE FROM author WHERE id_author = {$id}";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}
	}

?>