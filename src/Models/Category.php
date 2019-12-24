<?php

namespace test_task1\src\Models;



class Category{
	function __construct() {
		$this->dbh =  new \PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . ";charset=utf8;", USER, PASS, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);

	}
	public  function getAll(){
		$sql = "SELECT id, title FROM categories";
		$categories = $this->dbh->query($sql);
		return $categories->fetchAll();
		
	}
}