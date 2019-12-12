<?php
/**
 * Aurthor: Dustin Starnes
 * Date: 11/21/2019
 * File: user_controller.class.php
 * Description:
 */

class UserController
{

    private $user_model;

    public function __construct()
    {
        $this->user_model = new UserModel;
    }

    public function index(){
        $view = new Index();
        $view->display();
    }

    public function register(){
        $addUser = $this->user_model->add_user();
        $view = new Register();
        $view->display($addUser);
    }
    public function login(){
        $view = new Login();
        $view->display();
    }
    public function verify(){
        $verifyUser = $this->user_model->verify_user();
        $view = new VerifyUser();
        $view->display($verifyUser);
    }
    public function logout(){
        $logOut = $this->user_model->logout();
        $view = new Logout();
        $view->display($logOut);
    }
    public function reset(){
        if(isset($_COOKIE['user'])){
            $user = $_COOKIE['user'];
            $view = new Reset();
            $view->display($user);
        } else {
            $this->error('You need to login first!');
        }
    }
    public function do_reset(){
        $do_reset = $this->user_model->reset_password();
        $view = new ResetConfirm();
        $view->display($do_reset);
    }
    public function error($message){
        $view = new UserError();
        $view->display($message);
    }
}