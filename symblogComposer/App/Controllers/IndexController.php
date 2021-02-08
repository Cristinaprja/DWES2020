<?php
namespace App\Controllers;
use App\Models\Blog;

class IndexController extends BaseController{
    public function indexAction(){
        $blogs = Blog::all();
        echo $this->renderHTML("index.twig", ["blogs" => $blogs]);
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