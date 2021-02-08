<?php
namespace App\Controllers;
use App\Models\Blog;

class IndexController{
    public function indexAction(){
        $blogs = Blog::all();
        include "../views/index.twig";
    }
    public function aboutAction(){
        include "../about.php";
    }
    public function contactAction(){
        include "../contact.php";
    }
    public function addBlogAction(){
        include "../addBlog.php";
    }
    public function showAction(){
        include "../show.php";
    }
}
?>