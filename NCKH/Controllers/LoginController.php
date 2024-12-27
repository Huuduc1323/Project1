<?php 
include_once './model/login.php';
class logincontroller extends login
{
    private $log;
    function __construct()
    {
        $this->log = new login();
    }
    function logincontrol()
    {
        if(isset($_GET['page'])){
            $page = $_GET['page'];
          }else{
            $page = 'login';
          }
        switch ($page) {
            case 'login': 
                if (isset($_POST['login'])) {
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];
                        if ($this->log->login($user,$pass)) {
                        header('Location: http://localhost/NCKH/NCKH/home.php');
                        $_SESSION['pq'] = $this->log->login($user,$pass)[0]['powerful'];
                        $_SESSION['id'] = $this->log->login($user,$pass)[0]['id'];
                        if($_SESSION['pq']=='gv' || $_SESSION['pq']=='tk'){
                            $_SESSION['name'] = $this->log->login($user,$pass)[0]['namete'];
                            $_SESSION['emailte'] = $this->log->login($user,$pass)[0]['emailte'];
                        }else{
                            $_SESSION['name'] = $this->log->login($user,$pass)[0]['namest'];
                            $_SESSION['emailst'] = $this->log->login($user,$pass)[0]['emailst'];
                        }
                        // echo '<pre>';
                        // print_r($this->log->login($user,$pass));
                        // echo '</pre>';
                        // echo $_SESSION['pq'].' '.$_SESSION['id'].' '.$_SESSION['name'];
                    }else{
                        $message = "Dữ liệu đăng nhập chưa đúng";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                    }
                    
                }
                include_once './View/login.php';
                break; 
            case 'forgot': 
                include_once './View/forgot.php';
                break;
            default: 
                # code...
                break;
        }
    }
}