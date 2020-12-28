<?php 
	class Cart extends Model
	{
		function getProductByMultipleID($listID)
		{
			$list = join(",",$listID);

			//Câu truy vấn lấy các sách theo danh sách id
			$sql = "SELECT * FROM product WHERE id_product IN($list) ORDER BY FIELD(id_product,$list)";

			//Thực thi câu select
			$q = $this->db->QueryResult($sql);

			//Trả về kết quả
			return $q->fetchAll(PDO::FETCH_CLASS);
		}
		function GetMaxID()
        {

            //Câu Select
            $sql = "SELECT MAX(id_bill) AS maxIdBill FROM bill ";

            //Thực thi câu lệnh
            $runSql = $this->db->QueryResult($sql);

            //Trả về dữ liệu
            return $runSql->fetchAll(PDO::FETCH_CLASS);
        }
	}
 ?>