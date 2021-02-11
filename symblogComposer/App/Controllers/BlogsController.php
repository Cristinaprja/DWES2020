<?php
namespace App\Controllers;
use App\Models\Blog;
use Respect\Validation\Validator as v;

class BlogsController extends BaseController{
    public function getAddBlogAction($request){
        $responseMessage = null;

        if($request->getMethod() == 'POST'){
            $postData = $request->getParsedBody();
            $blogValidator = v::key('title',v::stringType()->notEmpty())
                            ->key('description',v::stringType()->notEmpty())
                            ->key('tags',v::stringType()->notEmpty())
                            ->key('author',v::stringType()->notEmpty());
            
            try{
                $blogValidator -> assert($postData);
                $blog = new Blog();
                $blog->title = $postData['title'];
                $blog->blog = $postData['description'];
                $blog->tags = $postData['tags'];
                $blog->author = $postData['author'];
                //carga de ficheros
                $files = $request ->getUploadedFiles();
                $imagen = $files['imagen'];
                if($imagen->getError() == UPLOAD_ERR_OK){
                    $fileName = $imagen->getClientFilename();
                    $fileName = uniqid().$fileName;
                    $imagen->moveTO("../public/img/$fileName");
                    $blog-> img = $fileName;
                }
                $blog->save();
                $responseMessage = "Saved";
            }catch(\Exception $e){
                $responseMessage = $e->getMessage();
            }
        }
        return $this->renderHTML('addBlog.twig',['responseMessage'=>$responseMessage]);
    }
}
?>