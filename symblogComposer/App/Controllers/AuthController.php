<?php
namespace App\Controllers;
use App\Models\User;
use Laminas\Diactoros\Response\RedirectResponse;

class AuthController extends BaseController {
    public function formLogin(){
        return $this->renderHTML("login.twig");
    }

    public function postLogin($request){
        $postData = $request->getParsedBody();
        $responseMessage = null;

        $user = User::where("mail", $postData["mail"])->first();
        if($user){
            if(password_verify($postData["pass"], $user->pass)){
                $_SESSION["userId"] = $user->id;
                $responseMessage = "OK Credentials";
                return new RedirectResponse("/admin");
            }  else{
                echo "poosdata   ".$postData["pass"];
                echo "user pass  ".$user->pass;
                $responseMessage = "Bad Credentials 222";
            }
        } else{
            $responseMessage = "Bad Credentials";
        }
        return $this->renderHTML("login.twig", ["responseMessage" => $responseMessage]);
    }

    public function getLogout(){
        unset($_SESSION["userId"]);
        return new RedirectResponse("/formLogin");
    }
}