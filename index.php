<?php
require __DIR__ . "/vendor/autoload.php";

include($_SERVER['DOCUMENT_ROOT']."/config.php");
$home = new test_task1\src\Controllers\HomeController();
if(count($_GET)==0) {
    $home->index();
}
/*else if(preg_match('/ajax/', $_GET["key"]))
{
	var_dump($_GET);
}*/
else if(@$_GET['m'] == 'ajax')
{
	if(isset($_GET['category_id']) && !isset($_GET['sort_by']))
	{
		$home->ajax($_GET['category_id'], '');
	}
	else if(!isset($_GET['category_id']) && isset($_GET['sort_by']))
	{
		$home->ajax(0, $_GET['sort_by']);
	}
	else if(isset($_GET['category_id']) && isset($_GET['sort_by']))
	{
		$home->ajax($_GET['category_id'], $_GET['sort_by']);
	}
	
}
else if(isset($_GET['category_id']) && isset($_GET['sort_by']))
{
	$home->index($_GET['category_id'], $_GET['sort_by']);
}
else if(!isset($_GET['category_id']) && isset($_GET['sort_by']))
{
	$home->index(0, $_GET['sort_by']);
}
else if(isset($_GET['category_id']) && !isset($_GET['sort_by']))
{
	$home->index($_GET['category_id'], '');
}
