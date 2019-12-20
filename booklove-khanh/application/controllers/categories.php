<?php 
	class Categories extends Controller
	{
		private categoryModel;
		function __construct()
		{
			require("application/models/category_model.php");
			$this->categoryModel = new Category;
		}
		function insertCat()
		{
			$this->categoryModel->insertCategory();
		}
	}
 ?>