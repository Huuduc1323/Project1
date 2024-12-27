<?php 
include_once './model/login.php';
class logincontroller extends login
{
    private $login;
    function __construct()
    {
        $this->login = new login();
    }
    function logincontrol()
    {
        if (isset($_GET['method'])) {
            $method = $_GET['method'];
        }else{
            $method = 'index';
        }
        switch ($method) {
            case 'index': 
                if (isset($_POST['login'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                    $login = $this->login->login();
                    if ($user == 'phuc') {
                        header('Location: http://localhost/NCKH/mvc/');
                    }
                }
                include_once './view/login.php';
                break; 
            case 'forgot':
                include_once './view/forgot.php';
                break;
            default:
                # code...
                break;
        }
    }
}