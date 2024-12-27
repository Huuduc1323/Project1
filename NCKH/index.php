<?php
ob_start();
session_start();

include_once './layout/headerlogin.php';
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 'login';
}
switch ($page) {
  case 'forgot':
    include_once './View/forgot.php';
    break;
  case 'login':
    include_once './Controllers/LoginController.php';
    $login = new logincontroller();
    $login->logincontrol();
    break;
  default:
    # code...
    break;
}


?>