<?php 
include_once './config/myConfig.php';
class login extends Connect
{
    function __construct()
    {
        parent::__construct();
    }
    function login($user,$pass)
    {
        $sql = "SELECT login.id, login.powerful, students.name AS 'namest', teachers.name AS 'namete', students.email as 'emailst', teachers.email as 'emailte' FROM login, students, teachers WHERE user = :user AND pass = :pass AND( login.id=students.id OR login.id=teachers.id)";
        $pre = $this->pdo->prepare($sql);
        $pre->bindParam(':user', $user);
        $pre->bindParam(':pass', $pass);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_ASSOC);
    }
}