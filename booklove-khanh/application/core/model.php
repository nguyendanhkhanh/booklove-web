<?php
	class Model
	{
		public $db, $className;

		function __construct()
		{
			$this->className = get_class($this);
			$this->db = new Database();
		}
	}
?>