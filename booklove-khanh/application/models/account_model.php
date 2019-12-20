<?php
	class Account extends Model
	{
		//Hàm kiểm tra đăng nhập
		function checkAccount($user, $pass)
		{
			//Câu truy vấn
			$sql = "SELECT * FROM account WHERE userName = '{$user}' AND passWord = '{$pass}'";

			//Thực thi câu truy vấn
			$q = $this->db->QueryResult($sql);

			//Trả về kết quả
			return $q->fetchAll(PDO::FETCH_CLASS);
		}

		//Hàm tạo tài khoản
		function addNew($user,$pass,$fName,$lName,$gender,$birthDay,$email,$phone,$address,$picture,$role,$note)
		{
			//Câu truy vấn
			$sql = "INSERT INTO account VALUES ('{$user}','{$pass}','{$fName}','{$lName}',{$gender},'{$birthDay}','{$email}','{$phone}','{$address}','{$picture}',{$role},1,'{$note}')";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}

		//Hàm cập nhật thông tin tài khoản
		function update($user,$fName,$lName,$gender,$birthDay,$email,$phone,$address,$picture,$role,$status,$note)
		{
			//Câu truy vấn
			$sql = "UPDATE account SET firstName = '{$fName}', lastName = '{$lName}', gender = {$gender}, birthDay = '{$birthDay}', email = '{$email}', phone = '{$phone}', address = '{$address}', picture = '{$picture}', id_role = {$role}, status = {$status}, note = '{$note}' WHERE userName = '{$user}'";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}

		//Hàm xoá tài khoản
		function remove($user)
		{
			//Câu truy vấn
			$sql = "DELETE FROM account WHERE userName = '{$user}'";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}

		//Hàm lấy thông tin tài khoản
		function getInfo($user)
		{
			//Câu truy vấn
			$sql = "SELECT userName,firstName,lastName,gender,birthday,email,phone,address,picture,id_role,status,note FROM account WHERE userName = '{$user}'";

			//Thực thi câu truy vấn
			$q = $this->db->QueryResult($sql);

			//Trả về kết quả
			return $q->fetchAll(PDO::FETCH_CLASS);
		}

		//Hàm lấy danh sách tài khoản
		function selectAccount($role = null)
		{
			//Nếu không truyền tham số thì sẽ hiển thị toàn bộ danh sách
			if($role == null)
				$sql = "SELECT userName,firstName,lastName,gender,birthday,email,phone,address,picture,id_role,status,note FROM account";
			else
				$sql = "SELECT userName,firstName,lastName,gender,birthday,email,phone,address,picture,id_role,status,note FROM account WHERE id_role = {$role} AND status = 1";
			//Thực thi câu truy vấn
			$q = $this->db->QueryResult($sql);

			//Trả về giá trị
			return $q->fetchAll(PDO::FETCH_CLASS);
		}

		//Hàm đổi mật khẩu
		function changePassword($user,$pass)
		{
			//Câu truy vấn
			$sql = "UPDATE account SET passWord = '{$pass}' WHERE userName = '{$user}'";

			//Thực thi câu truy vấn
			$q = $this->db->ExeQuery($sql);

			//Trả về kết quả
			return $q;
		}
	}
?>