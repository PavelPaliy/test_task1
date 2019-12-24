<?php
namespace test_task1\src\Views;
class HomeViewer
{
    public function index($products, $categories){
        $loader = new \Twig\Loader\FilesystemLoader($_SERVER['DOCUMENT_ROOT']."/src/Views/Templates");
        $twig = new \Twig\Environment($loader);
        echo $twig->render('index.html', ['products'=>$products, 'categories'=>$categories]);
    }
}