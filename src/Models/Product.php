<?php

namespace test_task1\src\Models;



class Product{
	function __construct() {
		$this->dbh =  new \PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . ";charset=utf8;", USER, PASS, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);

	}
	public  function getAll(){
		$sql = "SELECT id, title, price, added FROM products";
		$products = $this->dbh->query($sql);
		return $products->fetchAll();
	}


	public function get_sorted_products_by_category_id($category_id=0, $sort_by='')
	{
		if($category_id>0 && $sort_by == '')
		{
			$sql = "SELECT id, title, price, added FROM products WHERE category_id=:category_id";
			$products = $this->dbh->prepare($sql);
			$products->execute(['category_id'=>$category_id]);
			return $products->fetchAll(\PDO::FETCH_ASSOC);
		}
		else if($category_id==0 && $sort_by == '')
		{
			$sql = "SELECT id, title, price, added FROM products";
			$products = $this->dbh->query($sql);
			return $products->fetchAll();
		}
		elseif ($category_id==0 && $sort_by != '') {
			if($sort_by == 'abc')
			{
				$sql = 'SELECT id, title, price, added FROM products ORDER BY title';
				$products = $this->dbh->query($sql);
				return $products->fetchAll(\PDO::FETCH_ASSOC);
			}
			if($sort_by == 'price')
			{
				$sql = 'SELECT id, title, price, added FROM products ORDER BY price';
				$products = $this->dbh->query($sql);
				return $products->fetchAll(\PDO::FETCH_ASSOC);
			}
			if($sort_by == 'date')
			{
				$sql = 'SELECT id, title, price, added FROM products ORDER BY added DESC';
				$products = $this->dbh->query($sql);
				return $products->fetchAll(\PDO::FETCH_ASSOC);
			}
		}
		elseif ($category_id>0 && $sort_by != '') {
			if($sort_by == 'abc')
			{
				$sql = 'SELECT id, title, price, added FROM products where category_id = :category_id order by title';
				$products = $this->dbh->prepare($sql);
				$products->execute(['category_id'=>$category_id]);
				return $products->fetchAll(\PDO::FETCH_ASSOC);
			}
			if($sort_by == 'price')
			{
				$sql = 'SELECT id, title, price, added FROM products where category_id = :category_id order by price';
				$products = $this->dbh->prepare($sql);
				$products->execute(['category_id'=>$category_id]);
				return $products->fetchAll(\PDO::FETCH_ASSOC);
			}
			if($sort_by == 'date')
			{
				$sql = 'SELECT id, title, price, added FROM products where category_id = :category_id order by added DESC';
				$products = $this->dbh->prepare($sql);
				$products->execute(['category_id'=>$category_id]);
				return $products->fetchAll(\PDO::FETCH_ASSOC);
			}
		}
		return '';
	}


	public function get_by_category_id($category_id)
	{
		$sql = "SELECT id, title, price, added FROM products WHERE category_id=:category_id";
		$products = $this->dbh->prepare($sql);
		$products->execute(['category_id'=>$category_id]);
		return $products->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function get_sorted_products($sort_by)
	{
		if($sort_by == 'abc')
		{
			$sql = 'SELECT id, title, price, added FROM products ORDER BY title';
			$products = $this->dbh->query($sql);
			return $products->fetchAll(\PDO::FETCH_ASSOC);
		}
		if($sort_by == 'price')
		{
			$sql = 'SELECT id, title, price, added FROM products ORDER BY price';
			$products = $this->dbh->query($sql);
			return $products->fetchAll(\PDO::FETCH_ASSOC);
		}
		if($sort_by == 'date')
		{
			$sql = 'SELECT id, title, price, added FROM products ORDER BY added DESC';
			$products = $this->dbh->query($sql);
			return $products->fetchAll(\PDO::FETCH_ASSOC);
		}
		return '';
	}
}