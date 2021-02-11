<?php
namespace App\Controllers;
use App\Models\Blog;
class IndexController extends BaseController{
    public function indexAction(){
        $blogs = Blog::all();
        echo $this->renderHTML("index.twig", ["blogs" => $blogs]);
    }
    public function aboutAction(){
        echo $this->renderHTML("about.twig");
    }
    public function contactAction(){
        echo $this->renderHTML("contact.twig");
    }
    public function addBlogAction(){
        echo $this->renderHTML("addBlog.twig");
    }
    public function showAction(){
        echo $this->renderHTML("show.twig");
    }
}
?>