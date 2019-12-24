<?php

namespace test_task1\src\Controllers;
use test_task1\src\Models\Product;
use test_task1\src\Models\Category;
use test_task1\src\Views\HomeViewer;


class HomeController{
	public function index($category_id=0, $sort_by = ''){
		$product = new Product();
		if($category_id==0 && $sort_by == '')
		{
			$products = $product->get_sorted_products_by_category_id(0, '');
		}
		else if($category_id>0 && $sort_by == '')
		{
			$products = $product->get_sorted_products_by_category_id($category_id, '');
		}
		else if($category_id==0 && $sort_by != ''){
			$products = $product->get_sorted_products_by_category_id(0, $sort_by);
		}
		else if($category_id>0 && $sort_by != ''){
			$products = $product->get_sorted_products_by_category_id($category_id, $sort_by);
		}
		$category = new Category();
		$categories = $category->getAll();
		$home = new HomeViewer();
        $home->index($products, $categories);
	}
	public function ajax($category_id, $sorted_by)
	{
		$product = new Product();
		echo json_encode($product->get_sorted_products_by_category_id($category_id, $sorted_by));
	}




	public function get_products_by_category_id($category_id){
		$product = new Product();
		echo json_encode($product->get_by_category_id($category_id));
	}

	public function get_sorted_products($sorted_by)
	{
		$product = new Product();
		echo json_encode($product->get_sorted_products($sorted_by));
	}
}