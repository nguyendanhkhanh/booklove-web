<?php
	class Database
	{
		private $db;
		function __construct()
		{
			global $host,$dbName,$user,$pass;
			$this->db = new PDO("mysql:host=$host;dbname=$dbName;charset=UTF8","$user","$pass");
		}

		//Dùng thực thi câu select
		function QueryResult($sql)
		{
			$query = $this->db->prepare($sql);
			$query->execute();
			return $query;
		}

		//Dùng thực thi câu truy vấn không trả về danh sách
		function ExeQuery($sql)
		{
			$query = $this->db->exec($sql);
            return $query;
		}
	}
?>