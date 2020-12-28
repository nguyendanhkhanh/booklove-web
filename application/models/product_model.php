<?php
	class Product extends Model
	{
		//Lấy danh sách sản phẩm, chi tiết sản phẩm
		function selectProduct($id = null,$position = 0, $numb = 100)
		{
			//Nếu không chuyền id => load toàn bộ
			if($id==null)
			{
				//Câu truy vấn
				$sql = "SELECT pr.*, ca.nameCategory, p.nameProducer, au.nameAuthor FROM product AS pr, category AS ca, author AS au, producer AS p WHERE pr.id_pro = p.id_pro AND pr.id_author = au.id_author AND pr.id_category = ca.id_category ORDER BY pr.date DESC LIMIT {$position},{$numb}";
			}
			else
			{
				//Câu truy vấn
				$sql = "SELECT pr.*,ca.nameCategory,au.nameAuthor,p.nameProducer  FROM product AS pr, category AS ca, author AS au, producer AS p WHERE pr.id_pro = p.id_pro AND pr.id_author = au.id_author AND pr.id_category = ca.id_category AND pr.id_product = {$id}";
			}

			//Thực thi câu lệnh
			$q = $this->db->QueryResult($sql);

			//Trả về dữ liệu
			return $q->fetchAll(PDO::FETCH_CLASS);
		}

		function selectProductTop($numb)
		{
			//Cây truy vấn
			$sql = "SELECT * FROM product AS prd ORDER BY prd.date DESC LIMIT {$numb}";

			//Thực thi câu truy vấn
			$q = $this->db->QueryResult($sql);

			//Trả về kết quả
			return $q->fetchAll(PDO::FETCH_CLASS);
		}

		//Hàm tìm kiếm theo tên
		function search($kw = null)
		{
			//Nếu không truyền tham số thì select toàn bộ
			if($kw == null)
				//Câu truy vấn
				$sql = "SELECT * FROM product AS pr";
			else
				//Câu truy vấn
				$sql = "SELECT pr.* FROM product AS pr, author AS au, category AS ca, producer AS prc WHERE pr.id_author = au.id_author AND pr.id_category = ca.id_category AND pr.id_pro = prc.id_pro AND (nameProduct LIKE '%{$kw}%' OR nameAuthor LIKE '%{$kw}%' OR nameCategory LIKE '%{$kw}%' OR nameProducer LIKE '%{$kw}%')";

			//Thực thi câu truy vấn
			$q = $this->db->QueryResult($sql);

			//Trả về kết quả
			return $q->fetchAll(PDO::FETCH_CLASS);
		}

		//Hàm lấy sản phẩm theo id khi chọn menu
		function selectMenu($kw, $ca, $numb = null)
		{
			if($ca == "category")
				$id = "id_category";
			else if ($ca == "author")
				$id = "id_author";
			else
				$id = "id_pro";

			//Kiểm tra biến numb = null thì xuất toàn bộ ngược lại thì xuất theo giá trị numb
			if($numb==null)
				//Câu truy vấn
				$sql = "SELECT * FROM product WHERE {$id} = {$kw}";
			else
				//Câu truy vấn
				$sql = "SELECT * FROM product AS pr WHERE {$id} = {$kw} ORDER BY pr.date DESC LIMIT {$numb}";

			//Thực thi câu truy vấn
			$q = $this->db->QueryResult($sql);

			//Trả về kết quả
			return $q->fetchAll(PDO::FETCH_CLASS);
		}

		//Hàm xử lý phân trang sản phẩm
		function TotalOfPage($numb = 15)
        {
            //Câu Select
            $sql = "SELECT COUNT(id_product) AS COUNT FROM product";
            //Thực thi câu lệnh
            $runSql = $this->db->QueryResult($sql);

            //Lấy kết quả
            $result = $runSql->fetchAll(PDO::FETCH_CLASS);

            //Tính số trang cần có = tổng sản phẩm / số sản phẩm 1 trang
            $totalOfPage = ($result[0]->COUNT / $numb);

            if($totalOfPage <= 1)
            {
                return 1;
            }
            else
            {
                return round($totalOfPage+0.5,0,PHP_ROUND_HALF_UP);
            }

        }

        //Hàm thêm mới sản phẩm
        function addNewProduct($nameProduct,$id_category,$id_author,$id_pro,$picture,$descrip,$date,$price,$sale,$realPrice)
        {
        	//Câu truy vấn
        	$sql = "INSERT INTO product VALUES('null','{$nameProduct}',{$id_category},{$id_author},{$id_pro},'{$picture}','{$descrip}','{$date}',{$price},{$sale},{$realPrice})";

        	//Thực thi câu truy vấn
        	$q = $this->db->ExeQuery($sql);

        	//Trả về kết quả
        	return $q;
        }

        //Hàm cập nhật sản phẩm
        function updateProduct($id_product,$nameProduct,$id_category,$id_author,$id_pro,$picture,$descrip,$date,$price,$sale,$realPrice)
        {
        	//Câu truy vấn
        	$sql = "UPDATE product AS pr SET nameProduct = '{$nameProduct}', id_category = {$id_category}, id_author = {$id_author}, id_pro = {$id_pro}, picture = '{$picture}', descrip = '{$descrip}', pr.date = '{$date}', price = {$price}, sale = {$sale}, realPrice = {$realPrice} WHERE id_product = {$id_product}";

        	//Thực thi câu truy vấn
        	$q = $this->db->ExeQuery($sql);

        	//Trả về kết quả
        	return $q;

        }

        //Hàm xoá sản phẩm
        function removeProduct($id_product)
        {
        	//Câu truy vấn
        	$sql = "DELETE FROM product WHERE id_product = {$id_product}";

        	//Thực thi câu truy vấn
        	$q = $this->db->ExeQuery($sql);

        	//Trả về kết quả
        	return $q;
        }
	}
?>