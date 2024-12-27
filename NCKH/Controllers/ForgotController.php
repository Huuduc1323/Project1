<?php 
include_once './model/login.php';
class forgotcontroller extends login
{
    private $log;
    function __construct()
    {
        $this->log = new login();
    }
}