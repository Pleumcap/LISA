<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;
use Phalcon\Flash\Session;

class UserController extends ControllerBase
{
    public function indexAction()
    {
    }
    public function loginAction()
    {

        if($this->request->isPost()) {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $field = array(
            "username/email" => $username,
            "password" => $password
          );
        
        $result = parent::curlApi("authen/login","POST",json_encode($field), $token = 'nonToken');
        if ($result->status == 'success'){
            $this->session->set("access_token",$result->data->access_token);
            $this->session->set("expires_token",$result->data->expires_token);
            $this->session->set("permission",$result->data->permission);
            $this->session->set("picture",$result->data->picture);
            $this->session->set("refresh_token", $result->data->refresh_token);
            $this->session->set("status",$result->data->status);
            $this->session->set("userId",$result->data->userId);
            $this->session->set("username",$result->data->username);
        }
       
        return json_encode( $result);
        }
        
    }

    public function signupAction()
    {  
        if ($this->request->isPost()) {
            $username = $this->request->getPost('username');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $password_confirm = $this->request->getPost('password_confirm');
            
                $field = array (
                    //set input array to curlapi function
                    "username" => $username,
                    "email" => $email,
                    "password" => $password,
                    "passwordConfirm" => $password_confirm
                );
                $result = parent::curlApi("authen/register","POST",json_encode($field), $token = 'nonToken');
            if ($result->status == 'success'){
                // $this->flash->success($result->message);
                // $this->session->set("token",$result->data->access_token);
                // $this->session->set("refresh_token", $result->data->refresh_token);
                // $result = parent::curlApi("account/profile", "GET", "", $token = $this->session->get("token"));
                // $this->session->set('viewProfile',$result);
                // $this->response->redirect("lisa/authen/main");
                $this->session->set("access_token",$result->data->access_token);
                $this->session->set("expires_token",$result->data->expires_token);
                $this->session->set("permission",$result->data->permiss);
                $this->session->set("picture",$result->data->picture);
                $this->session->set("refresh_token", $result->data->refresh_token);
                $this->session->set("status",$result->data->status);
                $this->session->set("userId",$result->data->userId);
                $this->session->set("username",$result->data->username);
            } else {
                //password and password_confirm doesn't match
                $this->flashSession->error($result->message);
            }
            return json_encode( $result);
        }
    
    }
    
    public function logoutAction()
    {   
        $result = parent::curlApi("authen/logout", "POST" , "" , $token = $this->session->get("access_token"));
        $this->session->destroy();
        $this->response->redirect("lisa/user/login");
    }

    public function forgetPasswordAction()
    {
        if($this->request->ispost()){
            $email = $this->request->getPost('email');
            $result = parent::curlApi("authen/forget?email=$email", "POST", "", $token ='nonToken');
            return json_encode($result);
        }
    }

    public function resetPasswordAction()
    {
        $tokenurl = $_GET['token'];
        $this->session->set("tokenurl", $tokenurl);
        $this->view->setVar("tokenurl", $this->session->get("tokenurl"));
    }

    public function resetPasswordAjaxAction(){
        if($this->request->ispost()){
            $password = $this->request->getpost('password');
            $password_confirm = $this->request->getpost('password_confirm');
            $tokenurl = $this->request->getpost('tokenurl');

            $field = array (
                "password" => $password,
                "passwordConfirm" => $password_confirm
            );
           $result = parent::curlApi("authen/resetPassword/$tokenurl", "PUT", json_encode($field), $tokenurl );
            return json_encode($result);
        }        
    }
}